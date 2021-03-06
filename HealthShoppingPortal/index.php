 <?php
   session_start();
   require_once "pdo.php";
  if(isset($_SESSION["uname"]))
  {
    unset($_SESSION["uname"]);
  }
  if(isset($_SESSION["id_cust"]))
  {
    unset($_SESSION["id_cust"]);
  }


?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shopping Portal</title>
    <link rel="stylesheet" href="style.css"> </link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>
<body>
    <header>
    <nav class="navbar navbar-light" >
    <a class="navbar-brand" href="index.php">
      <img src="logo.PNG" id="logo" alt="Home" loading="lazy">
    </a>

    <ul class="nav justify-content-end">
        
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
      </ul>
    </nav>
    </header>
    
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" >
          <div class="carousel-item active" data-interval="2000">
            <img src="health1.jpg" class="d-block w-100" style="width: 1100px; height: 600px; opacity: 0.8;">
            <div class="carousel-caption d-none d-md-block" style="margin-bottom: 250px;">
              <h1 class="titleFont">Welcome to The Health Shop</h1>
            </div>
          </div>
          <div class="carousel-item" data-interval="2000">
            <img src="health2.jpg" class="d-block w-100" style="width: 1100px; height: 600px; opacity:0.8">
            <div class="carousel-caption d-none d-md-block" style="margin-bottom: 250px;">
                <h1 class="titleFont">Welcome to The Health Shop</h1>
              </div>
          </div>
          <div class="carousel-item" >
            <img src="health3.jpg" class="d-block w-100" style="width: 1100px; height: 600px; opacity:0.8">
            <div class="carousel-caption d-none d-md-block" style="margin-bottom: 250px;">
                <h1 class="titleFont">Welcome to The Health Shop</h1>
              </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</body>
</html>