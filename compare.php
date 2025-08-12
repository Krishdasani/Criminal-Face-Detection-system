<!DOCTYPE html>
<html lang="en">
<head>
   
<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
include 'server.php';
$id = $_GET['output'];
// echo $id;
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new criminal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<link href="https://fonts.cdnfonts.com/css/hacked" rel="stylesheet">
<style type="text/css"> 


    

html{
    height: 100%;
}
body {
  background-image: url('bg3.png');
  background-size: 100vw 100vh;
}

.img1 {
  width: 293px;
  height: 374px;
  margin: 100px 100px 0 390px;
}

.img2 {
  width: 293px;
  height: 374px;
  margin: 100px 0 0 50px;
}

.text {
  @import url('https://fonts.cdnfonts.com/css/hacked');
  width: 120px;
  height: 100px;
  margin: 180px 418px 150px 42px;
  font-family: HACKED;
  font-size: 50px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.33;
  letter-spacing: normal;
  text-align: center;
  color: #38dc06;
}
.block {
  width: 200px;
  float: left;
}

.block2 {
  width: 200px;
  float: left;
  margin: 0 0 0 478px;
}

.row {
  width: 100%;
  margin: 0 auto;
}

.block3 {
  width: 200px;
  float: left;
  margin: 10px 0 0 10px;
}
.img3 {
  width: 170px;
  height: 80px;
  margin: 0 0 0 0;
}

.Rectangle{
  width:120px;
  height: 50px;
  margin: 0 0 0 50px;
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

.Rectangle:hover {
  background-color: #000; /* new color on hover */
}

.text2 {
  width: 120px;
  height: 50px;
  margin: 0;
  padding: 12px 0 0 0;
  font: BebasNeue;
  font-size: 20px;
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
.text2:hover {
  color: #fff;
  text-decoration:none; /* new color on hover */
}

a{
  text-decoration:none;
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
</style>
</head>
<body>
  <div class="block3">
      <img src="PROJECT2.png" class="img3" alt="...">
  </div>
  <div class="row">
      <div class="block">
        <img src="search/search.jpg" class="img1" alt="...">
      </div>
      <?php
  // $id=trim($id);
       if ($id=='No match found.') {
      ?>
      <div class="block2">
        <h4 class="text">MATCH NOT FOUND</h4>
      </div>
      <div class="block">
        <img src="nmf.jpg" class="img2" alt="...">
      </div>
      <?php }
      else{?>
      <div class="block2">
        <h4 class="text">MATCH FOUND</h4>
        <a href='details.php?output=<?php echo $id?>'>
          <div class="Rectangle">
            <div class="text2">DETAILS</div>
          </div>
        </a>
      </div>
      <div class="block">
        <img src="Criminals/<?php echo $id?>" class="img2" alt="...">
      </div>
      <?php } ?>
  </div>
</body>
</html>

<!-- <strong>Loading....</strong> -->