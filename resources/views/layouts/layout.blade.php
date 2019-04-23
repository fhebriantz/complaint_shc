
<!DOCTYPE html>
<html lang="en">
<head>
	@include('include_web/head')

    @yield('header')

</head>
<body>

<!--== Loader Start ==-->
<div id="loader-overlay">
  <div class="loader">
    <img src="{{ asset('assets/images/loader.svg')}}" width="80" alt="">
  </div>
</div>
<!--== Loader End ==-->

<!--== Wrapper Start ==-->
<div class="wrapper">

  <!--== Header Start ==-->
  <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav on no-full no-border">
  	@include('include_web/nav')
  </nav>
  <!--== Header End ==-->
    @yield('content')

  	@yield('footer')

  <!--== Go to Top  ==-->
  <a href="javascript:" id="return-to-top"><i class="icofont icofont-arrow-up"></i></a>
  <!--== Go to Top End ==-->

</div>
<!--== Wrapper End ==-->

	  @include('include_web/script')
    @yield('script')

</body>
</html>
