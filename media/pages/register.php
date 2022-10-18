<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="As part of the Interactive Media: Graded Unit 2 (FP25 35) unit, I developed an e-commerce web application, specialising in electric and acoustic guitars. I used HTML5, CSS3, JavaScript, MySQL and PHP to develop the web application. The aim of the project was to demonstrate the significance of server-side scripting. The successful planning, development and evaluation of the project reflected on my overall grade of an A (86%).">
<title>GuitarWorld | Register</title>
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
  <div id="content1_register">
    <h1>Register</h1>
    <p><em class="quote">"Register with us today to receive exclusive offers on the latest guitars."</em> - Liam O'Byrne</p>
  </div>
  <div id="content2_register">
    <form id="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <table>
        <tr>
          <td><label for="forename">Forename:</label></td>
          <td><input type="text" id="forename" name="forename"/></td>
        </tr>
        <tr>
          <td><label for="surname">Surname:</label></td>
          <td><input type="text" id="surname" name="surname"/></td>
        </tr>
        <tr>
          <td><label for="email">Email:</label></td>
          <td><input type="email" id="email" name="email"/></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Submit" id="submit" name="submit"/></td>
        </tr>
      </table>
    </form>
  </div>
  </main>
  <footer> <em>&copy; 2011 GuitarWorld</em> </footer>
</div>
<?php
$con=mysqli_connect("sxb1plcpnl0068.prod.sxb1.secureserver.net","guitarworld","Nickelback11!","guitarworld");
// Check connection
if (mysqli_connect_errno())
  {
  echo "<script type='text/javascript'>alert('Failed to connect to MySQL: ')</script>" . mysqli_connect_error();
  }

// Form validation  
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$forename = htmlspecialchars($_POST['forename']);
		$surname = htmlspecialchars($_POST['surname']);
		$email = htmlspecialchars($_POST['email']);
	
		if ($forename == '') {
			echo "<script type='text/javascript'>alert('Please enter your forename')</script>";
			exit();
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$forename)) {
			echo "<script type='text/javascript'>alert('Only letters and white space allowed')</script>";
			exit();
		}
		if ($surname == '') {
			echo "<script type='text/javascript'>alert('Please enter your surname')</script>";
			exit();
		}
		if (!preg_match("/^['a-zA-Z ]*$/",$surname)) {
			echo "<script type='text/javascript'>alert('Only letters and white space allowed')</script>";
			exit();
		}
		if ($email == '') {
			echo "<script type='text/javascript'>alert('Please enter your email')</script>";
			exit();
		}
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		{
			echo "<script type='text/javascript'>alert('Invalid email format')</script>";
			exit();
		}
		$validate_email = "SELECT * FROM registered WHERE email = '$email'";
		
		$run = mysqli_query($con, $validate_email);
		
		if(mysqli_num_rows($run) > 0) {
			echo "<script type='text/javascript'>alert('$email already exists')</script>";
			exit();
		}
		else {
			$to = $email;
			$subject = "Thank you for registering with GuitarWorld!";
			$txt = "$forename $surname, this email confirms your registration with us. We will send you an email with the latest offers very soon.";
			$headers = "From: guitarworld@mail.com";

			mail($to,$subject,$txt,$headers);
		}
								
			$query = "INSERT INTO registered (forename, surname, email)
			VALUES ('$forename', '$surname', '$email')";
			
			if(mysqli_query($con, $query)) {
				echo "<script type='text/javascript'>window.open('registered.php', '_self')</script>";
			}
	}
mysqli_close($con);
?>
</body>
</html>
