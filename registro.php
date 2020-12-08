<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="recursos/css/estilosRegistro.css">
    <title>Document</title>
</head>
<body>
<div id="contenedor">
    <form action="procesos/login/registro.php" method="POST" id="form">
     <div id="divCamposBoton">   
       <input type="text" name="nombre" placeholder="NOMBRE">
       <input type="text" name="apellido" placeholder="APELLIDO MATERNO">
       <input type="email" name="email" placeholder="E-MAIL">
       <input type="text" name="usuario" placeholder="USUARIO">
       <input type="password" name="password" placeholder="CONTRASEÑA">
       <button id="entrarB">REGISTRAR</button>
     </div>
       <a href="index.php" id="registroLink">LOGIN</a>
       
    </form>

</div>
</body>
</html>