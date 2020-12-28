<?php
include 'conexion.php';

    $id = htmlentities($_GET['id']);
    
    // FORMA PREPARADA
    $del = $con->prepare("DELETE FROM inventario WHERE id=?");
    $del->bind_param("i", $id);
    if ($del->execute()) {
        # code...
        header("location:index.php");
    }else{
        echo 'datos no eliminados';
    }
    $del->close();
    $con->close();
?>