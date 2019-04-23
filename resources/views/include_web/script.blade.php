<!--== Javascript Plugins ==-->

<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/smoothscroll.js')}}"></script>
<script src="{{ asset('assets/js/plugins.js')}}"></script>
<script src="{{ asset('assets/js/master.js')}}"></script>


<!-- Slicey ADD-ON Files -->
<script type='text/javascript' src="{{ asset('revolution/js/revolution.addon.slicey.min.js?ver=1.0.0')}}"></script>


<!-- Revolution js Files -->
<script src="{{ asset('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{ asset('revolution/js/revolution.extension.actions.min.js')}}"></script>
<script src="{{ asset('revolution/js/revolution.extension.carousel.min.js')}}"></script>
<script src="{{ asset('revolution/js/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{ asset('revolution/js/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{ asset('revolution/js/revolution.extension.migration.min.js')}}"></script>
<script src="{{ asset('revolution/js/revolution.extension.navigation.min.js')}}"></script>
<script src="{{ asset('revolution/js/revolution.extension.parallax.min.js')}}"></script>
<script src="{{ asset('revolution/js/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{ asset('revolution/js/revolution.extension.video.min.js')}}"></script>
<!--== Javascript Plugins End ==-->

<script type="text/javascript">

  var tpj=jQuery;
  var revapi24;
  tpj(document).ready(function() {
    if(tpj("#rev_slider_24_1").revolution == undefined){
      revslider_showDoubleJqueryError("#rev_slider_24_1");
    }else{
      revapi24 = tpj("#rev_slider_24_1").show().revolution({
        sliderType:"standard",
        jsFileLocation:"revolution/js/",
        sliderLayout:"fullscreen",
        dottedOverlay:"none",
        delay:9000,
        navigation: {
          keyboardNavigation:"off",
          keyboard_direction: "horizontal",
          mouseScrollNavigation:"off",
          mouseScrollReverse:"default",
          onHoverStop:"off",
          bullets: {
            enable:true,
            hide_onmobile:false,
            style:"bullet-bar",
            hide_onleave:false,
            direction:"horizontal",
            h_align:"center",
            v_align:"bottom",
            h_offset:0,
            v_offset:50,
            space:5,
            tmp:''
          }
        },
        responsiveLevels:[1240,1024,778,480],
        visibilityLevels:[1240,1024,778,480],
        gridwidth:[1240,1024,778,480],
        gridheight:[868,768,960,720],
        lazyType:"none",
        shadow:0,
        spinner:"off",
        stopLoop:"off",
        stopAfterLoops:-1,
        stopAtSlide:-1,
        shuffle:"off",
        autoHeight:"off",
        fullScreenAutoWidth:"off",
        fullScreenAlignForce:"off",
        fullScreenOffsetContainer: "",
        fullScreenOffset: "60px",
        hideThumbsOnMobile:"off",
        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        debugMode:false,
        fallbacks: {
          simplifyAll:"off",
          nextSlideOnWindowFocus:"off",
          disableFocusListener:false,
        }
      });
    }

            if(revapi24) revapi24.revSliderSlicey();
  });	/*ready*/
</script>