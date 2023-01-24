<?php 

$id= $_GET["id"];

include_once __DIR__.'./connect.php';
$q="delete from student where id ='{$id}';";
$r= mysqli_query($con,$q) or die ('Error in query');
if ($r) {
    header("location:http://localhost:8080/curd/");
    # code...
}else{
    echo "something went wrong";
}





?>