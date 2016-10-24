<!-- FlatFy Theme - Andrea Galanti /-->
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Flatfy Free Flat and Responsive HTML5 Template ">
    <meta name="author" content="">

    <title>Flatfy – Free Flat and Responsive HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    {{--<link href="css/bootstrap.min.css" rel="stylesheet">--}}

    <!-- Custom Google Web Font -->
    {{--<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>--}}
    {{--<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>--}}

    <!-- Custom CSS-->
    {{--<link href="css/general.css" rel="stylesheet">--}}

    <!-- Owl-Carousel -->
    {{--<link href="css/custom.css" rel="stylesheet">--}}
    {{--<link href="css/owl.carousel.css" rel="stylesheet">--}}
    {{--<link href="css/owl.theme.css" rel="stylesheet">--}}
    {{--<link href="css/style.css" rel="stylesheet">--}}
    {{--<link href="css/animate.css" rel="stylesheet">--}}

    <!-- Magnific Popup core CSS file -->
    {{--<link rel="stylesheet" href="css/magnific-popup.css">--}}
    <link href="{{ elixir('css/front.css') }}" rel="stylesheet">

    {{--<script src="js/modernizr-2.8.3.min.js"></script>  <!-- Modernizr /-->--}}
    <!--[if IE 9]>
    <script src="js/PIE_IE9.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="js/PIE_IE678.js"></script>
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
</head>

<body id="home">

<!-- Preloader -->
<div id="preloader">
    <div id="status"></div>
</div>

<!-- FullScreen -->
<div class="intro-header">
    <div class="col-xs-12 text-center abcen1">
        <h1 class="h1_home wow fadeIn" data-wow-delay="0.4s">@lang('page.slogan')</h1>
        <h3 class="h3_home wow fadeIn" data-wow-delay="0.6s">@lang('page.ShangHai PlurJan Aviation Technology Co.,Ltd.')</h3>
        <ul class="list-inline intro-social-buttons">
            <li><a href="#" class="btn  btn-lg mybutton_cyano wow fadeIn" data-wow-delay="0.8s"><span class="network-name">Twitter</span></a>
            </li>
            <li id="contact_btn" ><a href="#contact" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.2s"><span class="network-name">@lang('page.contact_us')</span></a>
            </li>
        </ul>
    </div>
    <!-- /.container -->
    <div class="col-xs-12 text-center abcen wow fadeIn">
        <div class="button_down ">
            <a class="imgcircle wow bounceInUp" data-wow-duration="1.5s"  href="#whatis"> <img class="img_scroll" src="img/icon/circle.png" alt=""> </a>
        </div>
    </div>
</div>

<!-- NavBar-->
<nav class="navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#home">@lang('page.PlurJan')</a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
            <ul class="nav navbar-nav">

                <li class="menuItem"><a href="#whatis">@lang('page.About')</a></li>
                <li class="menuItem"><a href="#useit">@lang('page.Prospects')</a></li>
                <li class="menuItem"><a href="#screen">@lang('page.Item Gallery')</a></li>
                <li class="menuItem"><a href="#credits">@lang('page.Honor')</a></li>
                <li class="menuItem"><a href="#contact">Contact</a></li>
                <li class="menuItem">
                    <div class="dropdown">
                        <div class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                            {{ LaravelLocalization::getCurrentLocaleNativeReading() }}
                            <span class="caret"></span>
                        </div>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li role="presentation">
                                    <a role="menuitem" rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>

        </div>

    </div>
</nav>

