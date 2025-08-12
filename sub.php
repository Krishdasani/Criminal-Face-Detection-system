<body style="  background: #DE6262;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to bottom,pink, rgb(140, 209, 255));  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom,pink, rgb(140, 209, 255)); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    float:left;
    width:100%;
    padding : 50px 0;">
<?php
include 'server.php';

// $name = $_FILES['image']['name'];

$currentDirectory = getcwd();
$target_dir = 'search/';
$uploadpath=$currentDirectory . $target_dir;
$target_file = $target_dir .$_FILES['image']['name'];


// Select file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Valid file extensions
$extensions_arr = array("jpg","jpeg");

// Check extension
if( in_array($imageFileType,$extensions_arr) ){



   // Upload file
   $temp=explode(".", $_FILES["image"]["name"]);
   $newfilename = 'search.'.end($temp);
//    echo $newfilename;
  
   $move = move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$newfilename);
   if($move){
    //    echo 'upload sucess in'.$uploadpath; 


}

 else{
    //  echo "failure in $uploadpath" ;
 } 
}
// $alpha=mysqli_query($db,'select * from inventory');
$command = 'python C:/xampp/htdocs/project/check2.py';
$output = exec($command);

header("location:/project/compare.php?output=$output");
?>
</body>
