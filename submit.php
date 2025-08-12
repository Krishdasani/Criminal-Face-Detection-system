<!DOCTYPE html>
<html lang="en">
<head>
   
<?php
 
include 'server.php';
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new criminal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style type="text/css">

/* .container{
    margin-right: 10%;
    margin-left: 10%
} */


form{
    text-align: left;
}

body {
  background-image: url('bg3.png');
  background-size: 100vw 100vh;
}

.Text1 {
  /* width: 600px;
  height: 100px; */
  /* margin:0 299px 39px; */
  margin-left: 2vw;
  -webkit-text-stroke: 1px #04d9ff;
  font-family: HACKED;
  font-size: 7vh;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.33;
  letter-spacing: normal;
  text-align: center;
  color: #000;
}

.box{
  width: 40vw;
  height: 50vh;
  margin:  0;
  padding: 30px 50px 30px 10px;
  /* opacity: 0.7; */
  border-radius: 41px;
  border: solid 1px #707070;
  background-color:rgba(0, 0, 0, 0.7);
}



.Name- {
  width: 161px;
  height: 60px;
  margin: 0 30px 60px 0;
  font-family: RobotoSlab;
  font-size: 46px;
  font-weight: bold;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.3;
  letter-spacing: normal;
  text-align: left;
  color: #f3f8f1;
}

label{
    color: #f3f8f1;
    font-family: RobotoSlab;
  font-size: 3vh;
  font-weight: bold;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.3;
  letter-spacing: normal;

}
.col-form-label{
    font-size: 3vh;
    margin-left: 9vw;
}
.adj{
    color: #f3f8f1; 
    font-size: 2vh;
    border-radius: 14px;
}

.adj1{
    width: 120px;
  height: 30px;
    padding: 0;
  opacity: 0.77;
  border-radius: 30px;
  background-color: #f0e5e5;
  font-family: BebasNeue;
  font-size: 3vh;
  font-weight: bold;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.2;
  letter-spacing: normal;
  text-align: center;
  color: #000;
}

.adj2{
    width: 350px;
    height: 30px;
    padding: 0;
    margin-top:2vh;
    margin-left: 8vw;
  opacity: 0.77;
  border-radius: 30px;
  background-color: #f0e5e5;
  font-family: BebasNeue;
  font-size: 3vh;
  font-weight: bold;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.2;
  letter-spacing: normal;
  text-align: center;
  color: #000;
}


     @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
 float:left;
width:100%;
padding : 50px 0;
text-align: center;
}


.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#339999;}
.login-sec .copy-text a{color:#339999;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #339999;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#339999; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #339999; color:#fff; font-weight:600;}

.b1{
  position: relative;
  top: -25vh;
  left:45vw;
  width:10vw;
}

.img1 {
  width: 170px;
  height: 80px;
  margin: 0 0 0 0;
}
.block2 {
  width: 200px;
  float: left;
  margin: 10px 0 0 10px;
}

</style>

</head>


<body>
<div class="block2">
  <a href="home.php">
    <img src="PROJECT2.png" class="img1" alt="...">
  </a>
</div>

<section class="login-block" style="height: 100vh">
      <div class="container">
      <div class="row">
          <div class="col-md-3"></div>
          <div class="box">
              <h2 class="Text1">Upload Picture</h2>

    <form action="sub.php" method="post"enctype="multipart/form-data">
    <div class="form-group">   
    <br>
    <div class="form-group">
    
    <div class="form-group">
    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Insert image</label>

    <input type="file" name="image" class="adj1 col-sm-8" required>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-block adj2" name="submit">Submit</button>

    </div>


    </div>
</div>
      </div>

</form>


</div>
</section>


</body>
</html>