<!-- What is -->
<div id="whatis" class="content-section-b" style="border-top: 0">
    <div class="container">

        <div class="row">
            {{--<div class="col-md-4">
                <img src="img/aviation_modle.jpg" style="width:100%;">
            </div>--}}
            <div class="col-md-12 wrap_title">
                <h3>@lang('page.company_overview')</h3>
                <p class="lead" style="margin-top:0">@lang('page.company_overview_content')</p>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-4 wow fadeInDown text-center">
                <img class="sm-item-img" src="img/item32.png" alt="Micro-grooved thrust bearing">
                <h3>@lang('page.Micro-grooved thrust bearing')</h3>
                <p class="lead">微沟槽式止推轴承(Micro-grooved thrust bearing)</p>

                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="sm-item-img" src="img/item1.png" alt="Generic placeholder image">
                <h3>@lang('page.Hybrid micro-grooved foil thrust bearing')</h3>
                <p class="lead"> 混合式止推轴承(Hybrid micro-grooved foil thrust bearing)</p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="sm-item-img" src="img/item33.png" alt="Generic placeholder image">
                <h3>@lang('page.Multi-decked protuberant foil thrust bearing')</h3>
                <p class="lead">多层鼓泡箔片止推轴承(Multi-decked protuberant foil thrust bearing)</p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->

        <div class="row tworow">

            <div class="col-sm-4  wow fadeInDown text-center">
                <img class="sm-item-img" src="img/item31.png" alt="Generic placeholder image">
                <h3>@lang('Micro-grooved journal bearing')</h3>
                <p class="lead">微沟槽式径向轴承(Micro-grooved journal bearing)</p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="sm-item-img" src="img/item3.png" alt="Generic placeholder image">
                <h3>@lang('page.Hybrid micro-grooved foil journal bearing')</h3>
                <p class="lead">混合式径向轴承(Hybrid micro-grooved foil journal bearing)</p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="sm-item-img" src="img/item34.png" alt="Generic placeholder image">
                <h3>@lang('page.Multi-decked protuberant foil journal bearing')</h3>
                <p class="lead">多层鼓泡箔片径向轴承(Multi-decked protuberant foil journal bearing)</p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->
    </div>
</div>

<!-- Use it -->
<div id ="useit" class="content-section-a">

    <div class="container">

        <div class="row">

            <div class="col-sm-6 pull-right wow fadeInRightBig">
                <img class="img-responsive " src="img/item5.png" alt="">
            </div>

            <div class="col-sm-6 wow fadeInLeftBig"  data-animation-delay="200">
                <h3 class="section-heading">@lang('page.Turbine power generation system')</h3>
                <div class="sub-title lead3">@lang('page.Prospects_title_one')</div>
                <p class="lead">
                    @lang('page.Prospects_desc_one')
                </p>

                {{--<p><a class="btn btn-embossed btn-primary" href="#" role="button">View Details</a>--}}
                    {{--<a class="btn btn-embossed btn-info" href="#" role="button">Visit Website</a></p>--}}
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>

<div class="content-section-b">

    <div class="container">
        <div class="row">
            <div class="col-sm-6 wow fadeInLeftBig">
                <div id="owl-demo-1" class="owl-carousel">
                    <a href="img/item6.png" class="image-link">
                        <div class="item">
                            <img  class="img-responsive img-rounded" src="img/item6.png" alt="">
                        </div>
                    </a>
                    <a href="img/item7.png" class="image-link">
                        <div class="item">
                            <img  class="img-responsive img-rounded" src="img/item7.png" alt="">
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 wow fadeInRightBig"  data-animation-delay="200">
                <h3 class="section-heading">@lang('page.New high speed air bearing turbine')</h3>
                <div class="sub-title lead3">@lang('page.Prospects_title_two')</div>
                <p class="lead">
                    @lang('page.Prospects_desc_two')
                </p>

                {{--<p><a class="btn btn-embossed btn-primary" href="#" role="button">View Details</a>--}}
                    {{--<a class="btn btn-embossed btn-info" href="#" role="button">Visit Website</a></p>--}}
            </div>
        </div>
    </div>
</div>

<div class="content-section-a">

    <div class="container">

        <div class="row">
            <div class="col-sm-6 pull-right wow fadeInLeftBig">
                <div id="owl-demo-2" class="owl-carousel">
                    <a href="img/item9.png" class="image-link">
                        <div class="item">
                            <img  class="img-responsive img-rounded" src="img/item9.png" alt="">
                        </div>
                    </a>
                    <a href="img/item36.jpg" class="image-link">
                        <div class="item">
                            <img  class="img-responsive img-rounded" src="img/item36.jpg" alt="">
                        </div>
                    </a>

                </div>
            </div>


            <div class="col-sm-6 wow fadeInLeftBig"  data-animation-delay="200">
                <h3 class="section-heading">@lang('page.Air bearing speed turbo blower system')</h3>
                <div class="sub-title lead3">@lang('page.Prospects_title_three')</div>
                <ul class="descp lead2">
                    <li><i class="glyphicon glyphicon-cog"></i> @lang('page.desc_item_one')</li>
                    <li><i class="glyphicon glyphicon-refresh"></i> @lang('page.desc_item_two')</li>
                    <li><i class="glyphicon glyphicon-record"></i> @lang('page.desc_item_three')</li>
                </ul>
            </div>
        </div>
    </div>

</div>

