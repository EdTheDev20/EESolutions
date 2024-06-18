<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="/eesolutions/assets/icons/genetic-data-svgrepo-com.svg" type="image/x-icon">
  <link rel="stylesheet" href="/eesolutions/css/style.css" />
  <link rel="stylesheet" href="/eesolutions/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/eesolutions/node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/eesolutions/css/error.css">
  <title>EESolutions</title>
</head>

<body>
  <!-- Page start -->
  <nav class="navbar bg-dark navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
      <!--Nav Brand-->
      <a href="/eesolutions/" class="navbar-brand">
        <img src="/eesolutions/assets/icons/genetic-data-svgrepo-com.svg" alt="" width="30" height="24" />
        EESolutions</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!--Links da Navbar-->
          <li class="nav-item">
            <a href="/eesolutions/" class="nav-link active">Home</a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">Outdoors</a>
          </li>

          <li class="nav-item">
            <a href="/eesolutions/about" class="nav-link">Sobre</a>
          </li>

          <li class="nav-item ms-2 d-none d-md-inline">
            <a href="/eesolutions/outdoors" class="btn btn-secondary">Alugue já</a>
          </li>
        </ul>
      </div>

      <?php
      if (!isset($_SESSION['nome'])) {
        //Se não estiver set, apresente o botão de login.
        ?>
        <div id="loginbutton">
          <a href="/eesolutions/login" role="button">
            <button type="button" class="btn btn-outline-secondary">
              Login
            </button>

          </a>
        </div>
        <?php
      } else { ?>
        <div class="mx-2">
          <a class="btn btn-outline-secondary" href="/eesolutions/dashboard" role="button">
            <span><i class="bi bi-person-circle"></i></span> <?php echo $_SESSION['nome']; ?> </a>
        </div>

        <div class="mx-2">
          <a class="btn btn-outline-secondary" href="/eesolutions/logout" role="button"> <span><i
                class="glyphicon glyphicon-log-out"></i></span> Terminar Sessão </a>
        </div>

        <?php
      } ?>

    </div>
  </nav>