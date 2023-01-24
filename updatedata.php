<?php 


if (isset($_POST['update'])) {
    include __DIR__.'./connect.php';
    $id = $_POST["sid"];
    $name = $_POST["sname"];
    $address = $_POST["saddress"];
    $class = $_POST["sclass"];
    $phone = $_POST["sphone"];
    // include_once __DIR__.'./connect.php';
    $q="update student set name = '{$name}',address ='{$address}', class ='{$class}',phone='{$phone}' where id ='{$id}';";

    // die();
    $r= mysqli_query($con,$q) or die('Error in query');
    if ($r) {
        # code...
        echo "<script>
        alert('record updated');
        </script>";
        header('location:http://localhost:8080/curd/');
    }else{echo "Error";
        
    }

}

?>