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


    echo "<script>";
	echo "document.location.replace('/');";
	echo "</script>";

?>



