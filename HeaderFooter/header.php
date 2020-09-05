<script src="/ExpoferiaOnline/js/menu.js"></script>
<header>
  <a href="/ExpoferiaOnline/index.php"
    ><img class="logo" src="/ExpoferiaOnline/img/Logo.png" alt="Logo"
  /></a>
  <nav>
    <ul class="nav-links">
      <li>
        <a href="/ExpoferiaOnline/index.php"
          ><i class="fa">&#xf015;</i> Inicio</a
        >
      </li>
      <li>
        <a href="/ExpoferiaOnline/Proyectos/BuscarProyectos.html"
          ><i class="fa">&#xf002;</i> Proyectos</a
        >
      </li>
      <li>
        <a href="/ExpoferiaOnline/Info/informacion.html"
          ><i class="fa">&#xf05a;</i> Información</a
        >
      </li>
      <li>

        <?php
        session_start();
            if(isset ($_SESSION['Usuario'])){  
                $buttonvisible = "display: none;";
                $buttonvisible1 = "display: block;";
                $buttonvisible2 = "display: block;";
      
            }else{
                $buttonvisible1 = "display: none;";
                $buttonvisible = "display: block;";
                $buttonvisible2 = "display: none;";
            }
            ?>  

<a href="/ExpoferiaOnline/Proyectos/Panel.php" style="<?php echo $buttonvisible2 ?>"
          ><i class="fa">&#xf2bb;</i> Panel</a
        >
      </li>
    </ul>
  </nav>
  
  <a class="button" href="/ExpoferiaOnline/Form/login.php" style="<?php echo $buttonvisible ?>"
    ><button>Login</button></a
  >
  <a class="button" href="/ExpoferiaOnline/Form/CerrarSesion.php" style="<?php echo $buttonvisible1 ?>"
    ><button>Cerrar sesión</button></a
  >
  <div class="MobileBars">
    <a href="#"><i style="font-size: 25px" class="fa">&#xf0c9;</i></a>
  </div>
</header>
<div class="nav-mobile">
  <nav>
    <h2>Menu:</h2>
    <ul class="nav-links2">
      <li>
        <a href="/ExpoferiaOnline/index.php"
          ><i class="fa">&#xf015;</i> Inicio</a
        >
        <hr>
      </li>
      <li>
        <a href="/ExpoferiaOnline/Proyectos/BuscarProyectos.html"
          ><i class="fa">&#xf002;</i> Proyectos</a
        >
        <hr>
      </li>
      <li>
        <a href="/ExpoferiaOnline/Info/informacion.html"
          ><i class="fa">&#xf05a;</i> Información</a
        >
        <hr>
      </li>
      <li>
        <div style="<?php echo $buttonvisible2 ?>">
      <a href="/ExpoferiaOnline/Proyectos/Panel.php"
          ><i class="fa">&#xf2bb;</i> Panel</a
        >
        <hr>
      </div>
      </li>
      <li>
        <div style="<?php echo $buttonvisible ?>">
          <a href="/ExpoferiaOnline/Form/login.php"
            ><i class="fa">&#xf138;</i> Login</a   
          >
        </div>
      </li>
      <li>
        <div style="<?php echo $buttonvisible1 ?>">
        <hr>
          <a href="/ExpoferiaOnline/Form/login.php"
            ><i class="fa">&#xf137;</i> Cerrar Sesión</a
          >
        </div>
      </li>
    </ul>
    <br />
  </nav>
  <br />
  <a class="BotonLogin2" href="/ExpoferiaOnline/Form/login.php"
    ><button>Login</button></a
  >
</div>
<br />
