<!--== Start Top Search ==-->
    <div class="fullscreen-search-overlay" id="search-overlay"> <a href="#" class="fullscreen-close" id="fullscreen-close-button"><i class="icofont icofont-close"></i></a>
      <div id="fullscreen-search-wrapper">
        <form method="get" id="fullscreen-searchform">
          <input type="text" value="" placeholder="Type and hit Enter..." id="fullscreen-search-input" class="search-bar-top">
          <i class="fullscreen-search-icon icofont icofont-search">
          <input value="" type="submit">
          </i>
        </form>
      </div>
    </div>
    <!--== End Top Search ==-->
    <div class="container">
      <!--== Start Atribute Navigation ==-->
      <div class="attr-nav hidden-xs sm-display-none">
        <ul>
          <li class="side-menu"><a href="#"><i class="icofont icofont-navigation-menu"></i></a></li>
          <li class="search"><a href="#" id="search-button"><i class="icofont icofont-search"></i></a></li>
        </ul>
      </div>
      <!--== End Atribute Navigation ==-->

      <!--== Start Header Navigation ==-->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="tr-icon ion-android-menu"></i> </button>
        <div class="logo"> <a href="{{url('/')}}"> <img class="logo logo-display" src="{{ asset('asset/img/long_logo_white.png')}}" alt=""> <img class="logo logo-scrolled" src="{{ asset('asset/img/long_logo_black.png')}}" alt=""> </a> </div>
      </div>
      <!--== End Header Navigation ==-->

      <!--== Collect the nav links, forms, and other content for toggling ==--> 
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-center" data-in="fadeIn" data-out="fadeOut">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Concepts</a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{url('/')}}">Home</a>
              </li>
            </ul>
          </li>
          <li><a class="page-scroll" href="#about">About</a></li>
          <li><a class="page-scroll" href="#feature">Features</a></li>
          <li><a class="page-scroll" href="#portfolio">Portfolio</a></li>
          <li><a class="page-scroll" href="#team">Team</a></li>
          <li><a class="page-scroll" href="#blog">Blogs</a></li>
          <li><a class="page-scroll" href="#contact">Contact</a></li>
        </ul>
      </div>
      <!--== /.navbar-collapse ==-->
    </div>

    <!-- Start Side Menu -->
    <div class="side dark-bg">
    		<a href="#" class="logo-side"><img src="{{ asset('asset/img/logo_white.png')}}" alt="side-logo"/></a>
            <a href="#" class="close-side"><i class="icofont icofont-close"></i></a>
            <div class="widget mt-120">
              <ul class="link">
                <li class="link-item"><a class="page-scroll" href="#home">Home</a></li>
                <li class="link-item"><a class="page-scroll" href="#about">About</a></li>
                <li class="link-item"><a class="page-scroll" href="#feature">Features</a></li>
                <li class="link-item"><a class="page-scroll" href="#portfolio">Portfolio</a></li>
                <li class="link-item"><a class="page-scroll" href="#team">Team</a></li>
                <li class="link-item"><a class="page-scroll" href="#blog">Blogs</a></li>
                <li class="link-item"><a class="page-scroll" href="#contact">Contact</a></li>
              </ul>
            </div>
            <ul class="social-media">
              <li><a href="#" class="icofont icofont-social-facebook"></a></li>
              <li><a href="#" class="icofont icofont-social-twitter"></a></li>
              <li><a href="#" class="icofont icofont-social-behance"></a></li>
              <li><a href="#" class="icofont icofont-social-dribble"></a></li>
              <li><a href="#" class="icofont icofont-social-linkedin"></a></li>
            </ul>
     </div>
     <!-- End Side Menu -->