<!-- Screenshot -->
<div id="screen" class="content-section-b">
    <div class="container">
        <div class="row" >
            <div class="col-md-6 col-md-offset-3 text-center wrap_title ">
                <h2>@lang('page.Item Gallery')</h2>
                <p class="lead" style="margin-top:0">@lang('page.item_gallery_desc')</p>
            </div>
        </div>
        <div class="row wow bounceInUp" >
            <div id="owl-demo" class="owl-carousel">

                <a href="img/item2.png" class="image-link">
                    <div class="item">
                        <img  class="img-responsive img-rounded" src="img/item2.png" alt="Owl Image">
                    </div>
                </a>

                <a href="img/item4.png" class="image-link">
                    <div class="item">
                        <img  class="img-responsive img-rounded" src="img/item4.png" alt="Owl Image">
                    </div>
                </a>

                <a href="img/item8.png" class="image-link">
                    <div class="item">
                        <img  class="img-responsive img-rounded" src="img/item8.png" alt="Owl Image">
                    </div>
                </a>

                <a href="img/item14.png" class="image-link">
                    <div class="item">
                        <img  class="img-responsive img-rounded" src="img/item14.png" alt="Owl Image">
                    </div>
                </a>

                <a href="img/item15.png" class="image-link">
                    <div class="item">
                        <img  class="img-responsive img-rounded" src="img/item15.png" alt="Owl Image">
                    </div>
                </a>

                <a href="img/item25.png" class="image-link">
                    <div class="item">
                        <img  class="img-responsive img-rounded" src="img/item25.png" alt="Owl Image">
                    </div>
                </a>

                <a href="img/item26.png" class="image-link">
                    <div class="item">
                        <img  class="img-responsive img-rounded" src="img/item26.png" alt="Owl Image">
                    </div>
                </a>
                <a href="img/item27.png" class="image-link">
                    <div class="item">
                        <img  class="img-responsive img-rounded" src="img/item27.png" alt="Owl Image">
                    </div>
                </a>
            </div>
        </div>
    </div>


</div>

{{--
<div  class="content-section-c ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center white">
                <h2>Get Live Updates</h2>
                <p class="lead" style="margin-top:0">A special thanks to Death.</p>
            </div>
            <div class="col-md-6 col-md-offset-3 text-center">
                <div class="mockup-content">
                    <div class="morph-button wow pulse morph-button-inflow morph-button-inflow-1">
                        <button type="button "><span>Subscribe to our Newsletter</span></button>
                        <div class="morph-content">
                            <div>
                                <div class="content-style-form content-style-form-4 ">
                                    <h2 class="morph-clone">Subscribe to our Newsletter</h2>
                                    <form>
                                        <p><label>Your Email Address</label><input type="text"/></p>
                                        <p><button>Subscribe me</button></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>>
    </div>
</div>
--}}

