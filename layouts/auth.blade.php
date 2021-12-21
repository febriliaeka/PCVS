<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>{{ config('app.name') }}</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
	</head>
	<body class="bg-gradient-warning">
		<div class="container">
			<!-- Outer Row -->
			<div class="row justify-content-center">
				<div class="col-xl-10 col-lg-12 col-md-9">
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
              @yield('content')
						</div>
					</div>
				</div>	
			</div>
		</div>
	</body>
</html>
