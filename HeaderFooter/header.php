<header>
  <a href="../index.html"
    ><img class="logo" src="../img/logo-iep.png" alt="Logo"
  /></a>
  <nav>
    <ul class="nav-links">
      <li>
        <a href="../index.html"
          ><i class="fa">&#xf015;</i> Inicio</a
        >
      </li>
      <li>
        <a href="../Proyectos/BuscarProyectos.html"
          ><i class="fa">&#xf002;</i> Proyectos</a
        >
      </li>
      <li>
        <a href="../Proyectos/proximamente.html"
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

<a href="../Proyectos/Panel.php" style="<?php echo $buttonvisible2 ?>"
          ><i class="fa">&#xf2bb;</i> Panel</a
        >
      </li>
    </ul>
  </nav>
  
  <a class="button" href="../Form/login.php" style="<?php echo $buttonvisible ?>"
    ><button>Login</button></a
  >
  <a class="button" href="../Form/CerrarSesion.php" style="<?php echo $buttonvisible1 ?>"
    ><button>Cerrar sesión</button></a
  >
</header>
    <div id="open" class="burger" onclick="mobile()">
      <i class="fa fa-bars"></i>
    </div>
    <div id="close" class="burger" onclick="mobile()">
      <i class="fa fa-times"></i>
    </div>

<div id="nav-mobile">
  <nav>
    <img class="nav-logo" src="../img/Logo.png">
    <ul class="nav-links2">
      <li>
        <a href="../index.html"
          ><i class="fa">&#xf015;</i> Inicio</a
        >
      </li>
      <li>
        <a href="../Proyectos/BuscarProyectos.html"
          ><i class="fa">&#xf002;</i> Proyectos</a
        >
      </li>
      <li>
        <a href="../Info/informacion.html"
          ><i class="fa">&#xf05a;</i> Información</a
        >
      </li>
      <li>
        <div style="<?php echo $buttonvisible2 ?>">
      <a href="../Proyectos/Panel.php"
          ><i class="fa">&#xf2bb;</i> Panel</a
        >
      </div>
      </li>
      <li>
        <div style="<?php echo $buttonvisible ?>">
          <hr>
          <a href="../Form/login.php"
            ><i class="fa">&#xf138;</i> Login</a   
          >
        </div>
      </li>
      <li>
        <div style="<?php echo $buttonvisible1 ?>">
        <hr>
          <a href="../Form/login.php"
            ><i class="fa">&#xf137;</i> Cerrar Sesión</a
          >
        </div>
      </li>
    </ul>
    <br />
  </nav>
  <br />
  <a class="BotonLogin2" href="../Form/login.php"
    ><button>Login</button></a
  >
</div>
<br />

<script src="../js/menu.js"></script>
