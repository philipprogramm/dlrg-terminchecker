<?php
/**
 * @copyright Copyright (c) 2020 Philipp Stappert <mail@philipprogramm.de>
 * 
 * @author Philipp Stappert <mail@philipprogramm.de>
 * 
 * @license MIT License
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
	// INCLUDE Functions
	require("functions.php");
	
	// Start session
	session_start();
?>
<html lang="de">
  <head>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Terminersteller</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<meta name="description" content="">
  	<meta name="author" content="Philipp Stappert">

	<!-- PWA -->
	<link rel="manifest" href="/manifest.json">
	<link rel="apple-touch-icon" sizes="57x57" href="/images/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/images/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/images/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/images/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/images/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/images/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/images/icons/apple-icon-180x180.png">
	<meta name="apple-mobile-web-app-capable" content="no">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" type="image/png" sizes="192x192"  href="/images/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/images/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
	<meta name="msapplication-TileColor" content="#e30613">
	<meta name="msapplication-TileImage" content="/images/icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#e30613">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<!--Select2 CSS -->
	<link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

	<!--Own CSS-->
	<!-- General -->
	<link rel="stylesheet" href="style/style.css">
	
  </head>
  <body>
	<!--Require NavBar-->
	<?php require("navbar.php"); ?>
    
    <!--Require Content-->
	<div id="content" class="container-fluid">
		<?php
			include("create_dates.php");
		?>
	</div>
	
    <!-- JavaScript Librarys -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/eff04ef157.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  </body>
</html>