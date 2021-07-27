<?php 


 ?>

 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style type="text/css">
:root {
  --input-padding-x: .75rem;
  --input-padding-y: .75rem;
}

html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 420px;
  padding: 15px;
  margin: 0 auto;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group > input,
.form-label-group > label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group > label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0; /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}
</style> 
   <title>Document</title>
 </head>
 <body class="text-center">



<!-- <div class="dropdown-menu"> -->
  <form class="form-signin" name="login" method="get" 
  action="../model/acceso.php"  >
  <div class="text-center mb-4">
        <img class="mb-4" src="../../im/modelo.png" alt="" width="140" height="140">
        <h1 class="h3 mb-3 font-weight-normal">Bienvenido al sistema.<br><br>Necesitas ser administrador para ingresar a esta parte<br><br>Ingrese sus datos.</h1>
      </div>
    <div class="form-group">
       <label for="nombre">Email usuario</label>
        <input type="email" id="Correo" class="form-control" name="Correo" placeholder="Correo electronico" required autofocus>
      </div>
     <div class="form-group">
      <label for="exampleDropdownFormPassword2">Contraseña</label>
      <input type="password" name="Clave" class="form-control" id="exampleDropdownFormPassword2"
       placeholder="Password" value="" required>
      </div><br>
    
     <button type="submit" name="Entrar" class="btn btn-success" action="../model/accesoeje.php">Acceder</button>
  </form>

<!--</div>-->
<footer>
 
</footer>
 </body>
 </html>