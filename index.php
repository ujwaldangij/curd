<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php 
    
    include_once __DIR__.'./connect.php';
    $q= "select s.id,s.name,s.address,s.class,s.phone from student as s;";
    $r = mysqli_query($con,$q) or die("error in query");
    mera($r);

    ?>
    <table cellpadding="7px">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Class</th>
            <th>Phone</th>
            <th>Action</th>
        </thead>
        <?php 
        if (mysqli_num_rows($r)>0) {
            # code...
            while ($row = mysqli_fetch_assoc($r)) {
                # code...
        ?>
        <tbody>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['class'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td>
                    <a href='edit.php'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $row['id'];?>'>Delete</a>
                </td>
            </tr>
        </tbody>
        <?php 
        
    }
}else {
    # code...
    echo "no record found till now";
}
mysqli_close($con);
        ?>
    </table>
</div>
</div>
</body>

</html>