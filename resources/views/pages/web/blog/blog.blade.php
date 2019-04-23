@extends('layouts.layout')

@section('content')


	<section class="dark-bg" id="blog_title" style="padding-top: 150px !important; padding-bottom: 50px !important;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="section-title">
              <h2 class="play-font" style="color: white">{{$blogs->title}}</h2>
              <h1 class="roboto-font text-uppercase" style="color: white">{{$blogs->subtitle}}</h1>
              <hr class="center_line white-bg">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="white-bg" id="blog_content">
      <div class="container">
          <div class="col-md-12r">

            <div class="" style="height: auto; overflow: hidden;">
                <img src="{{asset('/asset/img/'.$blogs->images)}}" style="width: 100%; height: auto;" alt="">
            </div>
            <div class="" style="padding-top: 30px; margin-bottom: -50px;">
                <h6>{{$blogs->created_at}}</h6>
            </div>
            <div style="padding-top: 100px" class="play-font">
            	{!!$blogs->desc!!}
            </div>
          </div>
      </div>
    </section>




  	<!--== Footer Start ==-->
    <footer class="footer">
      <div class="footer-main">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-4">
              <div class="widget widget-text">
                <div class="logo-footer"><a href="index.html"> <img class="img-responsive" src="{{ asset('asset/img/logo_black.png')}}" alt=""></a> </div>
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