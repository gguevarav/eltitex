<!DOCTYPE html>
<html>
    <style type="text/css">
  #titulo  {text-align: center;} 
  body{background-image: url(librerias/img/fondos/8.png);}
  footer {width:100%; height:50px; background-color:#ccc; margin-top: 50px;}
 </style>
    <head>
    
        <meta charset="utf-8">
        <title>Login | Sistema de Autentificacion</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>
    
    <body>
    <section id="container">	
        <form action="pagina_datos_perfiles.php" method="get">

        	<h3>Iniciar Sesión</h3>
			<img src="img/login.png" alt="Login">
        
            <input type="text" name="usu" placeholder="Usuario">
            <input type="password" name="con" placeholder="Contraseña">
              
            
              <input type="submit" name="enviando" value="Login">
           
        
        </form>
    </section>
    </body>
    
</html>