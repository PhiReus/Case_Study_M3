<?php
ob_start(); // Start output buffering

// Other PHP code and logic here

// Move the HTML code below to a separate file if possible, e.g., sidebar.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Breeze Admin</title>
	<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
	<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
	<div class="container-scroller">
		<!-- @include('includes.sidebar') -->
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<div class="text-center sidebar-brand-wrapper d-flex align-items-center">
				<a class="sidebar-brand brand-logo" href="../QLDT/index.php"><img src="public/uploads/template.png" alt="logo" /></a>
				<a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="http://localhost/case_study_m3/QLDT/index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
			</div>
			<ul class="nav">
				<li class="nav-item nav-profile">
					<a href="https://www.facebook.com/profile.php?id=100052607538041" class="nav-link">
						<div class="nav-profile-image">
							<img src="public/uploads/beach.jpg" alt="profile" />
							<span class="login-status online"></span>
							<!--change to offline or busy as needed-->
						</div>
						<div class="nav-profile-text d-flex flex-column pr-3">
							<span class="font-weight-medium mb-2">Phi Reus</span>
						</div>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://localhost/case_study_m3/QLDT/index.php">
						<i class="mdi mdi-home menu-icon"></i>
						<span class="menu-title">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
						<i class="mdi mdi-crosshairs-gps menu-icon"></i>
						<span class="menu-title">Danh mục</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="ui-basic">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item">
								<a class="nav-link" href="index.php">Quản lý điện thoại</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php?controller=brand&action=index">Quản lý thương hiệu</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php?controller=customer&action=index">Quản lý khách hàng</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php?controller=order&action=index">Quản lý đơn hàng</a>
							</li>
							<!-- Add more menu items as needed -->
						</ul>
					</div>
				</li>
				
				<!-- Add more menu items as needed -->
			</ul>
		</nav>
		<!-- END: @include('includes.sidebar') -->
		<div class="container-fluid page-body-wrapper">
			<!-- @include('includes.nav') -->
			<nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
				<div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
					<a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
					<button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
						<i class="mdi mdi-menu"></i>
					</button>
					<ul class="navbar-nav navbar-nav-right ml-lg-auto">
						<li class="nav-item nav-profile dropdown border-0">
							<a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
								<img class="nav-profile-img mr-2" alt="" src="public/uploads/151269169_235827428180840_4211394178676367278_n.jpg" />
								<span class="profile-name">PHI REUS</span>
							</a>
							<div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
								<a class="dropdown-item" href="#">
									<i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
							</div>
						</li>
					</ul>
					<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
						<span class="mdi mdi-menu"></span>
					</button>
				</div>
			</nav>