<!-- Credits -->
<div id="credits" class="content-section-a">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3 text-center wrap_title">
                <h2>@lang('page.Honor')</h2>
                <p class="lead" style="margin-top:0">@lang('page.honor_title')</p>
            </div>

            {{--<div class="col-sm-6  block wow bounceIn">
                <div class="row">
                    <div class="col-md-4 box-icon rotate">
                        <i class="fa fa-desktop fa-4x "> </i>
                    </div>
                    <div class="col-md-8 box-ct">
                        <h3> Bootstrap </h3>
                        <p> Lorem ipsum dolor sit ametconsectetur adipiscing elit. Suspendisse orci quam. </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 block wow bounceIn">
                <div class="row">
                    <div class="col-md-4 box-icon rotate">
                        <i class="fa fa-picture-o fa-4x "> </i>
                    </div>
                    <div class="col-md-8 box-ct">
                        <h3> Owl-Carousel </h3>
                        <p> Nullam mo  arcu ac molestie scelerisqu vulputate, molestie ligula gravida, tempus ipsum.</p>
                    </div>
                </div>
            </div>--}}
        </div>

        <div class="row tworow">
            {{--<div class="col-sm-6  block wow bounceIn">
                <div class="row">
                    <div class="col-md-4 box-icon rotate">
                        <i class="fa fa-magic fa-4x "> </i>
                    </div>
                    <div class="col-md-8 box-ct">
                        <h3> Codrops </h3>
                        <p> Lorem ipsum dolor sit ametconsectetur adipiscing elit. Suspendisse orci quam. </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 block wow bounceIn">
                <div class="row">
                    <div class="col-md-4 box-icon rotate">
                        <i class="fa fa-heart fa-4x "> </i>
                    </div>
                    <div class="col-md-8 box-ct">
                        <h3> Lorem Ipsum</h3>
                        <p> Nullam mo  arcu ac molestie scelerisqu vulputate, molestie ligula gravida, tempus ipsum.</p>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
</div>

<!-- Banner Download -->
<div id="downloadlink" class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center wrap_title">
                <h2>Download Free</h2>
                <p class="lead" style="margin-top:0">Pay with a Tweet</p>
                <p><a class="btn btn-embossed btn-primary view" role="button">Free Download</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Contact -->
<div id="contact" class="content-section-a">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3 text-center wrap_title">
                <h2>Contact Us</h2>
                <p class="lead" style="margin-top:0">A special thanks to Death.</p>
            </div>

            <form role="form" action="" method="post" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="InputName">Your Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputEmail">Your Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputMessage">Message</label>
                        <div class="input-group">
                            <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>

                    <input type="submit" name="submit" id="submit" value="Submit" class="btn wow tada btn-embossed btn-primary pull-right">
                </div>
            </form>

            <hr class="featurette-divider hidden-lg">
            <div class="col-md-5 col-md-push-1 address">
                <address>
                    <h3>Office Location</h3>
                    <p class="lead"><a href="https://www.google.com/maps/preview?ie=UTF-8&q=The+Pentagon&fb=1&gl=us&hq=1400+Defense+Pentagon+Washington,+DC+20301-1400&cid=12647181945379443503&ei=qmYfU4H8LoL2oATa0IHIBg&ved=0CKwBEPwSMAo&safe=on">The Pentagon<br>
                            Washington, DC 20301</a><br>
                        Phone: XXX-XXX-XXXX<br>
                        Fax: XXX-XXX-YYYY</p>
                </address>

                <h3>Social</h3>
                <li class="social">
                    <a href="#"><i class="fa fa-facebook-square fa-size"> </i></a>
                    <a href="#"><i class="fa  fa-twitter-square fa-size"> </i> </a>
                    <a href="#"><i class="fa fa-google-plus-square fa-size"> </i></a>
                    <a href="#"><i class="fa fa-flickr fa-size"> </i> </a>
                </li>
            </div>
        </div>
    </div>
</div>



<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3 class="footer-title">Follow Me!</h3>
                <p>Vuoi ricevere news su altri template?<br/>
                    Visita Andrea Galanti.it e vedrai tutte le news riguardanti nuovi Theme!<br/>
                    Go to: <a  href="http://andreagalanti.it" target="_blank">andreagalanti.it</a>
                </p>

                <!-- LICENSE -->
                <a rel="cc:attributionURL" href="http://www.andreagalanti.it/flatfy"
                   property="dc:title">Flatfy Theme </a> by
                <a rel="dc:creator" href="http://www.andreagalanti.it"
                   property="cc:attributionName">Andrea Galanti</a>
                is licensed to the public under
                <BR>the <a rel="license"
                           href="http://creativecommons.org/licenses/by-nc/3.0/it/deed.it">Creative
                    Commons Attribution 3.0 License - NOT COMMERCIAL</a>.


            </div> <!-- /col-xs-7 -->

            <div class="col-md-5">
                <div class="footer-banner">
                    <h3 class="footer-title">Flatfy Theme</h3>
                    <ul>
                        <li>12 Column Grid Bootstrap</li>
                        <li>Form Contact</li>
                        <li>Drag Gallery</li>
                        <li>Full Responsive</li>
                        <li>Lorem Ipsum</li>
                    </ul>
                    Go to: <a href="http://andreagalanti.it/flatfy" target="_blank">andreagalanti.it/flatfy</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript -->
{{--<script src="js/jquery-1.10.2.js"></script>--}}
{{--<script src="js/bootstrap.js"></script>--}}
{{--<script src="js/owl.carousel.js"></script>--}}
{{--<script src="js/script.js"></script>--}}
<!-- StikyMenu -->
{{--<script src="js/stickUp.min.js"></script>--}}

<!-- Smoothscroll -->
{{--<script type="text/javascript" src="js/jquery.corner.js"></script>--}}
{{--<script src="js/wow.min.js"></script>--}}
{{--<script src="js/classie.js"></script>--}}
{{--<script src="js/uiMorphingButton_inflow.js"></script>--}}
<!-- Magnific Popup core JS file -->
{{--<script src="js/jquery.magnific-popup.js"></script>--}}
<script src="{{ elixir('js/front.js') }}"></script>

</body>

</html>
