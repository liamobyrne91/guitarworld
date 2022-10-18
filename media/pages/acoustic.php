<?php
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
<title>GuitarWorld | Acoustic</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href="../css/jquery.fancybox.css" rel="stylesheet" type="text/css">
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
  <div id="content1_acoustic">
    <h1>Acoustic</h1>
  </div>
  <div id="content2_acoustic">
    <table class="guitars">
      <?php
		$sql = "SELECT id, small_image, large_image, brand, description, price FROM guitars WHERE id >= 4;";
		$result = mysqli_query($con, $sql);
		while(list($id, $small_image, $large_image, $brand, $description, $price) = mysqli_fetch_row($result)) {
			echo "<tr>";
				echo "<td><h2>$brand</h2></td>";
			echo "</tr>";
			echo "<tr>";				
				echo "<td><a id='$id' href='$large_image' title='$brand $description'><img src='$small_image' alt='$brand $description'/></a></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td><p>$description</p></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td><p>&pound;$price</p></td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td><a href=\"shoppingcart.php?action=add&amp;id=$id\">Add To Shopping Cart</a></td>";
			echo "</tr>";
		}
	    mysqli_close($con);
	  ?>
      <tr>
        <td><a href="shoppingcart.php">View Shopping Cart</a></td>
      </tr>
    </table>
  </div>
  </main>
  <footer> <em>&copy; 2011 GuitarWorld</em> </footer>
</div>
<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script> 
<script type="text/javascript" src="../js/jquery.fancybox.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
    $("#4").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
      });
    $("#5").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
      });
    $("#6").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
      });
});
</script>
</body>
</html>
