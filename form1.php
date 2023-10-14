<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary w-50 mx-auto">
  <div class="container-fluid">
    <a class="navbar-brand text-bold" href="#">create blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-primary" aria-current="page" href="blog.php">click here to display your blog</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php
include_once('input.php');
$data = new db_conn ;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  echo "yes it is"  ;

if(isset($_FILES["image"])){
  //print_r ($_FILES) ;
  $_NAME = $_FILES["image"]["name"] ;
  $_path = $_FILES["image"]["full_path"] ;
  $_TEMPNAME = $_FILES["image"]["tmp_name"] ;
  move_uploaded_file($_TEMPNAME ,"image/".$_NAME );
}
$title = $_POST["title"];
$description =$_POST["text"];
$image =$_NAME ;
$data->connection($title ,$description,$image);
header("location:form1.php");
}
?>
<?php //Deletion
if(isset($_GET['del']))
    {
// Geeting deletion row id
$rid=$_GET['del'];
$sql=$data->delete($rid);
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record deleted successfully');</script>";
echo "<script>window.location.href='form1.php'</script>";
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1 class="mt-5 text-primary" >Enter Blog data</h1>
    <form action="" method="post" enctype ="multipart/form-data">
    <div class="mb-3">
  <label for="title" class="form-label text-danger">Blog title</label>
  <input type="text" class="form-control" id="title" name ="title" >
</div>
<div class="mb-3 ">
  <label for="description" class="form-label text-success">Description</label>
  <textarea class="form-control" id="text" name="text" rows="3"></textarea>
</div>
<div class="mb-3">
<input type="file" class="form-control" name="image" id="image" accept="image/*">
</div>
<div class="mb-3 text-center">
<input type="submit" class="form-control mx-auto w-25 btn btn-primary" name="submit"  id="button" >
</div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>