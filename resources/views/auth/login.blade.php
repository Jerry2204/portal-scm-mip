<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Login - SCM MIP</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('login_style/images/apple-touch-icon.png') }}">
	{{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('login_style/images/favicon-32x32.png') }}"> --}}
	<link rel="icon" type="image/png" href="{{ asset('login_style/images/favicon.png') }}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('login_style/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login_style/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login_style/styles/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login_style/styles/custom.css') }}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="{{ route('login') }}">
					<img src="{{ asset('login_style/images/logo.png') }}" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container login-container">
			<div class="row align-items-center">
				<div class="col-md-12 col-lg-12">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary mb-3">Dashboard SCM MIP</h2>
                            <div class="text-center">
                                <img src="{{ asset('login_style/images/section-mandiricoal-logo.png') }}" class="mandiri-login-image" alt="">
                            </div>
						</div>
						<form action="{{ route('login') }}" method="POST">
							@csrf
							<div class="input-group custom">
								<input type="email" class="form-control form-control-lg" name="email" placeholder="email">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" name="password" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input class="btn btn-mandiri btn-lg btn-block" type="submit" value="Sign In">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="{{ asset('login_style/scripts/core.js') }}"></script>
	<script src="{{ asset('login_style/scripts/script.min.js') }}"></script>
	<script src="{{ asset('login_style/scripts/process.js') }}"></script>
	<script src="{{ asset('login_style/scripts/layout-settings.js') }}"></script>
</body>
</html>
