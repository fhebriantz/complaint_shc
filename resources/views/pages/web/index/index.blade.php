@extends('layouts.layout')

@section('content')
	
	<!--== Hero Slider Start ==-->
  <section class="remove-padding transition-none" id="home">
    <div id="rev_slider_24_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="website-intro" data-source="gallery" style="background:#000000;padding:0px;">
    <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
      <div id="rev_slider_24_1" class="rev_slider fullscreenbanner tiny_bullet_slider" style="display:none;" data-version="5.4.1">
    <ul>	<!-- SLIDE  -->
      <li data-index="rs-67" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="600"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-slicey_shadow="0px 0px 0px 0px transparent">
        <!-- MAIN IMAGE -->
        <img src="{{ asset('asset/img/'.$slider1->images)}}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="5000" data-ease="Power2.easeInOut" data-scalestart="100" data-scaleend="150" data-rotatestart="0" data-rotateend="0" data-blurstart="20" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
        <!-- LAYERS -->
        @include('include_web/slider1')

        <!-- LAYER NR. 15 -->
        <div class="tp-caption   tp-resizeme"
           id="slide-67-layer-2"
           data-x="['center','center','center','center']" data-hoffset="['1','1','0','0']"
           data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
          data-fontsize="['90','90','70','50']"
          data-lineheight="['90','90','70','50']"
          data-width="['none','none','481','360']"
          data-height="none"
          data-whitespace="['nowrap','nowrap','normal','normal']"

          data-type="text"
          data-responsive_offset="on"

          data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]'
          data-textAlign="['center','center','center','center']"
          data-paddingtop="[0,0,0,0]"
          data-paddingright="[0,0,0,0]"
          data-paddingbottom="[0,0,0,0]"
          data-paddingleft="[0,0,0,0]"

          style="z-index: 19; white-space: nowrap; font-size: 90px; line-height: 90px; font-weight: 500; color: #ffffff; letter-spacing: -5px;font-family: 'Roboto', sans-serif;">{!!$slider1->title!!}</div>

        <!-- LAYER NR. 16 -->
        <div class="tp-caption   tp-resizeme"
           id="slide-67-layer-3"
           data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
           data-y="['middle','middle','middle','middle']" data-voffset="['90','90','60','30']"
          data-fontsize="['25','25','25','20']"
          data-lineheight="['35','35','35','30']"
          data-width="['480','480','480','360']"
          data-height="none"
          data-whitespace="normal"

          data-type="text"
          data-responsive_offset="on"

          data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]'
          data-textAlign="['center','center','center','center']"
          data-paddingtop="[0,0,0,0]"
          data-paddingright="[0,0,0,0]"
          data-paddingbottom="[0,0,0,0]"
          data-paddingleft="[0,0,0,0]"

          style="z-index: 20; min-width: 480px; max-width: 480px; white-space: normal; font-size: 25px; line-height: 35px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family: 'Roboto', sans-serif;">{!!$slider1->subtitle!!}</div>

    	

      <!-- SLIDE  -->
      <li data-index="rs-66" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="600"  data-thumb="{{ asset('assets/images/deskbg-100x50.jpg')}}"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-slicey_shadow="0px 0px 0px 0px transparent">
        <!-- MAIN IMAGE -->
        <img src="{{ asset('asset/img/'.$slider2->images)}}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="5000" data-ease="Power2.easeInOut" data-scalestart="100" data-scaleend="150" data-rotatestart="0" data-rotateend="0" data-blurstart="20" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
        <!-- LAYERS -->
        @include('include_web/slider2')

        <!-- LAYER NR. 32 -->
        <div class="tp-caption   tp-resizeme"
           id="slide-66-layer-2"
           data-x="['center','center','center','center']" data-hoffset="['1','1','0','0']"
           data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
          data-fontsize="['90','90','70','50']"
          data-lineheight="['90','90','70','50']"
          data-width="['none','none','481','360']"
          data-height="none"
          data-whitespace="['nowrap','nowrap','normal','normal']"

          data-type="text"
          data-responsive_offset="on"

          data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]'
          data-textAlign="['center','center','center','center']"
          data-paddingtop="[0,0,0,0]"
          data-paddingright="[0,0,0,0]"
          data-paddingbottom="[0,0,0,0]"
          data-paddingleft="[0,0,0,0]"

          style="z-index: 19; white-space: nowrap; font-size: 90px; line-height: 90px; font-weight: 500; color: #ffffff; letter-spacing: -5px;font-family: 'Roboto', sans-serif;">{!!$slider2->title!!}</div>

        <!-- LAYER NR. 33 -->
        <div class="tp-caption   tp-resizeme"
           id="slide-66-layer-3"
           data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
           data-y="['middle','middle','middle','middle']" data-voffset="['90','90','60','30']"
          data-fontsize="['25','25','25','20']"
          data-lineheight="['35','35','35','30']"
          data-width="['480','480','480','360']"
          data-height="none"
          data-whitespace="normal"

          data-type="text"
          data-responsive_offset="on"

          data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]'
          data-textAlign="['center','center','center','center']"
          data-paddingtop="[0,0,0,0]"
          data-paddingright="[0,0,0,0]"
          data-paddingbottom="[0,0,0,0]"
          data-paddingleft="[0,0,0,0]"

          style="z-index: 20; min-width: 480px; max-width: 480px; white-space: normal; font-size: 25px; line-height: 35px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family: 'Roboto', sans-serif;">{!!$slider2->subtitle!!}</div>

      
          	<!-- SLIDE  -->
	      <li data-index="rs-68" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="600"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-slicey_shadow="0px 0px 0px 0px transparent">
	        <!-- MAIN IMAGE -->
	        <img src="{{ asset('asset/img/'.$slider3->images)}}"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="5000" data-ease="Power2.easeInOut" data-scalestart="100" data-scaleend="150" data-rotatestart="0" data-rotateend="0" data-blurstart="20" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
	        <!-- LAYERS -->
        @include('include_web/slider3')
        <!-- LAYER NR. 49 -->
        <div class="tp-caption   tp-resizeme"
           id="slide-68-layer-2"
           data-x="['center','center','center','center']" data-hoffset="['1','1','0','0']"
           data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
          data-fontsize="['90','90','70','50']"
          data-lineheight="['90','90','70','50']"
          data-width="['none','none','481','360']"
          data-height="none"
          data-whitespace="['nowrap','nowrap','normal','normal']"

          data-type="text"
          data-responsive_offset="on"

          data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]'
          data-textAlign="['center','center','center','center']"
          data-paddingtop="[0,0,0,0]"
          data-paddingright="[0,0,0,0]"
          data-paddingbottom="[0,0,0,0]"
          data-paddingleft="[0,0,0,0]"

          style="z-index: 19; white-space: nowrap; font-size: 90px; line-height: 90px; font-weight: 500; color: #ffffff; letter-spacing: -5px;font-family: 'Roboto', sans-serif;">{!!$slider3->title!!}</div>

        <!-- LAYER NR. 50 -->
        <div class="tp-caption   tp-resizeme"
           id="slide-68-layer-3"
           data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
           data-y="['middle','middle','middle','middle']" data-voffset="['90','90','60','30']"
          data-fontsize="['25','25','25','20']"
          data-lineheight="['35','35','35','30']"
          data-width="['480','480','480','360']"
          data-height="none"
          data-whitespace="normal"

          data-type="text"
          data-responsive_offset="on"

          data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]'
          data-textAlign="['center','center','center','center']"
          data-paddingtop="[0,0,0,0]"
          data-paddingright="[0,0,0,0]"
          data-paddingbottom="[0,0,0,0]"
          data-paddingleft="[0,0,0,0]"

          style="z-index: 20; min-width: 480px; max-width: 480px; white-space: normal; font-size: 25px; line-height: 35px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family: 'Roboto', sans-serif;">{!!$slider3->subtitle!!}</div>


      </li>
    </ul>
    <div class="tp-bannertimer tp-bottom" style="height: 2px; background: rgb(255,255,255,0.2);"></div>	</div>
    </div><!-- END REVOLUTION SLIDER -->
  </section>
  <!--== Hero Slider End ==-->

	  <!--=== What We Do Start ======-->
	  <section class="dark-bg lg-section" id="about">
	    <div class="col-md-6 col-sm-4 bg-flex bg-flex-right">
	      <div class="bg-flex-holder bg-flex-cover" style="background-image: url(public/asset/img/{{$whatwedo->images}});"></div>
	      <div class="video-box_overlay">
	        <div class="center-layout">
	        <div class="v-align-middle"> <a class="popup-youtube" href="https://www.youtube.com/watch?v=sU3FkzUKHXU">
	          <div class="play-button"><i class="tr-icon ion-android-arrow-dropright"></i></div>
	          </a> </div>
	        </div>
	      </div>
	    </div>
	    <div class="container">
	      <div class="col-md-5 col-sm-7">
	        <div class="section-title white-color">
	          <h2 class="play-font">{{$whatwedo->title}}</h2>
	          <h1 class="roboto-font text-uppercase">{{$whatwedo->subtitle}}</h1>
	          <hr class="left-line white-bg">
	        </div>
	        <p>{{$whatwedo->desc}}</p>
	        <!-- <p class="mt-30"><a class="btn-light-outline btn btn-lg btn-square">Read more<span></span></a></p> -->
	      </div>
	    </div>
	  </section>
	  <!--=== What We Do End ======--> 

	  <!--=== About Us Start ======-->
	  <section class="white-bg lg-section">
	    <div class="col-md-6 col-sm-4 bg-flex bg-flex-left">
	      <div class="bg-flex-holder bg-flex-cover" style="background-image: url(public/asset/img/{{$abouts->images}});"></div>
	    </div>
	    <div class="container">
	      <div class="col-md-5 col-sm-7 col-md-offset-7 col-sm-offset-5">
	        <div class="section-title">
	          <h2 class="play-font">{{$abouts->title}}</h2>
	          <h1 class="roboto-font text-uppercase">{{$abouts->subtitle}}</h1>
	          <hr class="left-line dark-bg">
	        </div>
	        <p>{{$abouts->desc}}</p>
	        <!-- <p class="mt-30"><a class="btn-amazing btn btn-lg btn-square">Read more<span></span></a></p> -->
	      </div>
	    </div>
	  </section>
	  <!--=== About Us End ======--> 

	  <!--== What We Offer Start ==-->
  <section class="dark-bg" id="feature">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="section-title white-color">
            <h2 class="play-font">What We Offer</h2>
            <h1 class="roboto-font text-uppercase">Azha Services</h1>
            <hr class="center_line white-bg">
          </div>
        </div>
      </div>
      <div class="row">
        
        @foreach($features as $feature)
        <div class="col-md-4 col-sm-4 col-xs-12 mt-40 mb-30 feature-box text-center">
          <div class="gradient-bg-icon mb-20">
            <i class="icofont icofont-{{$feature->iconname}} font-30px dark-color"></i>
          </div>
          <h3 class="mt-10 white-color">{{$feature->title}}</h3>
          <p class="font-400 white-color">{{$feature->desc}}</p>
        </div>
        @endforeach
        
      </div>
    </div>
  </section>
  <!--== What We Offer End ==-->

	  <!--== Portfolio Start ==-->
  <section id="portfolio" class="pb-0 pt-0">
    <div class="container-fluid remove-padding">

      <div class="row">
        <div class="col-md-12">
          <div id="portfolio-gallery" class="cbp">
            <div class="cbp-item branding col-md-3 col-sm-6">
              <div class="portfolio-item">
                <a href="#">
                  <img src="{{ asset('asset/img/'.$portfolio1->images)}}" alt="">
                  <div class="portfolio-info dark-bg">
                      <div class="centrize">
                        <div class="v-center white-color">
                          <h3>{{$portfolio1->title}}</h3>
                          <p>{{$portfolio1->subtitle}}</p>
                        </div>
                      </div>
                    </div>
                </a>
              </div>
            </div>

            <div class="cbp-item print branding col-md-3 col-sm-6">
              <div class="portfolio-item">
                <a href="#">
                  <img src="{{ asset('asset/img/'.$portfolio2->images)}}" alt="">
                  <div class="portfolio-info dark-bg">
                      <div class="centrize">
                        <div class="v-center white-color">
                          <h3>{{$portfolio2->title}}</h3>
                          <p>{{$portfolio2->subtitle}}</p>
                        </div>
                      </div>
                    </div>
                </a>
              </div>
            </div>

            <div class="cbp-item print branding col-md-6 col-sm-6">
              <div class="portfolio-item">
                <a href="#">
                  <img src="{{ asset('asset/img/'.$portfolio3->images)}}" alt="">
                  <div class="portfolio-info dark-bg">
                      <div class="centrize">
                        <div class="v-center white-color">
                          <h3>{{$portfolio3->title}}</h3>
                          <p>{{$portfolio3->subtitle}}</p>
                        </div>
                      </div>
                    </div>
                </a>
              </div>
            </div>

            <div class="cbp-item branding col-md-6 col-sm-6">
              <div class="portfolio-item">
                <a href="#">
                  <img src="{{ asset('asset/img/'.$portfolio4->images)}}" alt="">
                  <div class="portfolio-info dark-bg">
                      <div class="centrize">
                        <div class="v-center white-color">
                          <h3>{{$portfolio4->title}}</h3>
                          <p>{{$portfolio4->subtitle}}</p>
                        </div>
                      </div>
                    </div>
                </a>
              </div>
            </div>

            <div class="cbp-item print photography col-md-3 col-sm-6">
              <div class="portfolio-item">
                <a href="#">
                  <img src="{{ asset('asset/img/'.$portfolio5->images)}}" alt="">
                  <div class="portfolio-info dark-bg">
                      <div class="centrize">
                        <div class="v-center white-color">
                          <h3>{{$portfolio5->title}}</h3>
                          <p>{{$portfolio5->subtitle}}</p>
                        </div>
                      </div>
                    </div>
                </a>
              </div>
            </div>

            <div class="cbp-item branding web-design col-md-3 col-sm-6">
              <div class="portfolio-item">
                <a href="#">
                  <img src="{{ asset('asset/img/'.$portfolio6->images)}}" alt="">
                  <div class="portfolio-info dark-bg">
                      <div class="centrize">
                        <div class="v-center white-color">
                          <h3>{{$portfolio6->title}}</h3>
                          <p>{{$portfolio6->subtitle}}</p>
                        </div>
                      </div>
                    </div>
                </a>
              </div>
            </div>
          </div>
        </div>

        </div>
    </div>
  </section>
  <!--== Portfolio End ==-->

	  <!--== Clients Start ==-->
    <div class="dark-bg pt-120 pb-120">
      <div class="container">
        <div class="row">
          <div class="client-slider slick">
            @foreach($clients as $cus)
            <div class="client-logo"> <img class="img-responsive" src="{{ asset('asset/img/'.$cus->images)}}"/> </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
    <!--== Clients End ==-->

	  <!--== Team Start ==-->
    <section class="grey-bg" id="team">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="section-title">
              <h2 class="play-font">Meet Creatives</h2>
              <h1 class="roboto-font text-uppercase">Our Team</h1>
              <hr class="center_line dark-bg">
            </div>
          </div>
        </div>

        <div class="row mt-50">

          @foreach($teams as $team)
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="team-member" style="margin-bottom: 30px">
                <div class="team-thumb">
                  <div class="thumb-overlay"></div>
                  <img src="{{ asset('asset/img/'.$team->images)}}" alt="">
                  <div class="member-info text-center dark-bg">
                    <h3>{{$team->title}}</h3>
                    <span class="title">{{$team->subtitle}}</span>
                    <div class="social-icons-style-02">
                      <ul class="sm-icon mt-20">
                        <li><a class="fb" href="{{$team->facebook}}"><i class="icofont icofont-social-facebook"></i></a></li>
                        <li><a class="tw" href="{{$team->twitter}}"><i class="icofont icofont-social-twitter"></i></a></li>
                        <li><a class="ig" href="{{$team->instagram}}"><i class="icofont icofont-social-instagram"></i></a></li>
                        <li><a class="in" href="{{$team->linkedin}}"><i class="icofont icofont-social-linkedin"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--== Member End ==-->
          @endforeach
            

        </div>

      </div>
    </section>
    <!--== Team End ==-->

	  @include('include_web/video')

	  <!--== Testimonails Start ==-->
    <section class="darken-bg">
       <div class="container">
          <div class="row">
            <div class="testimonial-style-2">

              @foreach($comments as $comment)
              <div class="col-xs-12">
                <!--== Slide ==-->
                <div class="testimonial-item">
                  <div class="testimonial-content">
                    <p class="mt-20 line-height-26 font-20px"><i class="icofont icofont-quote-left font-50px default-color mt-20"></i> <span class="white-color">{{$comment->desc}}</span></p>
                    <h5 class="font-700 mb-0 white-color play-font">{{$comment->title}}</h5>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
      </div>
    </section>
    <!--== Testimonails End ==-->

	  <!--== Blog Start ==-->
    <section class="white-bg" id="blog">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="section-title">
              <h2 class="play-font">Latest News</h2>
              <h1 class="roboto-font text-uppercase">Our Blogs</h1>
              <hr class="center_line dark-bg">
            </div>
          </div>
        </div>
        <div class="row mt-20">
          
          @foreach($blogs as $blog)
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="post">
              <div class="post-img"> <img class="img-responsive" src="{{ asset('asset/img/'.$blog->images)}}" alt=""/> </div>
              <div class="post-info all-padding-30">
                <h3><a href="{{url('/blog/'.$blog->id.'/')}}" maxlength="30">{{$blog->title}}</a></h3> 
                <h6>{{$blog->created_at}}</h6>
              </div>
            </div>
          </div>
          <!--== Post End ==-->
          @endforeach

        </div>
      </div>
    </section>
    <!--== Blog End ==-->

	  <!--== Contact Start ==-->
      <section class="dark-bg pt-0 pb-0 transition-none" id="contact">
        <div class="col-md-6 col-sm-4 bg-flex bg-flex-right">
          <div class="bg-flex-holder bg-flex-cover">
            <div id="" class="wide">
              <iframe class="map-black-white" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.145778556274!2d106.79761731475052!3d-6.244511662883694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f16c02be391d%3A0xc306a8c20eab7f23!2sPT.+Azha+Teknologi+Pratama!5e0!3m2!1sen!2sid!4v1555574887079!5m2!1sen!2sid" width="100%" height="625" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="col-md-5 col-sm-7 pt-120 pb-120 xs-pt-20 xs-pb-80">

            <form name="contact-form" id="contact-form" class="contact-form-style-02">
              {{ csrf_field() }}
              <div class="messages"></div>
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label class="sr-only" for="name">Name</label>
                    <input type="text" name="name" class="md-input style-02" id="name" placeholder="Name *" required data-error="Your Name is Required">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input type="email" name="email" class="md-input style-02" id="email" placeholder="Email *" required data-error="Please Enter Valid Email">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label class="sr-only" for="subject">Subject</label>
                    <input type="text" name="subject" class="md-input style-02" id="subject" placeholder="Subject">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label class="sr-only" for="message">Project Details</label>
                    <textarea name="message" class="md-textarea style-02" id="message" rows="7" placeholder="Project Details" required data-error="Please, Leave us a message"></textarea>
                    <div class="help-block with-errors"></div>
                    <div style="margin-top: 15px; color: white !important;" id="contact_message">
                  </div>
                </div> 
                <div class="col-md-12 col-sm-12">
                  <div class="text-left mt-20">
                    <button type="submit" name="submit" class="btn btn-lg btn-light-outline btn-square remove-margin">Send Message </button>
                  </div>
                </div>
              </div>

              
                <!-- Thank you, We shall contact you soon! -->
              </div>

            </form>
          </div>
        </div>
      </section>
      <!--== Contact End ==-->	

  	<!--== Footer Start ==-->
    <footer class="footer">
      <div class="footer-main">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-4">
              <div class="widget widget-text">
                <div class="logo-footer"><a href="index.html"> <img class="img-responsive" src="{{ asset('asset/img/long_logo_up.png')}}" alt=""></a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-2">
              <div class="widget widget-links">
                <h5 class="widget-title">Social Media</h5>
                <ul>
                  @foreach($sosmeds as $sosmed)
                  <li><a href="{{$sosmed->subtitle}}" target="_blank">{{ $sosmed->title}}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-sm-6 col-md-2">
              <div class="widget widget-links">
                <h5 class="widget-title">Quick Links</h5>
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Our Services</a></li>
                  <li><a href="#">Terms &amp; Conditions</a></li>
                  <li><a href="#">Careers</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="widget widget-text widget-links">
                <h5 class="widget-title">Contact Us</h5>
                <ul>
                  <li> <i class="icofont icofont-social-google-map"></i>{{$address->title}}</li>
                  <li> <i class="icofont icofont-smart-phone"></i>{{$address->subtitle}}</li>
                  <li> <i class="icofont icofont-email"></i> <a href="#">{{$address->desc}}</a> </li>
                  <li> <i class="icofont icofont-globe-alt"></i> <a href="#">{{$address->images}}</a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="copy-right text-center">© 2019 PT Azha Teknologi Pratama. All rights reserved</div>
            </div>
          </div>
        </div>
      </div>
    </footer>
@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJNGOwO2hJpJ9kz8e0UUPjZhEbgDJTTXE"></script>
<script>
  $("#contact-form").submit(function(e) {
      e.preventDefault();
      $.ajax({
                url: "{{url('/contact_us')}}",
                data: $("#contact-form").serialize(),
                type : "POST",
                cache: false,
                success: function(data){
                    console.log(data);
                    $('#contact_message').html('');
                    $('#contact_message').html('Message has been delivered, we shall contact you soon!');
                },
                  error:function(data){
                      console.log('gagal');
                  }
              });
  });
</script>
@endsection