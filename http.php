<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload ZIP File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="file"],
        .form-group input[type="textarea"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }
        .form-group input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload ZIP File</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="file">Choose ZIP file:</label>
                <input type="file" name="file" id="file" accept=".zip" required>
            </div>
            <div class="form-group">
                <label for="cover">Upload Cover Photo:</label>
                <input type="file" name="cover" id="cover" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="textarea" name="Description" id="description" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload">
            </div>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    if (isset($_COOKIE['user_id'])) {
        $userid = $_COOKIE['user_id'];

        $file = $_FILES['file'];
        $cover = $_FILES['cover'];
        $description = $_POST['Description'];
        $name = preg_replace('/[^a-zA-Z0-9_-]/', '', trim($_POST['name'])); // Sanitize project name
        include 'server.php';
        
        $insertQuery = "INSERT INTO portfolio (userid, name, description) VALUES ('$userid', '$name', '$description')";
        mysqli_query($conn, $insertQuery);

        // Fetch the latest inserted data
        $last_id = mysqli_insert_id($conn);
        $fetchQuery = "SELECT * FROM portfolio WHERE portfolio_id = $last_id";
        $result = mysqli_query($conn, $fetchQuery);
        $latestData = mysqli_fetch_assoc($result);
        $id = $latestData['portfolio_id'];

        // Check if the file is a ZIP file
        $fileType = mime_content_type($file['tmp_name']);
        if ($fileType !== 'application/zip') {
            echo "Please upload a valid ZIP file.";
            exit;
        }

        // Define the upload and temporary extraction directories
        $uploadDir =  $userid . '/' . $id . '/';
        $tempExtractDir =  $userid . '/temp_' . $id . '/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        if (!is_dir($tempExtractDir)) {
            mkdir($tempExtractDir, 0755, true);
        }

        // Move the uploaded ZIP file to the temporary extraction directory
        $uploadFilePath = $tempExtractDir . basename($file['name']);
        if (!move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
            echo "Failed to upload the file.";
            exit;
        }

        // Unzip the uploaded file to the temporary directory
        $zip = new ZipArchive;
        if ($zip->open($uploadFilePath) === TRUE) {
            $zip->extractTo($tempExtractDir);
            $zip->close();
            echo "File uploaded and extracted successfully.";

            // Find the extracted folder (assuming only one folder is extracted)
            $extractedFolderName = '';
            $extractedItems = scandir($tempExtractDir);
            foreach ($extractedItems as $item) {
                if ($item !== '.' && $item !== '..' && is_dir($tempExtractDir . $item)) {
                    $extractedFolderName = $item;
                    break;
                }
            }

            // Rename the extracted folder to match the project name
            rename($tempExtractDir . $extractedFolderName, $uploadDir . $id);

            // Move the cover photo to the project folder as cover.jpg
            $coverPath = $uploadDir . $id . '/cover.jpg';
            $coverDB = $id . '/' . $id . '/cover.jpg';
            mysqli_query($conn, "UPDATE `portfolio` SET `image_path`='$coverDB' WHERE portfolio_id = '$id'");
            if (!move_uploaded_file($cover['tmp_name'], $coverPath)) {
                echo "Failed to upload the cover photo.";
            }

            // Create index.html and individual image/video pages
            createWebPages($uploadDir . $id . '/', $id, $conn); // Pass the project name as folder name

            // Generate index.php for listing all projects
            generateUserIndex($userid, $conn);

            // Remove the temporary extraction directory
            deleteDirectory($tempExtractDir);
        } else {
            echo "Failed to unzip the file.";
        }

        // Optionally, delete the uploaded ZIP file if it exists
        if (file_exists($uploadFilePath)) {
            unlink($uploadFilePath);
        }
    }
} else {
    echo "No file uploaded.";
}

