<body style="  background: #DE6262;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to bottom,pink, rgb(140, 209, 255));  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom,pink, rgb(140, 209, 255)); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    float:left;
    width:100%;
    padding : 50px 0;">
<?php
include 'server.php';
$name=$_POST['name'];
$age=$_POST['age'];
$crime=$_POST['crime'];
$query1 = mysqli_query($db,"select * from info order by id desc limit 1");
$id = mysqli_fetch_array($query1);
$pid=$id['id']+1;
echo $pid;
// $name = $_FILES['image']['name'];

$currentDirectory = getcwd();
$target_dir = 'Criminals/';
$uploadpath=$currentDirectory . $target_dir.$pid;
$target_file = $target_dir .$_FILES['image']['name'];


// Select file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Valid file extensions
$extensions_arr = array("jpg","jpeg");

// Check extension
if( in_array($imageFileType,$extensions_arr) ){



   // Upload file
   $temp=explode(".", $_FILES["image"]["name"]);
   $newfilename = $pid.'.'.end($temp);
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
$query=mysqli_query($db,"INSERT INTO `info`(`name`, `age`, `crime`) VALUES ('$name','$age','$crime')");
$output = shell_exec('python C:\xampp\htdocs\project\check.py');
// echo $output
header('location:/project/home.php');
?>
</body>
