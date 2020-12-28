<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
    # code...
    $producto = $_POST['producto'];//forma menos seguras de traer datos de un formulario
    $precio = htmlentities($_POST['precio']);//FORMA MEDIA SEGURA PARA SQL INJECTIONS
    $cantidad = $con->real_escape_string(htmlentities($_POST['cantidad']));//Forma mas segura contra SQL INJECTIONS
    $categoria = $con->real_escape_string(htmlentities($_POST['categoria']));  
    $id = '';
    //FORMA COMPLETA
//    $sql = $con->query("INSERT INTO inventario (id, producto, precio, cantidad, categoria) VALUES (default, '$producto', '$precio', '$cantidad', '$categoria')");

    //guardar de forma corta
    // $sql2 = $con->query("INSERT INTO inventario VALUES (default, '$producto', '$precio', '$cantidad', '$categoria')");
    //Guardar por consulta preparada LA FORMA MAS RECOMENDABLE CONTRA SQL INJECTION
    $sql3 = $con->prepare("INSERT INTO inventario VALUES (?,?,?,?,?) ");
    $sql3->bind_param("isdis",$id,$producto,$precio,$cantidad,$categoria);
    if ($sql3->execute()) {
        # code...
        header("location:index.php");
    }else{
        echo 'datos no guardados';
    }
$sql3->close();
$con->close();
}else{
    echo '<script>
    alert("utilize el formulario");
    location.href = "index.php";
    </script>';
}
?>