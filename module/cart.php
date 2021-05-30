    <!-- Cart -->
    
<?php

if (!$_SESSION['loginSucces']) {
	echo "<script>";
	echo "document.location.replace('/bejelentkezes');";
	echo "alert('Jelentkezzen be, vagy regisztráljon a kosár tartalmának megtekintéséhez.');";
	echo "</script>";
}
$userID = $_SESSION['userID'];
$cartSelect = "SELECT * FROM cart WHERE userID = ('$userID')";
$cartRes = mysqli_query($link, $cartSelect);

?>
		
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Főoldal
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4 pointer" onClick="document.location.href='/kosar'">
				Kosár
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	
	<form class="bg0 p-t-75 p-b-85" method='GET' autocomplete="off" id="updateCart">
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
    if (mysqli_num_rows($cartRes)) {
        while ($cartRow = mysqli_fetch_object($cartRes)) {
			$id = $cartRow->id;
            $name = $cartRow->name;
            $price = $cartRow->price;
			$productID = $cartRow->productID;
			$quantity = $cartRow->quantity;
			$sku = $cartRow->sku;
			$size = $cartRow->size;
			$color = $cartRow->color;
			$overallPrice += ($price * $quantity);

        ?>
							
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1" onclick="document.location.replace('/kosar?deleteid=<?php echo $id ?>')">
											<img src="images/product<?php echo $productID; ?>.jpg" alt="IMG">
										</div>
									</td>
									<td class="column-3"><a href="/item?id=<?php echo $productID; ?>"><?php echo $name; ?></a></td>
									<td class="column-1"><?php echo webshopNumberFormat($price); ?> FT.-</td>
									<td class="column-1">
										<div class="wrap-num-product flex-w m-r-60">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>
									
											<input class="mtext-104 cl3 txt-center num-product" type="number" name="<?php echo $id?>" value="<?php echo $cartRow->quantity ?>">
										<?php
										
										
										?>
											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
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
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<button  name="updateCart" form="updateCart" class="flex-c-m stext-101 cl2 size-119 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" value="updateCart">Kosár frisstítése</button>
						</div>					
					</div>
					
				</div>
				

<?php

	
	$cartSelects = "SELECT * FROM cart";
	$cartRess = mysqli_query($link, $cartSelects);
	if (mysqli_num_rows($cartRess)) {
		while ($cartRows = mysqli_fetch_object($cartRess)) {
			if (isset($_GET[$cartRows->id])) {
				$currID = $_GET[$cartRows->id];
				if ($currID === '0') {
					$sql = "DELETE FROM cart WHERE id = " . $cartRows->id;
				} else {
					$sql = "UPDATE cart SET quantity = " . $currID . " WHERE id = " . $cartRows->id;
				}
				
				mysqli_query($link, $sql);
				echo "<script>";
				echo "document.location.replace('/kosar')";
				echo "</script>";
			} 
			//OVERALL PRICE
		
		

		}
		
	} else {
		if (strlen($_SERVER['REQUEST_URI']) > 30) {
			echo "<script>";
			echo "document.location.replace('/kosar')";
			echo "</script>";
		}
	}

	
//DELETE ITEM

if (isset($_GET['deleteid'])) {
	$deleteID = $_GET['deleteid'];
	$sql = "DELETE FROM cart WHERE id = " . $deleteID;
	mysqli_query($link, $sql);
	echo "<script>";
	echo "document.location.replace('/kosar')";
	echo "</script>";
	
}


?>
			
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Kiszállítás
						</h4>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Fontos:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Egyedül utánvételt támogat a cégünk, nem fogadunk el online bankkártyás fizetést. Másik opció, a boltban való átvétel, A 'rólunk' menüpont alatt találja a címünket. Megértését köszönjük!
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



?>
							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo webshopNumberFormat($overallPrice); ?> FT.-
								</span>
							</div>
						</div>

						<a href="/kicsekkolas" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Kicsekkolás
						</a>
					</div>
				</div>
			</div>
		</div>
	</form>
	
	