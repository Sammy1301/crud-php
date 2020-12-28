<?php
    include "conexion.php";
    $select = $con->query("SELECT id, producto, precio, cantidad, categoria FROM inventario");
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
    <nav class="navbar navbar-light bg-warning">
        <a href="#" class="navbar-brand">CRUD</a>
    </nav>
    <div class="container" style="padding-top: 30px;">
        <form action="guardar.php" method="post">
            <div class="form-group">
                <input type="text" name="producto" placeholder="Producto" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" name="precio" placeholder="Precio" step="0.01" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" name="cantidad" placeholder="Cantidad" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="categoria" placeholder="Categoria" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-info">
            </div>
        </form>
    </div>

    <div class="container">
        
        <table class="table">
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Categoria</th>
            <?php while ($row = $select->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['producto'] ?></td>
                <td><?php echo "$".number_format($row['precio'],2) ?></td>
                <td><?php echo $row['cantidad'] ?></td>
                <td><?php echo $row['categoria'] ?></td>
                <td><a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-warning" >Editar</a></td>
                <td><a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger" >Eliminar</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>