<?php
	  if (!isset($_SESSION)) {
		session_start();
	  }
	 
	  if (!isset($_SESSION['Usuario'] ) ) {
		header("location: ../../index.php");
		exit();
	  } 
?>

    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="../Utils/css/normalize.css">

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="../Utils/css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="../Utils/css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="../Utils/css/all.css">

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="../Utils/css/sweetalert2.min.css">

	<!-- Sweet Alert V8.13.0 JS file-->
	<script src="../Utils/js/sweetalert2.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="../Utils/css/jquery.mCustomScrollbar.css">
	
	<!-- General Styles -->
	<link rel="stylesheet" href="../Utils/css/style.css">



