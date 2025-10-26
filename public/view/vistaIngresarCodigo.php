 <?php
    $correo = $_GET["correo"];
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>

 <body>
     <form action="../backend/modelo/verificarCodigo.php" method="post">

         <input type="hidden" name="correo" value="<?php echo htmlentities($correo) ?>">
         <input type="number" name="codigo" placeholder="Codgio de Usuario" required>
         <button type="submit" class="btn">Iniciar</button>
     </form>

 </body>

 </html>