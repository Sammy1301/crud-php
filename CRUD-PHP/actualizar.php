<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $producto = $_POST['producto'];//forma menos seguras de traer datos de un formulario
    $precio = htmlentities($_POST['precio']);//FORMA MEDIA SEGURA PARA SQL INJECTIONS
    $cantidad = $con->real_escape_string(htmlentities($_POST['cantidad']));//Forma mas segura contra SQL INJECTIONS
    $categoria = $con->real_escape_string(htmlentities($_POST['categoria']));  
    $id = $con->real_escape_string(htmlentities($_POST['id']));
    
    // forma normal
    // $up = $con->query("UPDATE inventario SET producto='$producto', precio='$precio', cantidad='$cantidad', categoria='$categoria' WHERE id='$id'");

    // FORMA PREPARADA
    $up = $con->prepare("UPDATE inventario SET producto=?, precio=?, cantidad=?, categoria=? WHERE id=?");
    $up->bind_param("sdisi", $producto, $precio, $cantidad, $categoria, $id);
    if ($up->execute()) {
        # code...
        header("location:index.php");
    }else{
        echo 'datos no editados';
    }
    $up->close();
    $con->close();
}else{
    echo '<script>
    alert("utilize el formulario");
    location.href = "index.php";
    </script>';
}
?>