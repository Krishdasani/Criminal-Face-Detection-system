<?php
$db = mysqli_connect('localhost', 'root', '', 'criminal');
// if((isset($_COOKIE['username'])))
//   {
//    if($_COOKIE['username']=='admin@gmail.com')
//    {
//   header("location:Admin/dashboard.php");

//    }
//    else{
//      header("location:home.php");
//    }


// }


$msg = true;
if(isset($_POST['login'])){
    $uname = $_POST['name'];
    $pass = $_POST['password'];
    if($uname=='admin@gmail.com'&& $pass=='password'){
              setcookie ("username",$_POST["name"],time()+(86400 * 360));
              setcookie ("password",$_POST["password"],time()+ (86400*360));
      header("location:home.php");
    }
    else{
      $msg =false;
    }
  
  if (empty($_POST["email"])) {

    $emailErr = "Email is required";
  } else {

    $email = test_input($_POST["email"]);

    // check if e-mail address is well-formed

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

      $emailErr = "Invalid email format";
    }
  }
  function test_input($data)
  {

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;
  }
} 


?>
<!DOCTYPE html>
<html>
  <head>
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
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
  <style type="text/css">
      @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
    /*background: #DE6262;  /* fallback for old browsers */
/*background: -webkit-linear-gradient(to bottom, rgb(140, 209, 255), rgb(9, 0, 141));  /* Chrome 10-25, Safari 5.1-6 */
/*background: linear-gradient(to bottom, rgb(140, 209, 255), rgb(9, 0, 141)); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
float:left;
width:100%;

padding : 50px 0;
}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px;  border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1); position:relative; background:#fff;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}

 #img{
  position: relative;
   height: 2.4vw;
   width: 2.2vw;
   right: 0.4vw;
   top: -0.2vw;
 
 }
 #forget{
   position: relative;
   height: 2.5vw;
   width: 2.5vw;
  top: -2.5vw;
  left: 31vw;
 }
 
</style>



<body style="  background: #DE6262;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to bottom,pink, rgb(140, 209, 255));  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom,pink, rgb(140, 209, 255)); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    float:left;
    width:100%;
    padding : 50px 0;">
    
    <!-- <div class="logo">
      <img src="logo.jpg" />
    </div>

    
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<section class="login-block" style="height: 100vh">
    <div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 login-sec">
            <h2 class="text-center">Login Now</h2>
            <form class="login-form" class="example" action="login.php" method="post">
            <?php

            if($msg==false){
      

            ?>
            <div class="alert alert-danger">
  <strong>Oops!</strong> The password you entered is incorrect,Or the email Id is incorrect.Please try again.
</div>
            <?php
            }
            ?>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-uppercase">E-mail</label>
                    <input type="email" name="name" class="form-control" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter Password"  id="myInput" required><input type="checkbox" onclick="myFunction()">Show Password

              
	</p>
                </div>
                <button type="submit" class="btn btn-login btn-block" name="login">Login</button>
                <br>
                  <div class="text-center">
                  <span class="d-block small mt-3">Don't have an account?</span><a class="d-block small mt-1" href="sign.php" style="color: blue">Register here</a>
          <hr>
          <span class="d-block small">Forgot Password?</span><a class="d-block small mt-1" href="fp.php" style="color: blue">New Password</a>
        </div>
  
            </form>
        </div>
      
</div>
    </div>
  
</section>

    </body>
</html>