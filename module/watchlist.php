<?php

if (!$_SESSION['loginSucces']) {
	echo "<script>";
	echo "document.location.replace('/bejelentkezes');";
	echo "alert('Jelentkezzen be, vagy regisztráljon a kívánságlista tartalmának megtekintéséhez.');";
	echo "</script>";
}
$userID = $_SESSION['userID'];
$wishSelect = "SELECT * FROM wishlist WHERE userID = ('$userID')";
$wishRes = mysqli_query($link, $wishSelect);

?>
		
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Főoldal
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4 pointer" onClick="document.location.href='/kivansaglista'">
				Kívánságlista
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
                                </tr>
                                <?php
	if (!isset($overallPrice)) {
		$overallPrice = 0;
	}
    if (mysqli_num_rows($cartRes)) {
        while ($wishRow = mysqli_fetch_object($wishRes)) {
			$id = $wishRow->id;
            $name = $wishRow->name;
            $price = $wishRow->price;
			$productID = $wishRow->productID;
			$sku = $wishRow->sku;
			$overallPrice += $price;

        ?>
							
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1" onclick="document.location.replace('/wishlist?deleteid=<?php echo $id ?>')">
											<img src="images/product<?php echo $productID; ?>.jpg" alt="IMG">
										</div>
									</td>
									<td class="column-3"><a href="/item?id=<?php echo $productID; ?>"><?php echo $name; ?></a></td>
									<td class="column-1"><?php echo webshopNumberFormat($price); ?> FT.-</td>
									<td class="column-1"><?php echo webshopNumberFormat($price) ?> FT.-</td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
							</table>
						</div>
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<span class="flex-c-m stext-101 cl2 size-119 bor13 p-lr-15 trans-04 m-tb-5"><?php echo webshopNumberFormat($overallPrice) ?> FT.-</span>
						</div>					
					</div>
					
				</div>
				

<?php

	
//DELETE ITEM

if (isset($_GET['deleteid'])) {
	$deleteID = $_GET['deleteid'];
	$sql = "DELETE FROM wishlist WHERE id = " . $deleteID;
	mysqli_query($link, $sql);
	echo "<script>";
	echo "document.location.replace('/kosar')";
	echo "</script>";
	
}


?>
			
			</div>
		</div>
	</form>
	
	