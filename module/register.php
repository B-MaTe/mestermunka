<?php
$_SERVER['REQUEST_METHOD'] = "POST";

//$_SESSION['loginSucces'] = false;

if (isset($_POST['registerButton'])) {
  $register = $_POST['register'];
  if (password_verify($register['passwordAgain'], password_hash($register['password'], PASSWORD_DEFAULT))) {
    
    $username = $register['username'];
    $email = $register['email'];
    $hashedPassword = password_hash($register['password'], PASSWORD_DEFAULT);
    $postcode = $register['postcode'];
    $firstname = $register['firstname'];
    $surname = $register['surname'];
    $country = $register['country'];
    $county = $register['county'];
    $city = $register['city'];
    $streetHouseNumber = $register['street'];
    $optional = $register['optional'];
    $id = uniqid(date("Ymd"), false);

    $sql_u = "SELECT * FROM login WHERE username = '$username'";
  	$sql_e = "SELECT * FROM login WHERE email = '$email'";
    $res_u = mysqli_query($link, $sql_u);
  	$res_e = mysqli_query($link, $sql_e);
      if (mysqli_num_rows($res_u) > 0) {
        echo "<script>
              alert('Felhasználónév foglalt!');
              </script>";
      }else if (mysqli_num_rows($res_e) > 0) {
        echo "<script>
              alert('E-Mail foglalt!');
              </script>";	
      } else{
          $sql = "INSERT INTO login (userID, username, surname, firstname, email, password, postcode, country, county, city, streetHouseNumber, optional) 
      	    VALUES ('$id','$username','$surname','$firstname', '$email', '$hashedPassword', '$postcode', '$country', '$county', '$city', '$streetHouseNumber', '$optional')";
          $results = mysqli_query($link, $sql);
          echo "<script>
                alert('Sikeres Regisztráció!');
                document.location.replace('/bejelentkezes');
                </script>";
  	}
  } else {
    echo "<script>
          alert('Jelszavak nem egyeznek!');
          </script>";	
  }

} 
?>



    
<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Regisztrálás</h5>
            <form action="" method="POST" class="form-signin">
              <div class="form-label-group">
                <input type="text" name="register[username]" class="form-control" required autofocus>
                <label>Felhasználónév</label>
              </div>
              <div class="form-label-group">
                <input type="text" name="register[surname]" class="form-control" required autofocus>
                <label>Vezetéknév</label>
              </div>
              <div class="form-label-group">
                <input type="text" name="register[firstname]" class="form-control" required autofocus>
                <label>Keresztnév</label>
              </div>
              <div class="form-label-group">
                <input type="email" name="register[email]" class="form-control" required>
                <label>E-Mail</label>
              </div>
              <div class="form-label-group">
                <input type="password" name="register[password]" class="form-control" required>
                <label>Jelszó</label>
              </div>
              <div class="form-label-group">
                <input type="password" name="register[passwordAgain]" class="form-control" required>
                <label>Jelszó újra</label>
              </div>
              <div class="form-label-group">
                <input type="text" name="register[postcode]" class="form-control" required>
                <label>Irányítószám</label>
              </div>
              <div class="form-label-group">
                <input type="text" name="register[country]" class="form-control" required>
                <label>Ország</label>
              </div>
              <div class="form-label-group">
                <input type="text" name="register[county]" class="form-control" required>
                <label>Megye / Országrész</label>
              </div>
              <div class="form-label-group">
                <input type="text" name="register[city]" class="form-control" required>
                <label>Város</label>
              </div>
              <div class="form-label-group">
                <input type="text" name="register[street]" class="form-control" required>
                <label>Utca, házszám / Körzet, házszám</label>
              </div>
              <div class="form-label-group">
                <input type="text" name="register[streetOptional]" class="form-control">
                <label>Opcionális</label>
              </div>
              <input name="registerButton" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Regisztrálás" >
              <a class="d-block text-center mt-2 small" href="/bejelentkezes">Bejelentkezés</a>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>