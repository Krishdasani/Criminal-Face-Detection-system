<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crimials</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <style>
        .a{
            background-color: whitesmoke;               
            color:black;
        }
        .a:hover
        {
            background-color: black;
            /* color: whitesmoke; */
        }
        .image{
            height: 15vw;
            width: 15vw;
        }
        .button{
            position: absolute;
            /* top: 90vw; */
            right: 10vw;
        }
        h3
        {
            position: relative;
            left: 45vw;
            font-size: 3vw;
        }
        table{
            position: relative;
           
            left: 15vw;         
        }
        
    </style>
</head>
<body>
<h3>USERS</h3>
<table class="table table-bordered" style="width: 80vw;">
  <thead class="thead-dark">
			<tr>
			<th>Sr No.</th>
			<th>Name</th>
            <th>Age</th>
			<th>Crime</th>
			<th>Image</th>
            <!-- <th>Action</th> -->
		</tr>		
<?php
$base = $_SERVER['DOCUMENT_ROOT'];
include 'server.php';
$img = 'Criminals';
$sql = "select * from info ";

$code = mysqli_query($db,$sql);
$i = 1;
while($res = mysqli_fetch_array($code)){
    // echo $res['id'];
?> 
  <tr>
  <td><?php echo $i?></td>
  	<td><?php echo $res['name']?></td>
     <td> <?php echo $res['Age']?></td>
     <td><?php echo $res['crime']?></td>
	<td><img src="<?php echo $img ?>/<?php echo $res['id']?>.JPG" class="image"></td>
    <?php 
    $i = $i + 1;
    ?>
</tr>
<tr>

<?php

}
?>
</tr>

</table>

</body>
</html>