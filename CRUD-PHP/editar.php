<?php
    include "conexion.php";
    $id = $con->real_escape_string(htmlentities($_GET['id']));
    $select = $con->query("SELECT id, producto, precio, cantidad, categoria FROM inventario WHERE id = '$id'");
    if ($row = $select->fetch_assoc()) {
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        .form-group{
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-info">
        <a href="#" class="navbar-brand">CRUD</a>
    </nav>
    <div class="container" style="padding-top: 30px;">
        <form action="actualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <div class="form-group">
                <input type="text" name="producto" placeholder="Producto" class="form-control" value="<?php echo $row['producto']?>">
            </div>
            <div class="form-group">
                <input type="number" name="precio" placeholder="Precio" step="0.01" class="form-control" value="<?php echo $row['precio']?>">
            </div>
            <div class="form-group">
                <input type="number" name="cantidad" placeholder="Cantidad" class="form-control" value="<?php echo $row['cantidad']?>">
            </div>
            <div class="form-group">
                <input type="text" name="categoria" placeholder="Categoria" class="form-control" value="<?php echo $row['categoria']?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Actualizar" class="btn btn-info">
            </div>
        </form>
    </div>
</body>
</html>