<!doctype html>
<html lang="es">
  <?php Include("header.php"); ?>
  <style type="text/css">
      body  {background-image: url(librerias/img/fondos/8.png); background-repeat: no-repeat; background-size:100%;}
  </style>
  <body>
  <?php Include("menu4.php"); ?>
   <main role="main" class="container">
      <section class="container mt-5">
        <div class="row mt-5">
          <div class="text-center col-6">
            <h2 class="text-primary mt-5">MENU DE SUPERVISION</h2>
          </div>
          <div class="col-6 mt-4">
            <img src="librerias/img/fondos/logo1.png" class="rounded" style="height:210px; width:210px; margin-left:300px; margin-right:auto; display: block;">
          </dir>
        </div>
      </section>

      <section class="container">
            <div class="row">
              <div class="col-3 mt-3 ">
            <!-- si se quiere una ventana nueva hay que poner la instruccion target="_blank" dentro de a -->
                <a href="vista/kpi.php" ><img src="librerias/img/iconos/kpi.png" class="rounded" style="width: 75px; height:75px; margin-left:auto; margin-right:auto; display: block; ">
                <h4 class="text-center text-primary">KPI</H4> </a>
              </div>
              <div class="col-3 mt-3 ">
                <a href="vista/proceso.php" > <img src="librerias/img/iconos/proceso.png" class="rounded" style="width: 75px; height:75px; margin-left:auto; margin-right:auto; display: block;">
                <H4 class="text-center text-primary">PROCESOS</H4></a>

              </div>             
              <div class="col-3 mt-3 ">
                <a href="vista/parametros.php" > <img src="librerias/img/iconos/parametros.png" class="rounded" style="width: 75px; height:75px; margin-left:auto; margin-right:auto; display: block;">
                <H4 class="text-center text-primary">PARAMETROS</H4></a>
              </div>             

              <div class="col-3 mt-3 ">
                <a href="vista/puesto.php" > <img src="librerias/img/iconos/puesto.png" class="rounded" style="width: 75px; height:75px; margin-left:auto; margin-right:auto; display: block;">
                <H4 class="text-center text-primary">PUESTO</H4></a>
              </div>             

              <div class="col-3 mt-3 ">
                <a href="vista/departamento.php" > <img src="librerias/img/iconos/departamento.png" class="rounded" style="width: 75px; height:75px; margin-left:auto; margin-right:auto; display: block;">
                <H4 class="text-center text-primary">DEPARTAMENTOS</H4></a>
              </div>             

              <div class="col-3 mt-3 ">
                <a href="vista/empleado.php" > <img src="librerias/img/iconos/empleado.png" class="rounded" style="width: 75px; height:75px; margin-left:auto; margin-right:auto; display: block;">
                <H4 class="text-center text-primary">EMPLEADOS</H4></a>
              </div>             
			<!--
              <div class="col-3 mt-3 ">
                <a href="vista/control.php"> <img src="librerias/img/iconos/control.png" class="rounded" style="width: 75px; height:75px; margin-left:auto; margin-right:auto; display: block;">
                <H4 class="text-center text-primary">FORMULARIO</H4></a>
              </div>             
			-->

            </div>
      </section>
      <br>
      <br>
       </main>

    <script src="librerias/jquery-3.3.1.min.js"> </script>
    <script src="librerias/bootstrap/js/bootstrap.js"> </script>

  </body>

</html>
