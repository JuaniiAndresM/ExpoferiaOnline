<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>Proyectos | Expoferia Online</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/ExpoferiaOnline/js/function.js"></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="/ExpoferiaOnline/css/styles.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap"
      rel="stylesheet"
    />

    
  </head>
  <body onload="hfindex()">
    <div id="header"></div>
    <div class="ProyectosDIV">
      <h2 id="TituloProyectos">Proyectos:</h2>

      <div class="gridProyectos">
        <div class="Linea1Proyecto">
          <div class="Linea2">
            <div class="Linea3">
              <div class="Proyecto">
                <div class="Tabla">

                <script>
                  function create () {
                  $.ajax({
                    url:"/ExpoferiaOnline/Proyectos/ProyectosBE.php", 
                    type: "post", 
                    dataType: 'json', data: {funcion: "crearmenu"}
                    success:function(content){

                    console.log(result);
                  }
                     });
                   }
                <script>
                      
                </div>
              </div>
            </div>
          </div>
        </div>

        
    </div>
    <div id="footer"></div>
  </body>
</html>