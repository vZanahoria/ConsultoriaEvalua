<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="index_admin.php">
            <img src="../images/logo.png" width="60" height="35" >Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gestión
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="valuador.php">Valuador</a></li>
            <li><a class="dropdown-item" href="clasificacion_uso_suelo.php">Clasificacion Uso de Suelo</a></li>
            <li><a class="dropdown-item" href="estado_avaluo.php">Estado Avaluo</a></li>
            <li><a class="dropdown-item" href="estado_pago.php">Estado Pago</a></li>
            <li><a class="dropdown-item" href="estado_reclamacion.php">Estado Reclamación</a></li>
            <li><a class="dropdown-item" href="estado_visita.php">Estado Visita</a></li>
            <li><a class="dropdown-item" href="naturaleza_reclamacion.php">Naturaleza Reclamación</a></li>
            <li><a class="dropdown-item" href="tipo_propiedad.php">Tipo Propiedad </a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gestión de Usuarios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="usuario.php">Usuario</a></li>
            <li><a class="dropdown-item" href="rol.php">Rol</a></li>
            <li><a class="dropdown-item" href="privilegio.php">Privilegio</a></li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gestión de Locaciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="localidad.php">Localidad</a></li>
            <li><a class="dropdown-item" href="municipio.php">Municipio</a></li>
            <li><a class="dropdown-item" href="estado.php">Estado</a></li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php?action=logout">Cerrar Sesión</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>