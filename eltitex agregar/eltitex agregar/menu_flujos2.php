<!doctype html>
<html lang="es">
  <?php Include("header.php"); ?>
  <style type="text/css">
      body  {background-image: url(librerias/img/fondos/8.png); background-repeat: no-repeat; background-size:100%;}
  </style>
  <body>
  <?php Include("menu5.php"); ?>
   <main role="main" class="container">
      <section class="container mt-5">
        <div class="row mt-5">
          <div class="text-center col-6">
            <h1 class="text-primary mt-5">MENU DE DIAGRAMAS DE FLUJOS</h1>
          </div>
          <div class="col-6 mt-4">
            <img src="librerias/img/fondos/logo1.png" class="rounded" style="height:210px; width:210px; margin-left:300px; margin-right:auto; display: block;">
          </dir>
        </div>
      </section>

      <section class="container mt-5">
            <div class="row">
              <div class="col-6 mt-5 ">
                <a href="abrirpdf.php" target="_blank"> <img src="librerias/img/iconos/tableta.png" class="rounded" style="width: 125px; height:125px; margin-left:auto; margin-right:auto; display: block;">
                <H4 class="text-center text-primary">FLUJO</H4>
                <H4 class="text-center text-primary">ANTERIOR</H4></a>
              </div>             
              <div class="col-6 mt-5 ">
                <a href="flujonuevo.php" target="_blank"><img src="librerias/img/iconos/foco.png" class="rounded" style="width: 125px; height:125px; margin-left:auto; margin-right:auto; display: block; ">
                <h4 class="text-center text-primary">FLUJO</H4>
                <h4 class="text-center text-primary">NUEVO</H4> </a>
              </div>
<!--               <div class="col-4 mt-5 ">
                <a href="flujonuevo.php" target="_blank"><img src="img/iconos/llave3d.png" class="rounded" style="width: 125px; height:125px; margin-left:auto; margin-right:auto; display: block;">
                <H4 class="text-center text-primary">LOGIN</H4>
              </div>            
 -->            </div>
      </section>
      <br>
      <br>
       </main>

    <script src="librerias/jquery-3.3.1.min.js"> </script>
    <script src="librerias/bootstrap/js/bootstrap.js"> </script>

  </body>

</html>
