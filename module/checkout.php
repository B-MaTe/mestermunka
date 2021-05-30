<!-- breadcrumb -->
<?php

if (!$_SESSION['loginSucces']) {
	echo "<script>";
	echo "document.location.replace('/bejelentkezes');";
	echo "</script>";
}
$userID = $_SESSION['userID'];
$orderSelect = "SELECT * FROM cart WHERE userID = ('$userID')";
$orderRes = mysqli_query($link, $orderSelect);

?>


<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Főoldal
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4 pointer" onClick="document.location.href='/kosar'">
				Kosár
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</span>
            <span class="stext-109 cl4">
				Kicsekkolás
			</span>
		</div>
	</div>




	<!-- Shoping Cart -->
	
	<form class="bg0 p-t-75 p-b-85" method='POST' autocomplete="off" id="sendOrder">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-14 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">				
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Termék</th>
									<th class="column-3"></th>
									<th class="column-1">Ár</th>
									<th class="column-1">Mennyiség</th>
									<th class="column-1">Méret</th>
									<th class="column-1">Szín</th>
									<th class="column-1">Összesen</th>
                                </tr>
                                <?php
	if (!isset($overallPrice)) {
		$overallPrice = 0;
	}
    if (mysqli_num_rows($orderRes)) {
        while ($orderRows = mysqli_fetch_object($orderRes)) {
			$id = $orderRows->id;
            $name = $orderRows->name;
            $price = $orderRows->price;
			$productID = $orderRows->productID;
			$quantity = $orderRows->quantity;
			$sku = $orderRows->sku;
			$size = $orderRows->size;
			$color = $orderRows->color;
			$overallPrice += ($price * $quantity);

        ?>
							
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart2">
											<img src="images/product<?php echo $productID; ?>.jpg" alt="IMG">
										</div>
									</td>
									<td class="column-3"><a href="/item?id=<?php echo $productID; ?>"><?php echo $name; ?></a></td>
									<td class="column-1"><?php echo webshopNumberFormat($price); ?> FT.-</td>
									<td class="column-1"><?php echo $quantity; ?></td>
									<td class="column-1"><?php echo $size; ?></td>
									<td class="column-1"><?php echo getRealColor(strtolower($color)); ?></td>
									<td class="column-1"><?php echo webshopNumberFormat($quantity * $price) ?> FT.-</td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
							</table>
						</div>					
					</div>
					
				</div>
				

<?php

	
	$orderSelect = "SELECT * FROM cart";
	$orderRes = mysqli_query($link, $orderSelect);
	if (mysqli_num_rows($orderRes)) {
		while ($orderRows = mysqli_fetch_object($orderRes)) {
			if (isset($_GET[$orderRows->id])) {
				$currID = $_GET[$orderRows->id];
				if ($currID === '0') {
					$sql = "DELETE FROM cart WHERE id = " . $orderRows->id;
				} else {
					$sql = "UPDATE cart SET quantity = " . $currID . " WHERE id = " . $orderRows->id;
				}
				
				mysqli_query($link, $sql);
				echo "<script>";
				echo "document.location.replace('/kosar')";
				echo "</script>";
			} 
		}
	}

	
//DELETE ITEM




$checkoutSelect = "SELECT userID,surname,firstname,email,postcode,country,county,city,streetHouseNumber,optional FROM login WHERE userID = ('$userID')";
$checkoutRes = mysqli_query($link, $checkoutSelect);
if (mysqli_num_rows($checkoutRes)) {
    while ($checkoutRow = mysqli_fetch_object($checkoutRes)) {
        $surname = $checkoutRow->surname;
        $firstname = $checkoutRow->firstname;
        $email = $checkoutRow->email;
        $country = $checkoutRow->country;
        $county = $checkoutRow->county;
        $city = $checkoutRow->city;
        $postalCode = $checkoutRow->postcode;
        $streetHouseNumber = $checkoutRow->streetHouseNumber;
        $optional = $checkoutRow->optional;

    }
}
?>
			
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-15">
							Végleges információk
						</h4>

						<div class="flex-w flex-t bor12 p-t-15 p-b-15">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Teljes név
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
                                    <?php echo $surname . " " . $firstname; ?>
								</p>
							</div>
						</div>
                        <div class="flex-w flex-t bor12 p-t-15 p-b-15">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									E-Mail
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
                                    <?php echo $email; ?>
								</p>
							</div>
						</div>
                        <div class="flex-w flex-t bor12 p-t-15 p-b-15">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Ország
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
                                <?php echo $country; ?>
								</p>
							</div>
						</div>
                        <div class="flex-w flex-t bor12 p-t-15 p-b-15">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Megye
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
                                <?php echo $county; ?>
								</p>
							</div>
						</div>
                        <div class="flex-w flex-t bor12 p-t-15 p-b-15">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Város, Irányítószám
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
                                <?php echo $city . ", " . $postalCode; ?>
								</p>
							</div>
						</div>
                        <div class="flex-w flex-t bor12 p-t-15 p-b-15">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Utca Házszám, Opcionális
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
                                <?php echo $streetHouseNumber . " " . $optional; ?>
								</p>
							</div>
						</div>
						<div class="flex-w flex-t bor12 p-t-15 p-b-15">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Fizetés módja
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
                                	Utánvétel
								</p>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Összesen:
								</span>
							</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['placeOrder'])) {
	$placeOrderSelect = "SELECT id,quantity,productID FROM cart WHERE userID = '$userID'";
	$placeOrderRes = mysqli_query($link, $placeOrderSelect);
	if (mysqli_num_rows($placeOrderRes)) {
		while ($placeOrderRow = mysqli_fetch_object($placeOrderRes)) {
			$id = $placeOrderRow->id;
			$amount = $placeOrderRow->quantity;
			$productID = $placeOrderRow->productID;
			$updateProduct = "UPDATE product SET stock = stock-$amount, sold = sold+$amount WHERE id = '$productID'";
			$sqlUpdate = mysqli_query($link, $updateProduct);
			$deleteCart = "DELETE FROM cart WHERE id = $id";
			$sqlDelete = mysqli_query($link, $deleteCart);
		}
		echo "<script>";
		echo "document.location.replace('/');";
		echo "</script>";
	}
}

?>
							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo webshopNumberFormat($overallPrice); ?> FT.-
								</span>
							</div>
						</div>
					<form>
						<input type="submit" name="placeOrder" value="Megrendelés" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
					</form>
					</div>
				</div>
			</div>
		</div>
	</form>