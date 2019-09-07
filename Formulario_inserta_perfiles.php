<!doctype html>
<html>
    <style type="text/css">
  #titulo  {text-align: center;} 
  body{background-image: url(librerias/img/fondos/8.png);}
  footer {width:100%; height:50px; background-color:#ccc; margin-top: 50px;}
 </style>
 
    <head>
    
        <meta charset="utf-8">
        <title>Registro de Usuario</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
        
    </head>
    
    <body>
	   <section id="container">
    
        <form action="insertar_registros_perfiles.php" method="get">
         
                <input type="text" name="usu" placeholder="Usuario">
              
                <input type="password" name="con" placeholder="Contraseña">      
            <center>
              <select name="perfil" id="perfil">
                <option>Administrador</option>
                <option>Supervisor</option>
				<option>Auditor</option>
              </select>
            </center>
              <input type="submit" name="enviando" value="Registro">
           
        
        </form>
    </section>
    </body>
    
</html>