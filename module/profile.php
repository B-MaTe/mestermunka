<?php

if(!isset($_SESSION['loginSucces']) || !isset($_SESSION['userID'])) {
    echo "<script>";
    echo "document.location.replace('/');";
    echo "</script>";
} 

$id = $_SESSION['userID'];
$username = $_SESSION['username'];
$dataSelect = "SELECT * FROM login WHERE userID= '$id'";
$dataRes = mysqli_query($link,$dataSelect);
if (mysqli_num_rows($dataRes)) {
	while ($dataRow = mysqli_fetch_object($dataRes)) {
		$idConf = $dataRow->userID;
        $surname = $dataRow->surname;
        $firstname = $firstname = $dataRow->firstname;
        $email = $dataRow->email;
        $country = $dataRow->country;
        $county = $dataRow->county;
        $city = $dataRow->city;
        $postalCode = $dataRow->postcode;
        $streetHouseNumber = $dataRow->streetHouseNumber;
        $optional = $dataRow->optional;
		$oldPSW = $dataRow->password;
	}
	//biztonsagbol
	if ($id != $idConf) {
		echo "<script>";
		echo "document.location.replace('/');";
		echo "</script>";
	}
}




?>

    <div class="p-b-32">
	<hr />
        <h3 class="ltext-105 cl5 txt-center respon1">
            Adatok
        </h3>
		<hr />
    </div>
		<div class="wrap-slick2">
			<div class="p-b-200">
				<form action="/profil" method="post">
					<label class="dataLabel">Felhasználónév</label>
					<input class="dataInput" size="70" type="text" name="data[username]" disabled value="<?php echo $username; ?>" >
					<label class="dataLabel">E-mail</label>
					<input class="dataInput" size="70" type="text" name="data[email]" disabled value="<?php echo $email; ?>" >
					<label class="dataLabel">Vezetéknév</label>
					<input class="dataInput" size="70" type="text" name="data[surname]" required value="<?php echo $surname; ?>" >
					<label class="dataLabel">Keresztnév</label>
					<input class="dataInput" size="70" type="text" name="data[firstname]" required value="<?php echo $firstname; ?>" >
					<label class="dataLabel">Ország</label>
					<input class="dataInput" size="70" type="text" name="data[country]" required value="<?php echo $country; ?>" >
					<label class="dataLabel">Megye</label>
					<input class="dataInput" size="70" type="text" name="data[county]" required value="<?php echo $county; ?>" >
					<label class="dataLabel">Város</label>
					<input class="dataInput" size="70" type="text" name="data[city]" required value="<?php echo $city; ?>" >
					<label class="dataLabel">Irányítószám</label>
					<input class="dataInput" size="70" type="text" name="data[postalCode]" required value="<?php echo $postalCode; ?>" >
					<label class="dataLabel">Utca, házszám</label>
					<input class="dataInput" size="70" type="text" name="data[streetHouseNumber]" required value="<?php echo $streetHouseNumber; ?>" >
					<label class="dataLabel">Opcionális</label>
					<input class="dataInput" size="70" type="text" name="data[optional]" value="<?php echo $optional; ?>" >
					<input type="submit" name="submitDataButton" value="Adatok megváltoztatása" class="flex-c-m stext-103 cl2 size-102 bor2 hov-btn1 p-lr-15 trans-04 pointer" id="submitDataButton">
				</form>
			</div>
		</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitDataButton'])) {
	$data = $_POST['data'];
    $postcodeD = $data['postalCode'];
    $firstnameD = $data['firstname'];
    $surnameD = $data['surname'];
    $countryD = $data['country'];
    $countyD = $data['county'];
    $cityD = $data['city'];
    $streetHouseNumberD = $data['streetHouseNumber'];
    $optionalD = $data['optional'];
	$changeDataUpdate = "UPDATE login SET 
						surname='$surnameD',
						firstname='$firstnameD',
						country='$countryD',
						county='$countyD',
						city='$cityD',
						postcode='$postcodeD',
						streetHouseNumber = '$streetHouseNumberD',
						optional='$optionalD'
						WHERE userID ='$id'";
	mysqli_query($link, $changeDataUpdate);
	echo 	"<script>
			alert('A kívánt adatok sikeresen megváltoztak.');
			</script>";
}
?>

	<div class="p-b-32">
		<hr />
			<h3 class="ltext-105 cl5 txt-center respon1">
				Jelszó megváltoztatás
			</h3>
		<hr />
    </div>
	<div class="wrap-slick2">
			<div class="p-b-200">
				<form action="/profil" method="post">
					<label class="dataLabel">Régi Jelszó</label>
					<input class="dataInput" size="70" type="password" name="passvrfy[old]" required>
					<label class="dataLabel">Új Jelszó</label>
					<input class="dataInput" size="70" type="password" name="passvrfy[new]" required>
					<label class="dataLabel">Új Jelszó Mégegyszer</label>
					<input class="dataInput" size="70" type="password" name="passvrfy[newAgain]" required>
					<input type="submit" name="passVerify" value="Jelszó megváltoztatása" class="flex-c-m stext-103 cl2 size-102 bor2 hov-btn1 p-lr-15 trans-04 pointer" id="submitDataButton">
				</form>
			</div>
		</div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['passVerify'])) {
	$passvrfy = $_POST['passvrfy'];
	if (password_verify($passvrfy['old'], $oldPSW)) {
		if ($passvrfy['new'] === $passvrfy['newAgain']) {
			$newPassword = password_hash($passvrfy['newAgain'], PASSWORD_DEFAULT);
			if (!password_verify($passvrfy['old'], $newPassword)) {
				$pswUpdate = "UPDATE login SET password='$newPassword' WHERE userID = '$id'";
				mysqli_query($link, $pswUpdate);
				echo 	"<script>
							alert('Sikeres jelszó megváltoztatás!');
						</script>";
			} else {
				echo 	"<script>
							alert('Az új jelszó nem lehet ugyanaz, mint a régi!');
						</script>";
			}
			
		} else {
			echo 	"<script>
						alert('Az új jelszavak nem egyeznek!');
					</script>";
		}
	} else {
		echo 	"<script>
					alert('Hibás régi jelszó!');
				</script>";
	}
}
?>