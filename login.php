<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión - USC</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #001f87, #630000);
      color: white;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 400px;
      margin: 50px auto;
      background: rgba(0,0,0,0.6);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,1.2);
    }
    h2 { text-align: center; margin-bottom: 25px; }
    label { display: block; margin: 10px 0 5px; }
    input[type="email"], input[type="password"] {
      width: 100%; padding: 10px; border: none;
      border-radius: 8px; margin-bottom: 15px;
    }
    input[type="submit"] {
      background-color: #221559; color: white; padding: 12px;
      border: none; border-radius: 8px; width: 100%;
      font-size: 16px; cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3d16e1;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Iniciar Sesión</h2>
  <form action="procesar_login.php" method="POST">
    <label>Correo:</label>
    <input type="email" name="correo" required>

    <label>Contraseña:</label>
    <input type="password" name="contrasena" required>

    <input type="submit" value="Ingresar">
  </form>
</div>

</body>
</html>
