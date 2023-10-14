<?php 
class db_conn {
    public $server = 'localhost';
    public $username ="root";
    public $password ="";
    public $db_name ="formdata";
    public $conn ;

public function __construct(){
    $this->conn =mysqli_connect($this->server, $this->username,$this->password,$this->db_name);
    if(mysqli_connect_errno()){
        echo "ERROR: database not connected";
    }
}
function connection ($title ,$description ,$image){
    $sql = "INSERT INTO `formdata` (`title`, `description`, `date`, `image`) VALUES ( '$title' , '$description',current_timestamp(), '$image')";
    $inserted_data = mysqli_query($this->conn,$sql);
    if($inserted_data){
        return $inserted_data ;
    }else{
        echo "not inserted";
    }
}
public function fetchdata($id){
    $sql = "SELECT * FROM `formdata` WHERE id ='$id'";
    $fetch_data = mysqli_query($this->conn,$sql);
    if($fetch_data){
        //print_r ($fetch_data) ;
        return $fetch_data ;
    }else{
        echo "not fetched";
    }
}
public function fetchAlldata(){
    $sql = "SELECT * FROM `formdata`";
    $fetch_data = mysqli_query($this->conn,$sql);
    if($fetch_data){
        //print_r ($fetch_data) ;
        return $fetch_data ;
    }else{
        echo "not fetched";
    }
}

//Data updation Function
public function update($id,$title,$description,$image)
	{
    $query = "update  `formdata` set title='$title',description='$description',image='$image' where id='$id'";
	$updaterecord=mysqli_query($this->conn,$query);
	return $updaterecord ;
	}
 //Data Deletion function Function
 public function delete($id)
	{
$deleterecord=mysqli_query($this->conn,"delete from `formdata` where id=$id");
return $deleterecord;
	}
 }
?>