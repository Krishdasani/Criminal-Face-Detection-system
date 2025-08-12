<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Media Gallery - 30</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .grid { display: flex; flex-wrap: wrap; gap: 10px; }
        .grid img, .grid video { max-width: 100px; max-height: 100px; object-fit: cover; }
        .grid div { flex: 1 1 calc(25% - 10px); box-sizing: border-box; }
    </style>
</head>
<body>
    <h1>Media Gallery - 30</h1>
    <div class='grid'><div><a href='1c0919106f.jpg.php'><img src='1c0919106f.jpg' alt='1c0919106f.jpg'></a></div><div><a href='4cbee1c951.jpg.php'><img src='4cbee1c951.jpg' alt='4cbee1c951.jpg'></a></div><div><a href='Bombay_High_Court_1.jpg.php'><img src='Bombay_High_Court_1.jpg' alt='Bombay_High_Court_1.jpg'></a></div><div><a href='Suchit.jpg.php'><img src='Suchit.jpg' alt='Suchit.jpg'></a></div><div><a href='cartoon.jpg.php'><img src='cartoon.jpg' alt='cartoon.jpg'></a></div><div><a href='celeb.jpg.php'><img src='celeb.jpg' alt='celeb.jpg'></a></div><div><a href='d.jpg.php'><img src='d.jpg' alt='d.jpg'></a></div><div><a href='dawood.jpg.php'><img src='dawood.jpg' alt='dawood.jpg'></a></div><div><a href='download.jpg.php'><img src='download.jpg' alt='download.jpg'></a></div><div><a href='ran2.jpg.php'><img src='ran2.jpg' alt='ran2.jpg'></a></div><div><a href='sarvesh.jpg.php'><img src='sarvesh.jpg' alt='sarvesh.jpg'></a></div><div><a href='urvashi.jpg.php'><img src='urvashi.jpg' alt='urvashi.jpg'></a></div><div><a href='virat.jpg.php'><img src='virat.jpg' alt='virat.jpg'></a></div></div>
    <h2>Find Your Photos</h2>
    <form action='find_photos.php' method='post' enctype='multipart/form-data'>
        <input type='hidden' name='portfolio_id' value='30'>
        <div class='form-group'>
            <label for='userPhoto'>Upload Your Photo:</label>
            <input type='file' name='userPhoto' id='userPhoto' accept='image/*' required>
            </div>
            <div class='form-group'>
                <input type='submit' name='submit' value='Find Photos'>
            </div>
        </form>
    </body>
    </html>