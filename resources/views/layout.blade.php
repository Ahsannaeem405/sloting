<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />

  <meta name="interface" content="desktop" />

  <title>Slots</title>

  <link href='http://fonts.googleapis.com/css?family=Slackey' rel='stylesheet' type='text/css'/>
  <link type="text/css" rel="stylesheet" href="{{asset('css/reset.css')}}" />
  <link type="text/css" rel="stylesheet" href="{{asset('css/slot.css')}}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <meta property="og:url"           content="https://ecommreceonline.000webhostapp.com/fbshare" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="https://pbs.twimg.com/profile_images/867383513263353856/RG2nkBX8_400x400.jpg" />
</head>
<body style="background-image: url({{asset('img/main_bg.jpg')}});
">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0&appId=172321264925109&autoLogAppEvents=1" nonce="AwEXu4Dw"></script>
<div class="container-fluid">
  <div class="col-md-3">
    <img src="{{asset('img/logo.png')}}" width="auto" height="150">
  </div>
</div>
@section('content')
@show


			{{-- 	<footer id="footer">
					<div class="inner_footer">
						<p>Copyright &copy; 2021. All rights reserved</p>
					</div>
				</footer> --}}
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
  <script type="text/javascript" src="{{asset('js/slot.js')}}"></script>
  <script type="text/javascript">
  $(function() { 
  	SlotGame(); 
  });
</script>
</body>
</html>
