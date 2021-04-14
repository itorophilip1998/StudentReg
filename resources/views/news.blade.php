
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Site Metas -->
    <title>Federal Polytechnic Ukana</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
   <style>
       .card>img{
           width: 100%;
           height: 280px
       }
   </style>
    <!-- Site Icons -->
    <link rel="shortcut icon" href="https://i2.wp.com/www.vanguardngr.com/wp-content/uploads/2020/12/Federal-Polytechnic-Ukana-School-Fees.jpeg?resize=1024%2C1024&ssl=1&mrf-size=m" type="image/x-icon" />
    <link rel="apple-touch-icon" href="https://i2.wp.com/www.vanguardngr.com/wp-content/uploads/2020/12/Federal-Polytechnic-Ukana-School-Fees.jpeg?resize=1024%2C1024&ssl=1&mrf-size=m">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('data/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('style.css')}}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{ asset('data/css/versions.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('data/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('data/css/custom.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Modernizer for Portfolio -->
    <script src="{{ asset('data/js/modernizer.js')}}"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="host_version">


   <div id="app">
 
	<!-- END LOADER -->

	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img style="width:50px;height:50px" class="rounded-circle"
                    src="https://i2.wp.com/www.vanguardngr.com/wp-content/uploads/2020/12/Federal-Polytechnic-Ukana-School-Fees.jpeg?resize=1024%2C1024&ssl=1&mrf-size=m"

                    />
                    <span class="text-white"> Fed Poly Uka</span>

                </a>
				<button class="navbar-toggler d-none" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="http://localhost:8000/#about">About Us</a></li>
						<li class="nav-item"><a class="nav-link" href="/result">Check Result</a></li>
						<li class="nav-item"><a class="nav-link" href="/news">Daily News</a></li>
						<li class="nav-item"><a class="nav-link" href="http://localhost:8000/#contact">Contact Us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class=" log btn-sm btn text-white rounded-lg" style=" background-color:#eea412 !important;border-radius: 7px !important;" href="/auth-logout">Logout</a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
    <!-- End header -->
<main class="py-3" style="background-color: #f1f1f1;"> 
    <daily-news :user="{{ json_encode($user) }}"></daily-news>

</main> 
    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">
                    <p class="footer-company-name">All Rights Reserved. &copy; 2021 <a href="#">Fed Poly Uka</a> Design By : Idara</p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

   </div>
    <!-- ALL JS FILES -->
    <script src="{{ asset('data/js/all.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('data/js/custom.js')}}"></script>
	<script src="{{ asset('data/js/timeline.min.js')}}"></script>
 <!-- Mapsed JavaScript -->
	<script src="{{ asset('data/js/mapsed.js')}}"></script>
	<script src="{{ asset('data/js/01-custom-places-example.js')}}"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>
</html>
