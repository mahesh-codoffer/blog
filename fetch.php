<table id="mytable" class="table table-bordred table-striped">
<thead>
<th>id</th>
<th>title</th>
<th>description</th>
<th>date</th>
<th>image</th>
</thead>
<tbody>
 <?php
 include_once('input.php');
 $id=1;
 $data=new db_conn($id);
$sql=$data-> fetchAlldata();
var_dump($sql) ;
 
  while($row=mysqli_fetch_array($sql))
  {
  ?>
    <tr>
    <td><?php echo $id;?></td>
    <td><?php echo $row['title'];?></td>
    <td><?php echo $row['description'];?></td>
    <td><?php echo $row['date'];?></td>
    <td><?php echo $row['image'];?></td>
 <td><a href="update.php?id=<?php echo htmlentities($row['id']);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
 <td><a href="index.php?del=<?php echo htmlentities($row['id']);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
    </tr>
<?php
// for serial number increment
$id++;
} ?>
</tbody>
</table>