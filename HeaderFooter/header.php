<header>
  <a href="/ExpoferiaOnline/index.html"
    ><img class="logo" src="/ExpoferiaOnline/img/Logo.png" alt="Logo"
  /></a>
  <nav>
    <ul class="nav-links">
      <li>
        <a href="/ExpoferiaOnline/index.html"
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
  
  <a class="BotonLogin" href="/ExpoferiaOnline/Form/login.html" style="<?php echo $buttonvisible ?>"
    ><button>Login</button></a
  >
  <a class="BotonLogin" href="/ExpoferiaOnline/Form/CerrarSesion.php" style="<?php echo $buttonvisible1 ?>"
    ><button>Cerrar sesión</button></a
  >
  <div class="MobileBars">
    <a href="#"><i style="font-size: 25px" class="fa">&#xf0c9;</i></a>
  </div>
</header>
<div class="nav-mobile">
  <nav>
    <ul class="nav-links2">
      <li>
        <a href="/ExpoferiaOnline/index.html"
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
        <a href="/ExpoferiaOnline/Proyectos/Panel.php"
          ><i class="fa">&#xf2bb;</i> Panel</a
        >
      </li>
      <li>
        <a href="/ExpoferiaOnline/Form/login.html"
          ><i class="fa">&#xf138;</i> Login</a
        >
      </li>
    </ul>
    <br />
  </nav>
  <br />
  <a class="BotonLogin2" href="/ExpoferiaOnline/Form/login.html"
    ><button>Login</button></a
  >
</div>
<br />
<script src="/ExpoferiaOnline/js/menu.js"></script>
