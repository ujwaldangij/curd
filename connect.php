<?php 

$servername ="localhost";
$username ="root";
$password ="";
$databasename ="curd";

$con = mysqli_connect($servername,$username,$password,$databasename);
try {
    
    if (mysqli_connect_errno()) {
        # code...
        throw new Exception('Error in connection'.mysqli_connect_error());
    } else {
        
    }
} catch (\Throwable $e) {
    # code...
    echo $e->getMessage();
    echo $e->getLine();
}finally{
    // echo "<h2>done</h2>";
}
function mera($r)
{
    echo "<pre>";
    print_r($r);
    echo "</pre>";
    # code...
}


?>