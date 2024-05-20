<?php
include '../../controllers/bbdd.php';
session_start();
if (!isset($_SESSION["usuario"])) {
   header("Location: ../../index.html");
   exit;
}
$usuario = $_SESSION["usuario"];

$sql = "SELECT * FROM productos WHERE estado=true";
$stmt = $conn->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE <!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Administración</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../../static/styles/styles_admin.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>


<body>
   <div class="container">
      <?php include 'components/menu_side_bar.html'; ?>
      <div class="right-column">
         <div class="content">
            <div class="header-content">
               <p>Gestor de Productos</p>
               <div style="float: right;">
                  <button class="btn btn-primary" onclick="window.location.href='../admin/productos/crear-producto.php'">Agregar</button>
               </div>
            </div>
            <hr>
            <table>

               <tr>
                  <th class="title-table">Id</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th class="table-action">Acciones</th>
               </tr>
               <?php foreach ($productos as $producto) : ?>
                  <tr>
                     <td><?php echo $producto['id']; ?></td>
                     <td><?php echo $producto['nombre']; ?></td>
                     <td><?php echo $producto['descripcion']; ?></td>
                     <td><?php echo $producto['precio']; ?></td>
                     <td><?php echo $producto['cantidad']; ?></td>
                     <td class="action-cell" style="display:flex; justify-content: center">
                        <div style="width: 50px; " class="mr-1">
                           <!-- Botón para eliminar con color rojo -->
                           <button class="btn btn-danger" onclick="openModal()">
                              <i class="fas fa-trash-alt"></i>
                           </button>
                        </div>
                        <!-- Botón para editar con color gris -->
                        <div style="width: 50px;">
                           <button class="btn btn-secondary">
                              <i class="fas fa-edit"></i>
                           </button>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>

            </table>
            <div class="pagination">
               <a href="#">&laquo;</a>
               <a href="#" class="active">1</a>
               <a href="#">2</a>
               <a href="#">3</a>
               <a href="#">4</a>
               <a href="#">5</a>
               <a href="#">&raquo;</a>
            </div>
         </div>
      </div>

   </div>
</body>

</html>