function createWebPages($directory, $folderName, $conn) {
    $mediaFiles = glob($directory . "*.{jpg,jpeg,png,gif,mp4,avi,mov}", GLOB_BRACE);

    // Create index.html
    $indexHtml = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Media Gallery - $folderName</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .grid { display: flex; flex-wrap: wrap; gap: 10px; }
        .grid img, .grid video { max-width: 100px; max-height: 100px; object-fit: cover; }
        .grid div { flex: 1 1 calc(25% - 10px); box-sizing: border-box; }
    </style>
</head>
<body>
    <h1>Media Gallery - $folderName</h1>
    <div class='grid'>";

    foreach ($mediaFiles as $media) {
        $mediaName = basename($media);
        if ($mediaName == 'cover.jpg') continue; // Skip the cover photo
        $mediaType = mime_content_type($media);
        $userid = $_COOKIE['user_id'];
        
        // Insert media information into the database
        $mediaPath = $folderName . '/' . $mediaName;
        mysqli_query($conn, "INSERT INTO images (userid, portfolio_id, name, description, path) VALUES ('$userid', '$folderName', '$mediaName', 'NULL', '$mediaPath')");
        echo $mediaPath;
        if (strpos($mediaType, 'video') !== false) {
            $indexHtml .= "<div><a href='${mediaName}.html'><video src='$mediaName' alt='$mediaName' controls></video></a></div>";
        } else {
            $indexHtml .= "<div><a href='${mediaName}.html'><img src='$mediaName' alt='$mediaName'></a></div>";
        }
        createIndividualPage($directory, $media, $mediaName, $mediaType);
    }

    $indexHtml .= "</div>
    <h2>Find Your Photos</h2>
    <form action='find_photos.php' method='post' enctype='multipart/form-data'>
        <input type='hidden' name='portfolio_id' value='$folderName'>
        <div class='form-group'>
            <label for='userPhoto'>Upload Your Photo:</label>
            <input type='file' name='userPhoto' id='userPhoto' accept='image/*' required>
        </div>
        <div class='form-group'>
            <input type='submit' name='submit' value='Find Photos'>
        </div>
    </form>
</body>
</html>";

    file_put_contents($directory . "index.html", $indexHtml);
}

function createIndividualPage($directory, $mediaPath, $mediaName, $mediaType) {
    $mediaElement = '';
    if (strpos($mediaType, 'video') !== false) {
        $mediaElement = "<video src='$mediaName' alt='$mediaName' controls></video>";
    } else {
        $mediaElement = "<img src='$mediaName' alt='$mediaName'>";
    }

    $individualHtml = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>$mediaName</title>
</head>
<body>
    <h1>$mediaName</h1>
    $mediaElement
    <p><a href='index.html'>Back to Gallery</a></p>
</body>
</html>";

    file_put_contents($directory . $mediaName . ".html", $individualHtml);
}

function deleteDirectory($tempExtractDir) {
    if (!file_exists($tempExtractDir)) {
        return false;
    }

    if (!is_dir($tempExtractDir)) {
        return unlink($tempExtractDir);
    }

    $items = array_diff(scandir($tempExtractDir), ['.', '..']);

    foreach ($items as $item) {
        $path = $tempExtractDir . DIRECTORY_SEPARATOR . $item;
        is_dir($path) ? deleteDirectory($path) : unlink($path);
    }

    return rmdir($tempExtractDir);
}

function generateUserIndex($userid, $conn) {
    $userDir =  $userid . '/';
    $fetchProjects = "SELECT * FROM portfolio WHERE userid = '$userid'";
    $projects = mysqli_query($conn, $fetchProjects);

    $indexPhp = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>User Projects</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .grid { display: flex; flex-wrap: wrap; gap: 10px; }
        .grid img { max-width: 100px; max-height: 100px; object-fit: cover; }
        .grid div { flex: 1 1 calc(25% - 10px); box-sizing: border-box; }
    </style>
</head>
<body>
    <h1>User Projects</h1>
    <div class='grid'>";

    while ($project = mysqli_fetch_assoc($projects)) {
        $projectId = $project['portfolio_id'];
        $projectName = $project['name'];
        $projectCover = $project['image_path'];
        $portfolio = $project['portfolio_id'];
        
        $indexPhp .= "<div>
                        <a href='$projectId/$projectId/index.html'>
                            <img src='$projectCover' alt='$projectName'>
                            <p>$projectName</p>
                            <p>$portfolio</p>
                        </a>
                      </div>";
    }

    $indexPhp .= "</div>
</body>
</html>";

    file_put_contents($userDir . "index.php", $indexPhp);
}
?>
