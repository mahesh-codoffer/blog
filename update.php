<?php
// include database connection file
//Object
include_once ("input.php");
$data=new db_conn();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
 
  echo "fetched";
// Get the userid
$userid= $_POST['id'];
// Posted Values
$title= $_POST['title'];
$description= $_POST['description'];
//$image= $_POST['image'];
if(isset($_FILES["image"])){
  //print_r ($_FILES) ;
  $_NAME = $_FILES["image"]["name"] ;
  $_path = $_FILES["image"]["full_path"] ;
  $_TEMPNAME = $_FILES["image"]["tmp_name"] ;
  move_uploaded_file($_TEMPNAME ,"image/".$_NAME );
}

//$title = $_POST["title"];
//$description =$_POST["text"];
$image =$_NAME ;
$sql=$data->update($userid,$title,$description,$image);
//Function Calling
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='form1.php'</script>";
}
?>
<?php
// Get the userid

$userid=intval($_GET['id']);
$sql=$data->fetchdata($userid);
while($row=mysqli_fetch_array($sql)) { ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1 class="mt-5 text-primary" >update data</h1>
    <form action="" method="post" enctype ="multipart/form-data">
    <input type="hidden" class="form-control" id="id" name ="id" value=<?php echo $row["id"]  ?> >

    <div class="mb-3">
  <label for="title" class="form-label text-danger">blog title</label>
  <input type="text" class="form-control" id="title" name ="title" value=<?php echo $row["title"]  ?> >
</div>
<div class="mb-3 ">
  <label for="description" class="form-label text-success">description</label>
  <textarea class="form-control" id="description" name="description" rows="3"  value=<?php echo $row["description"] ?> ></textarea>
</div>
<div class="mb-3">
<input type="file" class="form-control" name="image" id="image" accept="image/*"  value=<?php echo $row["image"] ?>>
</div>
<div class="mb-3 text-center">
<input type="submit" class="form-control mx-auto w-25 btn btn-primary" name="submit"  id="button" >
</div>
</form>
<?php } ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>