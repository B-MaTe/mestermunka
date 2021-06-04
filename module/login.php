<?php
if (isset($_SESSION['loginSucces'])) {
  echo "<script>;
  document.location.replace('/');
   </script>";
} else {
  $_SERVER['REQUEST_METHOD'] = "POST";
  if (isset($_POST["btn-ok"])) {
          $login = $_POST["login"];
          $nameEmail = $login['username'];
          $password = $login["password"];
          if ($nameEmail != "" && $password != "") {
            $loginSelect = "SELECT * FROM login";
            $loginRes = mysqli_query($link, $loginSelect);
            if (mysqli_num_rows($loginRes)) {
              while ($loginRow = mysqli_fetch_object($loginRes)) {
                if ($loginRow->username == $nameEmail || $loginRow->email == $nameEmail) {
                  if (password_verify($password, $loginRow->password)) {
                    $_SESSION['userID'] = $loginRow->userID;
                    $_SESSION['username'] = $loginRow->username;
                    $_SESSION['loginSucces'] = true;
                  ?>
                  <input hidden type="text" name="lastPage" id="lastPage" value="<?php echo $_SESSION['lastPage']; ?>">
                  <?php
                    echo "<script>
                      document.location.replace(document.getElementById('lastPage').value)
                      alert('Sikeres bejelentkezés!')
                      </script>";
                  
                  }
                }
              }
              if (!isset($_SESSION['loginSucces'])) {
                echo "<script>
                      alert('Helytelen Adatok!');
                      </script>";	
              }
            } 
          } else {
            // Allitolag ide nem juthat el a kod, csak biztonsagbol.
                echo "<script>
                    alert('Minden mezőt kikell tölteni!');
                    </script>";
          } 
    }
  
      

  ?>
      <div class="container-input">
        <div class="col-lg-10 col-xl-9 mx-auto">
          <div class="card card-signin flex-row my-5">
            <div class="card-img-left d-none d-md-flex">
              </div>
              <div class="card-body">
                <h5 class="card-title text-center">Bejelentkezés</h5>
                  <form action="" method="POST" class="form-signin">
                    <div class="form-label-group">
                      <input type="text" name="login[username]" class="form-control" required autofocus>
                      <label for="inputUsername">Felhasználónév / E-mail cím</label>
                    </div>
                    <div class="form-label-group">
                      <input type="password" name="login[password]" class="form-control" required>
                      <label for="inputPassword">Jelszó</label>
                    </div>
                    <input type="submit" name="btn-ok" class="btn btn-lg btn-primary btn-block text-uppercase" value="Bejelentkezés" >
                  </form>
              <a class="d-block text-center mt-2 small" href="/regisztralas">Regisztrálás</a>
            </div>
          </div>
        </div>
      </div>
  
  <?php
}
?>






