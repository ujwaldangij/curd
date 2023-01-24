<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
    <?php 
    
    if (isset($_POST["showbtn"])) {
        # code...
        include_once __DIR__.'./connect.php';
        $q="select * from student where id = '{$_POST["sid"]}';";
        $r= mysqli_query($con,$q) or die ('Error in query');
        if (mysqli_num_rows($r)>0) {
            $row=mysqli_fetch_assoc($r)
            
    
    ?>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="sid" value="<?php echo $row['id'];?>" />
            <input type="text" name="sname" value="<?php echo $row['name'];?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['address'];?>" />
        </div>
        <?php 
        
        $q2="select * from class;";
        $r2= mysqli_query($con,$q2) or die ('Error in query');
        if (mysqli_num_rows($r2)>0) {
        
        ?>
        <div class="form-group">
            <label>Class</label>
            <select name="sclass">
                <!-- <option value="" selected disabled>Select Class</option> -->
                <?php 
                while ($row2=mysqli_fetch_assoc($r2)) {
                    # code...
                    if ($row2['id']==$row['class']) {
                        # code...
                        $selected = 'selected';
                    }else{
                        $selected ="";
                    }
                    echo  "<option value='{$row2['id']}' {$selected}>{$row2['cname']}</option>" ;
                }
                ?>
            </select>
        </div>
        <?php }
        
        ?>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['phone'];?>" />
        </div>
        <input class="submit" type="submit" value="Update" name="update"/>
    </form>
    <?php 
    }else {
        # code...
        echo "no record found";
    }}
    ?>
</div>
</div>
</body>

</html>