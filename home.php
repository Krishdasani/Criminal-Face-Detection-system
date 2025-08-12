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
  background-image: url('bg4.png');
  background-size: 100vw 100vh;
}
/* .b1{
  position: relative;
  top: 30vh;
  left:15vw;
  width:28vw;
}
.b2{
  position: absolute;
  top: 40vh;
  left:15vw;
  width:28vw;
}
.b3{
  position: absolute;
  top: 50vh;
  left:15vw;
  width:28vw;
} */

.Rectangle {
  width: 400px;
  height: 100px;
  margin: 0 20px 29px;
  padding: 0 142px 0 0;
  opacity: 0.77;
  border-radius: 93px;
  -webkit-backdrop-filter: blur(5px);
  backdrop-filter: blur(5px);
  background-color: #f0e5e5;
  transition: background-color 0.2s ease-in-out;
}

.Rectangle:hover {
  background-color: #000; /* new color on hover */
}

@font-face {
  font-family: 'BebasNeue';
  src: url('BebasNeue-Regular.ttf') format('truetype');
}
a:visited {
  text-decoration: none; /* purple */
}

a:hover {
  text-decoration: none; /* red */
}

a:active {
  text-decoration: none; /* green */
}
.text {
  width: 400px;
  height: 100px;
  margin: 35px 0px 0px 0px;
  padding: 25px 0 0 0;
  font: BebasNeue;
  font-size: 35px;
  font-weight: bold;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.21;
  letter-spacing: normal;
  text-align: center;
  text-decoration: none;
  color: #000;
  transition: background-color 0.2s ease-in-out;
}

.text:hover {
  color: #fff; /* new color on hover */
}
.img2 {
  width: 293px;
  height: 374px;
  margin: 35px 0 0 900px;
}
.img1 {
  width: 170px;
  height: 80px;
  margin: 0 0 0 0;
}

.block {
  width: 200px;
  float: left;
  margin: 50px 0 0 0;
}
.block2 {
  width: 200px;
  float: left;
  margin: 10px 0 0 10px;
}

.row {
  width: 100%;
  margin: 0 auto;
}
a{
  text-decoration:none;
}
</style>

<div class="block2">
    <img src="PROJECT2.png" class="img1" alt="...">
</div>
<div class="row">
  <div class="block">
    <a href="upload.php">
      <div class="Rectangle">
        <div class="text">ADD NEW CRIMINAL</div>
      </div>
    </a>
    <a href="submit.php">
      <div class="Rectangle">
        <div class="text">DETECT</div>
      </div>
    </a>
    <a href="view2.php">
      <div class="Rectangle">
        <div class="text">VIEW CRIMINAL</div>
      </div>
    </a>
  </div>
  
</div>
</body>
</html>