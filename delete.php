<?php 
    include 'connect.php';
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM crud WHERE id = $id";
    $query = $dsn->query($sql);

    if($query) {
        header('location: display.php');
    }

?>