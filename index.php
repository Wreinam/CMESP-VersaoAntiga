<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CMESP - Inicio</title>
  
  <link rel="shortcut icon" href="Imagens Sistema/PeixeLogo.svg" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="CssSistema/telaInicial.css">
  <link href="BootsTrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100">
  <div class="h-100 d-none d-lg-block">
    <header class="d-flex p-3 bg-info" style="height: 15%;">
      <div class="w-75">
        <img class="rounded" src="Imagens Sistema/PeixeLogo.svg" width="70">
      </div>
      <div class="w-25 d-flex justify-content-evenly align-items-center texto">
        <button type="button" class="btn rounded-4 w-50 bg-success border-0" style="background: linear-gradient(90deg, #2DF500 0%, rgba(141, 255, 116, 0.8) 99.99%, #2DF500 100%);
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.25);" onclick="window.location.href='Assets/Modulo - Login/Dashboard/login.php'">Login</button>
      </div>
    </header>
    <main  class="mainBackground px-5" style="height: 85%;">
      <div class="d-flex" style="height: 70%;">
        <div class="w-50 pt-4 d-flex flex-column justify-content-center align-items-center">
          <p class="fs-1 text w-50 mb-2 ">BEM-VINDO</p>
          <p class="fs-2 text w-75">A SECRETARIA DE ESPORTES DE SÃO SEBASTIÃO </p>
        </div>
        <div class="w-50 pt-5">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner ">
              <div class="carousel-item text-center active">
                <img src="Imagens Sistema/PeixeLogo.svg" style="width: 60%;" alt="...">
              </div>
              <div class="carousel-item text-center">
                <img src="Imagens Sistema/PeixeLogo.svg" style="width: 60%;" alt="...">
              </div>
              <div class="carousel-item text-center">
                <img src="Imagens Sistema/PeixeLogo.svg" style="width: 60%;" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      <footer class="w-100 d-flex align-items-end justify-content-center" style="height: 30%;">
        <p class="fs-2 text text-white">Deseja praticar esporte?<a href="Assets/Modulo - Inscricao Municipe/Dashboard/inscricao.php" class="text-dark fs-2 text text-decoration-none">Registre-se</a></p>
      </footer>
    </main>
  </div>   
  <div class="h-100 d-lg-none">
    <main class="h-100 w-100">
      <header class="w-100 texto d-flex flex-column align-items-center">
        <img src="Imagens Sistema/PeixeLogo.svg" class="rounded mx-auto d-block pt-5" width="80">
        <p class="fs-1 text-center pt-4">Bem-Vindo</p>
        <p class="fs-2 text-center w-75">A secretaria de esportes de São Sebastião</p>
      </header>
      <div class="pt-5">
        <div id="carouselMobile" class="carousel slide" data-bs-ride="true">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselMobile" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselMobile" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselMobile" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Imagens Sistema/PeixeLogo.svg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Imagens Sistema/PeixeLogo.svg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="Imagens Sistema/PeixeLogo.svg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselMobile" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselMobile" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="pt-5 d-flex justify-content-evenly">
        <button type="button" class="btn rounded-4 w-50 border-0 mx-3 p-2" style="background: linear-gradient(90deg, #2DF500 0%, rgba(141, 255, 116, 0.8) 99.99%, #2DF500 100%);
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.25);" onclick="window.location.href='Assets/Modulo - Login/Dashboard/login.php'">Login</button>
      </div>
      <footer class="w-100 d-flex align-items-end justify-content-center mt-4">
        <p class="fs-5 text text-white">Deseja praticar esporte?<a href="Assets/Modulo - Inscricao Municipe/Dashboard/inscricao.php" class="text-dark fs-2 text text-decoration-none">Registre-se</a></p>
      </footer>
    </main>
  </div>
  <script src="BootsTrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
