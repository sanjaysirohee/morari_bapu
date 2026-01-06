<?php
    include './database/connectdb.php';
    $id=$_GET['id'];
    $query=mysqli_query($con,"delete from req_query_table where id=$id");
    header("Location: manage-queries.php");
exit;
    

?>
