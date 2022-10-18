<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="As part of the Interactive Media: Graded Unit 2 (FP25 35) unit, I developed an e-commerce web application, specialising in electric and acoustic guitars. I used HTML5, CSS3, JavaScript, MySQL and PHP to develop the web application. The aim of the project was to demonstrate the significance of server-side scripting. The successful planning, development and evaluation of the project reflected on my overall grade of an A (86%).">
<title>GuitarWorld</title>
<link href="media/css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="media/images/favicon.ico" />
</head>

<body>
<div id="container">
  <header>
    <div id="logo"></div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="media/pages/guitars.php">Guitars</a>
          <ul>
            <li><a href="media/pages/electric.php">Electric</a></li>
            <li><a href="media/pages/acoustic.php">Acoustic</a></li>
          </ul>
        </li>
        <li><a href="media/pages/register.php">Register</a></li>
      </ul>
    </nav>
  </header>
  <main>
  <div id="content_index">
    <video id="video" controls>
      <source src="media/video/guitarworld.mp4" type="video/mp4">
      <p>Your browser does not support the video API.</p>
    </video>
  </div>
  </main>
  <footer> <em>&copy; 2011 GuitarWorld</em> </footer>
</div>
</body>
</html>
