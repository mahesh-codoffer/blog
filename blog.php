<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<table id="mytable" class="table table-bordred table-striped">
<tbody>
 <?php
 include_once('input.php');
 $id=1;
 $data=new db_conn($id);
$sql=$data-> fetchAlldata();
  while($row=mysqli_fetch_array($sql))
  {
  ?>
    <tr>
    <td><?php echo $id;?></td>
    <td><?php echo $row['title'];?></td>
    <td><?php echo $row['description'];?></td>
    <td><?php echo $row['date'];?></td>
    <td><img class="img-fluid w-25" src="./image/<?php echo $row['image'];?>" alt="img" /></td>
 <td><a href="update.php?id=<?php echo htmlentities($row['id']);?>">Edit</a></td>
 <td><a href="form1.php?del=<?php echo htmlentities($row['id']);?>">Delete</a></td>
    </tr>
<?php
// for serial number increment
$id++;
} ?>
</tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>




