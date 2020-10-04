<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<title>Material Bootstrap Wizard by Creative Tim | Free Boostrap Wizard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- CSS Files -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ URL::asset('css/paper-bootstrap-wizard.css') }}" rel="stylesheet" />

	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="https://demos.creative-tim.com/paper-bootstrap-wizard/assets/css/themify-icons.css" rel="stylesheet">

</head>

<body>

    @yield('content')
</body>

	<!--   Core JS Files   -->
    <script type="text/javascript">const main_url = '{{url('/')}}/'</script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="{{ URL::asset('plugins/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('plugins/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('plugins/jquery.mask.js') }}" type="text/javascript"></script>
    <!--  Plugin for the Wizard -->
	<script src="{{ URL::asset('plugins/paper-bootstrap-wizard.js') }}" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="{{ URL::asset('plugins/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('plugins/jquery.validation.additional.js') }}" type="text/javascript"></script>
    
    @yield('javascripts')
</html>
