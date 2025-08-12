<!DOCTYPE html>
<html lang="en">
<head>
   
<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
include 'server.php';
?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <style>
body {
  background-image: url('bg3.png');
  background-size: 100vw 100vh;
}

@font-face {
    font-family: 'RobotoSlab';
    src: url('RobotoSlab-Bold.ttf') format('truetype');
}
.Add-New-Criminal {
  /* width: 600px;
  height: 100px; */
  /* margin:0 299px 39px; */
  margin-left: 2vw;
  margin-bottom: 2vw;
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

form {
  width: 40vw;
  height: 62vh;
  margin: 0 0 0;
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
}
.adj{
    color: #f3f8f1; 
    font-size: 2vh;
    border-radius: 14px;
}

.adj1{
    padding: 5px 14px 5px 15px;
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

       

/* .container{
    margin-right: 10%;
    margin-left: 10%
} */


 

     @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
 float:left;
width:100%;
padding : 50px 0;
text-align: center;
}
.img1 {
  width: 170px;
  height: 80px;
  margin: 0 0 0 0;
}
.block2 {
  width: 100%;
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
          <div class="col-md-6 login-sec">

    <form action="add.php" method="post"enctype="multipart/form-data">
    <div class="form-group row">
    <span class="Add-New-Criminal">
        Add New Criminal
    </span>
    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Name</label>
    <input type="text" name="name" placeholder="Enter the name of the criminal" class="adj col-sm-8" required><br>
    </div>
    <div class="form-group row">
    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Age</label>
    <input type="number" name="age" placeholder="Enter the age of the criminal" class="adj col-sm-8" required><br>
    </div>
    <div class="form-group row">
    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Crime</label>
    <input type="text" name="crime" placeholder="Enter the crime of the criminal" class="adj col-sm-8"  required><br>
    </div>
    <div class="form-group">
 

   
    <br>
    <div class="form-group">
    
    <div class="form-group">
    <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Insert image</label>

    <input type="file" name="image" class="adj1 col-sm-8" required>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-login btn-block adj1" style="width:20vw;margin-top:2vh;" name="submit">Submit</button>
    </div>


    </div>
</div>
      </div>
      
</form>
</div>
</section>
<script>

window.onmousedown = function (e) {
    var el = e.target;
    if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
        e.preventDefault();

        // toggle selection
        if (el.hasAttribute('selected')) el.removeAttribute('selected');
        else el.setAttribute('selected', '');

        // hack to correct buggy behavior
        var select = el.parentNode.cloneNode(true);
        el.parentNode.parentNode.replaceChild(select, el.parentNode);
    }
} 
</script>
</body>
</html>