<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <?php 
        
        include __DIR__.'./connect.php';
        
        $q="select * from class;";
        $r= mysqli_query($con,$q) or die ('Error in query');
        if (mysqli_num_rows($r)>0) {
            # code...
        ?>
        <div class="form-group">
            <label>Class</label>
            <select name="sclass">
                <?php 
                while ($row=mysqli_fetch_assoc($r)) {
                    # code...
                    echo  "<option value='{$row['id']}'>{$row['cname']}</option>" ;
                }
                ?>
            </select>
        </div>
        <?php 
        
        }else{
            echo "record not fond of class";
            mysqli_close($con);
        }
        ?>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save" name="save" />
    </form>
</div>
</div>
</body>

</html>
<?php 

if (isset($_POST['save'])) {
    $name = $_POST["sname"];
    $address = $_POST["saddress"];
    $class = $_POST["sclass"];
    $phone = $_POST["sphone"];
    // include_once __DIR__.'./connect.php';
    $q="insert into student (name,address,class,phone) values('{$name}','{$address}','{$class}','{$phone}');";
    // die();
    $r= mysqli_query($con,$q) or die('Error in query');
    if ($r) {
        # code...
        echo "<script>
        alert('record inserted');
        </script>";
        header('location:http://localhost:8080/curd/');
    }else{echo "Error";
        
    }

}

?>