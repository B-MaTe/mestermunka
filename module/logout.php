<?php

if (isset($_SESSION['loginSucces'])) {
    unset($_SESSION['loginSucces']);   
}
if (isset($_SESSION['userID'])) {
    unset($_SESSION['userID']);   
    
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}
}


    echo "<script>;
        alert('Sikeres kijelentkezés!')
        document.location.replace('/');
        </script>";

?>



