<?php
session_start();

$con=mysqli_connect("sxb1plcpnl0068.prod.sxb1.secureserver.net","guitarworld","Nickelback11!","guitarworld");
// Check connection
if (mysqli_connect_errno())
  {
  echo "<script type='text/javascript'>alert('Failed to connect to MySQL: ')</script>" . mysqli_connect_error();
  }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="As part of the Interactive Media: Graded Unit 2 (FP25 35) unit, I developed an e-commerce web application, specialising in electric and acoustic guitars. I used HTML5, CSS3, JavaScript, MySQL and PHP to develop the web application. The aim of the project was to demonstrate the significance of server-side scripting. The successful planning, development and evaluation of the project reflected on my overall grade of an A (86%).">
<title>GuitarWorld | Shopping Cart</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../images/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="../images/favicon.ico" type="image/vnd.microsoft.icon" />
</head>

<body>
<div id="container">
  <header>
    <div id="logo"></div>
    <nav>
      <ul>
        <li><a href="../../index.php">Home</a></li>
        <li><a href="guitars.php">Guitars</a>
          <ul>
            <li><a href="electric.php">Electric</a></li>
            <li><a href="acoustic.php">Acoustic</a></li>
          </ul>
        </li>
        <li><a href="register.php">Register</a></li>
      </ul>
    </nav>
  </header>
  <main>
  <div id="content1_shoppingcart">
    <h1>Shopping Cart</h1>
  </div>
  <div id="content2_shoppingcart">
    <?php
	global $con;	
	$id = $_GET['id']; 
	$action = $_GET['action']; 

	// Check of ID exists
	if($id && !productExists($id)) {
		exit("<p>An error occurred</p>");
	}

	switch($action) {
		// Add
		case "add":
			$_SESSION['shoppingcart'][$id]++;
		break;
		// Remove
		case "remove":
			$_SESSION['shoppingcart'][$id]--;
			if($_SESSION['shoppingcart'][$id] == 0) unset($_SESSION['shoppingcart'][$id]);
		break;
		// Empty
		case "empty":
			unset($_SESSION['shoppingcart']);
		break;
	}
	?>
    <?php
	global $con;
	if($_SESSION['shoppingcart']) {
		echo "<table class='guitars'>";
			foreach($_SESSION['shoppingcart'] as $id => $quantity) {	
					$sql = sprintf("SELECT small_image, brand, description, price FROM guitars WHERE id = %d;",$id); 
					$result = mysqli_query($con,$sql);
					if(mysqli_num_rows($result) > 0) {
						list($small_image, $brand, $description, $price) = mysqli_fetch_row($result);
						$line_cost = $price * $quantity;
						$total = $total + $line_cost;
						echo "<tr>";
							echo "<td><img src='$small_image' alt='$brand $description' title='$brand $description'/></td>";
							echo "<td><p>$brand $description</p></td>";
							echo "<td><p>Quantity: $quantity (<a href=\"$_SERVER[PHP_SELF]?action=remove&amp;id=$id\">Remove</a>)</p></td>";
							echo "<td><p>&pound;$line_cost</p></td>";
						echo "</tr>";
					}
	}
	echo "<tr>";
		echo "<td><p><a href='guitars.php'>Continue Shopping</a></p></td>";
		echo "<td><p><a href=\"$_SERVER[PHP_SELF]?action=empty\" onclick=\"return confirm('Are you sure?');\">Empty Shopping Cart</a></p></td>";
		echo "<td><p><strong>Total</strong></p></td>";
		echo "<td><p><strong>&pound;$total</strong></p></td>";
	echo "</tr>";
	echo "</table>";	
	}
	else {
		echo "<p>You have no items in your shopping cart.</p>";
	}
	
// Check if product exists
	function productExists($id) {
	global $con;
		//use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
		$sql = sprintf("SELECT * FROM guitars WHERE id = %d;",$id); 
		return mysqli_num_rows(mysqli_query($con,$sql)) > 0;
	}
	mysqli_close($con);
	?>
  </div>
  </main>
  <footer> <em>&copy; 2011 GuitarWorld</em> </footer>
</div>
</body>
</html>
