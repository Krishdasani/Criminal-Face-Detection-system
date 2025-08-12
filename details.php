<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <style>
    body {
      background-image: url('bg3.png');
      background-size: 100vw 100vh;
    }

    .block1 {
      /* width: 100%; */
      height: 10%;
      /* float: left; */
      margin: 10px 0 0 10px;
    }


    .img1 {
      width: 170px;
      height: 80px;
      margin: 0 0 0 0;
    }

    .img2 {
      width: 393px;
      height: 524px;
      margin: 50px 0 0 150px;
    }

    .box {
      width: 700px;
      height: 338px;
      margin: 138px 0 0 39px;
      /* opacity: 0.7; */
      border-radius: 41px;
      float: left;
      border: solid 1px #707070;
      background-color: rgba(0, 0, 0, 0.7);
    }

    .box-in1 {
      width: 100%;
      height: 90%;
      margin: 0;
    }

    .box-in2 {
      width: 40%;
      height: 620px;
      margin: 0;
      float: left;
    }

    .box-txt1 {
      width: 30%;
      height: 100%;
      margin: 0;
      float: left;
    }

    .box-txt2 {
      width:70%;
      height: 100%;
      margin: 0;
      float: left;
    }

  .txt1 {
    width: 161px;
    height: 60px;
    margin: 30px 0 0 50px;
    font-family: RobotoSlab;
    font-size: 36px;
    font-weight: bold;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.3;
    letter-spacing: normal;
    text-align: left;
    color: #f3f8f1;
  }

  .txt2 {
    width: 461px;
    height: 60px;
    margin: 30px 0 0 0;
    font-family: RobotoSlab;
    font-size: 36px;
    font-weight: bold;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.3;
    letter-spacing: normal;
    text-align: left;
    color: #f3f8f1;
  }
  </style>
  <body>
    <?php
  $path = $_SERVER['DOCUMENT_ROOT'];
include 'server.php';
$id = $_GET['output'];
$code = mysqli_query($db,"SELECT * FROM `info` WHERE id = '$id'");
$op = mysqli_fetch_array($code);
$name = $op['name'];
$age = $op['Age'];
$crime = $op['crime'];

?>
    <div class="block1">
      <a href="home.php">
        <img src="PROJECT2.png" class="img1" alt="...">
      </a>
    </div>
    <div class="box-in1">
      <div class="box-in2">
        <img src="Criminals/<?php echo $id?>" class="img2" alt="...">
      </div>
      <div class="box">
        <div class="box-txt1">
          <h1 class="txt1">Name:</h1>
          <h1 class="txt1">Age:</h1>
          <h1 class="txt1">Crime:</h1>
        </div>
        <div class="box-txt2">
          <h1 class="txt2"><?php echo $name?></h1>
          <h1 class="txt2"><?php echo $age?></h1>
          <h1 class="txt2"><?php echo $crime?></h1>
        </div>
      </div>
    </div>
  </body>
</html>