
<?php
    require_once "pdo.php";
    session_start();
    if(isset($_POST["RegisterButton"]))
	  {	
      if(!( isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["city"]) && isset($_POST["emailadd"]) && isset($_POST["state"])
      && isset($_POST["confirmPassword"]) && isset($_POST["address"]) && isset($_POST["pincode"]) && isset($_POST["password"]) ))
      {
        $_SESSION['error'] ="All fields are required";
      }
      elseif(strlen($_POST["name"])<1 || strlen($_POST["address"])<1 || strlen($_POST["phone"])<1 || strlen($_POST["emailadd"])<1 || strlen($_POST["password"])<1
      || strlen($_POST["city"])<1 || strlen($_POST["pincode"])<1 || strlen($_POST["state"])<1 || strlen($_POST["confirmPassword"])<1)
      {
        $_SESSION['error'] ="All fields are required";
      }
      elseif(1 === preg_match('~[0-9]~', $_POST["name"]))
      {
        $_SESSION['error'] ="Please enter valid name.";
      }
      elseif(!(is_numeric($_POST["phone"])&&strlen($_POST["phone"])==10))
      {
        $_SESSION['error'] ="Please enter 10 digit phone number.";
      }
      elseif (!(filter_var($_POST["emailadd"], FILTER_VALIDATE_EMAIL))) {
        $_SESSION['error'] ="Please enter valid email address.";
      }
      elseif(is_numeric($_POST["address"]))
      {
        $_SESSION['error'] ="Please enter valid address.";
      }
      elseif(1 === preg_match('~[0-9]~', $_POST["city"]))
      {
        $_SESSION['error'] ="Please enter valid city name.";
      }
      elseif(1 === preg_match('~[0-9]~', $_POST["state"]))
      {
        $_SESSION['error'] ="Please enter valid state name.";
      }
      elseif(!(is_numeric($_POST["pincode"])&&strlen($_POST["pincode"])==6))
      {
        $_SESSION['error'] ="Please enter 6 digit pincode.";
      }
      elseif (strlen($_POST["password"]) < 8) {
        $_SESSION['error'] = "Your Password Must Contain At Least 8 Characters!";
      }
      elseif (strlen($_POST["password"]) > 15) {
        $_SESSION['error'] = "Your Password Must Contain At most 15 Characters!";
      }
      elseif(!preg_match("#[0-9]+#",$_POST["password"])) {
        $_SESSION['error'] = "Your Password Must Contain At Least 1 Number!";
      }
      elseif(!preg_match("#[A-Z]+#",$_POST["password"])) {
        $_SESSION['error'] = "Your Password Must Contain At Least 1 Capital Letter!";
      }
      elseif(!preg_match("#[a-z]+#",$_POST["password"])) {
        $_SESSION['error'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
      }
      elseif(!preg_match("#[\W]+#",$_POST["password"])) {
        $_SESSION['error'] = "Your Password Must Contain At Least 1 Special Letter!";
      }
      elseif($_POST["password"]!=$_POST["confirmPassword"])
      {
        $_SESSION['error'] ="Please enter same password.";
      }
      else
      {
        $stmt = $pdo->prepare('select cust_id from customer where email = :id');
        $stmt->execute(array( ':id' => $_POST['emailadd']));
        if($user = $stmt->fetch(PDO::FETCH_ASSOC))
        {
          $_SESSION['error'] ="Email address already exist. Please try with other email address.";
        }
        else{
          $stmt = $pdo->prepare('select cust_id from customer where phoneno = :id');
          $stmt->execute(array( ':id' => $_POST['phone']));
          if($user = $stmt->fetch(PDO::FETCH_ASSOC))
          {
            $_SESSION['error'] ="Phone number already exist. Please try with other phone number.";
          }
          else
          {
            $stmt = $pdo->prepare('INSERT INTO customer (name, address, phoneno, email, pass, city, state, pincode) VALUES ( :nm, :add, :ph, :em, :ps, :ci, :st, :pi)');
            $stmt->execute(array( ':nm' => $_POST['name'], ':add' => $_POST['address'], ':ph' => $_POST['phone'], ':em' => $_POST['emailadd'],
            ':ps' => $_POST['password'], ':ci' => $_POST['city'], ':st' => $_POST['state'], ':pi' => $_POST['pincode']));
            $_SESSION['success'] = "Record added successfully.";
            header("Location: login.php");
            return;
          }
        }
      }
      header("Location: register.php");
      return;
    }
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shopping Portal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <style>
      #loginDiv{
        height: 100vh;
      }
      #formLogin{
        height: 90%;
      }
    </style>

</head>



<body>
    <header>
    <nav class="navbar navbar-light" >
    <a class="navbar-brand" href="index.php">
      <img src="logo.PNG" id="logo" alt="Home" loading="lazy">
    </a>

    <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </nav>
    </header>

    
    <div id="loginDiv">
      <div id='formLogin'>
          <span id='loginSpan'>Register</span>
          <form id='registrationForm' name ='loginFormValid' onsubmit="return validate()" method="POST" >
          <?php
          if ( isset($_SESSION['error']) ) {
            echo('<div class="alert alert-danger" role="alert" style="display: block;  width: 60%; margin: 0px auto 0px auto;">');
            echo(htmlentities($_SESSION['error'])."&#128533;</p></div>\n");
            unset($_SESSION['error']);
          }
          ?>

            <div class="input-group input-group-sm mb-3" style="padding-left: 10%; padding-right: 10%;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Name - </span>
              </div>
              <input type="text" class="form-control" id="name" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            
            <div class="input-group input-group-sm mb-3" style="padding-left: 10%; padding-right: 10%;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Phone No. - </span>
              </div>
              <input type="number" class="form-control" id="phone" name="phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3" style="padding-left: 10%; padding-right: 10%;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Email ID - </span>
              </div>
              <input type="email" class="form-control" id="email" name="emailadd" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3" style="padding-left: 10%; padding-right: 10%;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Address - </span>
              </div>
              <input type="text" class="form-control" id="address" name="address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3" style="padding-left: 10%; padding-right: 10%;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">City - </span>
              </div>
              <input type="text" class="form-control" id="city" name="city" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3" style="padding-left: 10%; padding-right: 10%;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">State - </span>
              </div>
              <input type="text" class="form-control" id="state" name="state"aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3" style="padding-left: 10%; padding-right: 10%;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Pincode - </span>
              </div>
              <input type="number" class="form-control" id="pincode" name="pincode" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3" style="padding-left: 10%; padding-right: 10%;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Password - </span>
              </div>
              <input type="password" class="form-control" id="password" name="password"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3" style="padding-left: 10%; padding-right: 10%;">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Confirm Password - </span>
              </div>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
          
            <button type="submit"  class="btn btn-success" id="RegisterButton" name="RegisterButton">Register</button>
            <button type="reset" class="btn btn-secondary" id="ClearButton">Clear</button>
            <div style="margin-top: 20px;">
            <span>Already have an account? </span>
            <a href="login.html" id="linkRegister">Login</a>
            </div>
          </form>
      </div>
      </div>
    <script lang="JavaScript" src="register.js"></script>
</body>
</html>
