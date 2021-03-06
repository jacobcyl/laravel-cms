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
    <meta name="description" content="@lang('page.slogan')">
    <meta name="author" content="">

    <title>@lang('page.ShangHai PlurJan Aviation Technology Co.,Ltd.')-@lang('page.slogan')</title>

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
    <link href="{{ elixir('css/homepage.css') }}" rel="stylesheet">

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
        <h1 class="h1_home wow fadeIn" style="color:#e0c53f;text-shadow: 1px 1px 2px black" data-wow-delay="0.4s">@lang('page.slogan')</h1>
        <h3 class="h3_home wow fadeIn" style="color:#f1ca08;text-shadow: 1px 1px 2px black" data-wow-delay="0.6s">@lang('page.ShangHai PlurJan Aviation Technology Co.,Ltd.')</h3>
        <ul class="list-inline intro-social-buttons">
            <li><a href="#" class="btn  btn-lg mybutton_cyano wow fadeIn" data-wow-delay="0.8s"><span class="network-name">Twitter</span></a>
            </li>
            <li id="contact_btn" ><a href="#contact" class="btn btn-success btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.2s"><span class="network-name">@lang('page.contact_us')</span></a>
            </li>
        </ul>
    </div>
    <!-- /.container -->
    <div class="col-xs-12 text-center abcen wow fadeIn">
        <div class="button_down ">
            <a class="imgcircle wow bounceInUp" data-wow-duration="1.5s"  href="#About"> <img class="img_scroll" src="img/icon/circle.png" alt=""> </a>
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
            <a class="navbar-brand" href="#home" style="padding: 0; margin: 5px 0; line-height: 50px">
                <img src="/img/logo.png" style="width: 45px; height: 45px; float: left">
                <span style="line-height: 50px; margin-left:20px">@lang('page.PlurJan')</span>
            </a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
            <ul class="nav navbar-nav">

                <li class="menuItem"><a href="#About">@lang('page.About')</a></li>
                <li class="menuItem"><a href="#Prospects">@lang('page.Prospects')</a></li>
                <li class="menuItem"><a href="#Gallery">@lang('page.Item Gallery')</a></li>
                <li class="menuItem"><a href="{{ route('news-list') }}">@lang('page.News')</a></li>
                <li class="menuItem"><a href="#Team">@lang('page.Team')</a></li>
                <li class="menuItem"><a href="#contact">@lang('page.Contact')</a></li>
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
<div id="About" class="content-section-b" style="border-top: 0">
    <div class="container">

        <div class="row">
            {{--<div class="col-md-4">
                <img src="img/aviation_modle.jpg" style="width:100%;">
            </div>--}}
            <div class="col-md-12 wrap_title">
                <h3>@lang('page.company_overview')</h3>
                <p class="lead" style="margin-top:0">
                    @if($about)
                        {!! $about->content !!}
                    @else
                        @lang('page.company_overview_content')
                    @endif
                </p>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-4 wow fadeInDown text-center">
                <img class="sm-item-img lazy" data-original="img/item32.png" alt="Micro-grooved thrust bearing">
                <h3>@lang('page.Micro-grooved thrust bearing')</h3>
                <p class="lead">微沟槽式止推轴承(Micro-grooved thrust bearing)</p>

                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="sm-item-img lazy" data-original="img/item1.png" alt="Generic placeholder image">
                <h3>@lang('page.Hybrid micro-grooved foil thrust bearing')</h3>
                <p class="lead"> 混合式止推轴承(Hybrid micro-grooved foil thrust bearing)</p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="sm-item-img lazy" data-original="img/item33.png" alt="Generic placeholder image">
                <h3>@lang('page.Multi-decked protuberant foil thrust bearing')</h3>
                <p class="lead">多层鼓泡箔片止推轴承(Multi-decked protuberant foil thrust bearing)</p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->

        <div class="row tworow">

            <div class="col-sm-4  wow fadeInDown text-center">
                <img class="sm-item-img lazy" data-original="img/item31.png" alt="Generic placeholder image">
                <h3>@lang('page.Micro-grooved journal bearing')</h3>
                <p class="lead">微沟槽式径向轴承(Micro-grooved journal bearing)</p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="sm-item-img lazy" data-original="img/item3.png" alt="Generic placeholder image">
                <h3>@lang('page.Hybrid micro-grooved foil journal bearing')</h3>
                <p class="lead">混合式径向轴承(Hybrid micro-grooved foil journal bearing)</p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="sm-item-img lazy" data-original="img/item34.png" alt="Generic placeholder image">
                <h3>@lang('page.Multi-decked protuberant foil journal bearing')</h3>
                <p class="lead">多层鼓泡箔片径向轴承(Multi-decked protuberant foil journal bearing)</p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->
    </div>
</div>

<!-- Use it -->
<div id ="Prospects" class="content-section-a">

    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6 col-sm-push-6 wow fadeInRightBig">
                <div id="owl-demo-0" class="owl-carousel owl-theme">
                    <a href="img/image2.jpg" class="image-link">
                        <div class="item">
                            <img  class="img-responsive img-rounded owl-lazy" data-src="img/image2.jpg"  alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-sm-pull-6 wow fadeInLeftBig"  data-animation-delay="200">
                <h3 class="section-heading">@lang('page.Turbine power generation system')</h3>
                <div class="sub-title lead3">@lang('page.Prospects_title_one')</div>
                <p class="lead">
                    @lang('page.Prospects_desc_one')
                </p>
                <div class="table-responsive ">
                    <table class="table table-bordered" style="font-size: 14px;">
                        <thead>
                            <tr class="active">
                                <th style="width: 20%">@lang('page.Product Name')</th>
                                <th colspan="8">@lang('page.Model')</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                            <tr>
                                <td>@lang('page.Micro-grooved thrust bearing')</td>
                                <td>WZ-30</td>
                                <td>WZ-40</td>
                                <td>WZ-50</td>
                                <td>WZ-60</td>
                                <td>WZ-70</td>
                                <td>WZ-80</td>
                                <td>WZ-80</td>
                                <td>WZ-100</td>
                            </tr>
                            <tr>
                                <td>@lang('page.Micro-grooved journal bearing')</td>
                                <td>WJ-06</td>
                                <td>WJ-12</td>
                                <td>WJ-18</td>
                                <td>WJ-24</td>
                                <td>WJ-30</td>
                                <td>WJ-36</td>
                                <td>WJ-42</td>
                                <td>WJ-48</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>

<div class="content-section-b">

    <div class="container">
        <div class="row">
            <div class="col-sm-6 wow fadeInLeftBig">
                <div id="owl-demo-1" class="owl-carousel owl-theme">
                    <a href="img/image5.jpg" class="image-link">
                        <div class="item">
                            <img  class="img-responsive img-rounded owl-lazy" data-src="img/image5.jpg"  alt="">
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
                <div class="table-responsive ">
                    <table class="table table-bordered" style="font-size: 14px;">
                        <thead>
                        <tr class="active">
                            <th style="width: 20%">@lang('page.Product Name')</th>
                            <th colspan="8">@lang('page.Model')</th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                        <tr>
                            <td>@lang('page.Hybrid micro-grooved foil thrust bearing')</td>

                            <td>HZ-30</td>
                            <td>HZ-40</td>
                            <td>HZ-50</td>
                            <td>HZ-60</td>
                            <td>HZ-70</td>
                            <td>HZ-80</td>
                            <td>HZ-90</td>
                            <td>HZ-100</td>
                        </tr>
                        <tr>
                            <td>@lang('page.Hybrid micro-grooved foil journal bearing')</td>
                            <td>HJ-06</td>
                            <td>HJ-12</td>
                            <td>HJ-18</td>
                            <td>HJ-24</td>
                            <td>HJ-30</td>
                            <td>HJ-36</td>
                            <td>HJ-42</td>
                            <td>HJ-48</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-section-a">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-sm-push-6 wow fadeInLeftBig">
                <div id="owl-demo-2" class="owl-carousel owl-theme">
                    <a href="img/item6.png" class="image-link">
                        <div class="item">
                            <img  class="img-responsive img-rounded owl-lazy" data-src="img/item6.png" alt="">
                        </div>
                    </a>
                    <a href="img/item50.jpg" class="image-link">
                        <div class="item">
                            <img  class="img-responsive img-rounded owl-lazy" data-src="img/item50.jpg" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-sm-pull-6 wow fadeInLeftBig"  data-animation-delay="200">
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

@if($album)
<!-- Screenshot -->
<div id="Gallery" class="content-section-b">
    <div class="container">
        <div class="row" >
            <div class="col-md-6 col-md-offset-3 text-center wrap_title ">
                <h2>@lang('page.Item Gallery')</h2>
                <p class="lead" style="margin-top:0">@lang('page.item_gallery_desc')</p>
            </div>
        </div>
        <div class="row wow bounceInUp" >
            <div id="owl-demo" class="owl-carousel owl-theme">
                @foreach($album->photos as $photo)
                    <a href="{{ asset($photo->url) }}" class="image-link">
                        <div class="item">
                            <img  class="img-responsive img-rounded owl-lazy" data-src="{{ asset($photo->url) }}" alt="{{ $photo->pivot->description }}">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
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

<!-- Team -->
<div id="Team" class="content-section-a team">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center wrap_title">
                <h2>@lang('page.Team')</h2>
                <p class="lead" style="margin-top:0">@lang('page.team deac')</p>
            </div>
        </div>
        <div class="row">
            @foreach($staffs as $key => $staff)
                <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 block wow bounceIn staff-item">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="sm-item-img lazy" style="height: 160px; object-fit: cover;" data-original="{{ $staff->avatar->path }}" alt="Micro-grooved thrust bearing">
                        </div>
                        <div class="col-md-9">
                            <h3 style="margin-top: 15px;">
                                {{ $staff->title }}
                            </h3>
                            <p style="">
                                {!! str_replace(chr(13).chr(10), "<br />", $staff->description) !!}
                            </p>
                        </div>
                    </div>
                </div>
                @if($key%2 == 1 )<div class="clearfix visible-*-block"></div>@endif
            @endforeach
        </div>
    </div>
</div>

<div id="contact" class="content-section-a">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3 text-center wrap_title">
                <h2>@lang('page.Contact Us')</h2>
                <p class="lead" style="margin-top:0">@lang('page.A special thanks to Death.')</p>
            </div>

            <form id="contact-form" role="form" action="/contact" method="post" >
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="InputName">@lang('page.Your Name')</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" id="InputName" placeholder="@lang('page.Enter Name')" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputEmail">@lang('page.Your Email')</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="InputEmail" name="email" placeholder="@lang('page.Enter Email')" required  >
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputMessage">@lang('page.Your Message')</label>
                        <div class="input-group">
                            <textarea name="message" id="InputMessage" class="form-control" rows="5" required></textarea>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="@lang('page.Enter Captcha')" required  >
                            <div data-refresh-config="flat" title="@lang('page.Click To Refresh')" class="input-group-addon refresh-captcha">
                                {!! captcha_img('flat') !!}
                            </div>
                            <input type="submit" name="submit" id="submit" value="@lang('page.Submit')" class="btn wow tada btn-embossed btn-primary pull-right">
                        </div>
                    </div>

                </div>
            </form>

            <hr class="featurette-divider hidden-lg">
            <div class="col-md-5 col-md-push-1 address">
                <address>
                    <h3 style="color:#1abc9c">@lang('page.Office Location')</h3>
                    <p class="lead"><a target="_blank" href="https://goo.gl/maps/hSLwsWHR4cw">
                        @lang('page.ShangHai PlurJan Aviation Technology Co.,Ltd.')<br>
                        @lang('page.Chrysanthemum Area, Jiading District, Shanghai, China') </a><br>
                        @lang('page.Tel'): <span style="color:#928908">(+86)021-55512352</span><br>
                        @lang('page.Email_Company'): <span style="color:#928908">plurjan&#64;plur<!-- >@. -->jan&#46;com</span>
                    </p>  
                    {{--
                    <p>  
                        <strong style="color:#1abc9c">@lang('page.Business Or Cooperation Contact Email By Region'):</strong><br>
                        @lang('page.Email_China'): <span style="color:#928908">cn&#64;plur<!-- >@. -->jan&#46;com</span><br>
                        @lang('page.Email_Europe'): <span style="color:#928908">eu&#64;plur<!-- >@. -->jan&#46;com</span><br>
                        @lang('page.Email_Eurasian'): <span style="color:#928908">ea&#64;plur<!-- >@. -->jan&#46;com</span><br>
                        @lang('page.Email_North_America'): <span style="color:#928908">na&#64;plur<!-- >@. -->jan&#46;com</span><br>
                        @lang('page.Email_South_America'): <span style="color:#928908">sa&#64;plur<!-- >@. -->jan&#46;com</span><br>
                        @lang('page.Email_Asia'): <span style="color:#928908">asia&#64;plur<!-- >@. -->jan&#46;com</span><br>
                        @lang('page.Email_Africa'): <span style="color:#928908">africa&#64;plur<!-- >@. -->jan&#46;com</span><br>
                        @lang('page.Email_Oceania'): <span style="color:#928908">oceania&#64;plur<!-- >@. -->jan&#46;com</span>
                    </p>
                    --}}
                </address>

                {{--
                <h3>@lang('page.Social')</h3>
                <li class="social">
                    <a href="#"><i class="fa fa-facebook-square fa-size"> </i></a>
                    <a href="#"><i class="fa  fa-twitter-square fa-size"> </i> </a>
                    <a href="#"><i class="fa fa-google-plus-square fa-size"> </i></a>
                    <a href="#"><i class="fa fa-flickr fa-size"> </i> </a>
                </li>
                --}}
            </div>
        </div>
    </div>
</div>



<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3 class="footer-title">@lang('page.Know More')</h3>
                <p>
                    @lang('page.Know More Detail')
                </p>
            </div> <!-- /col-xs-7 -->

            <div class="col-md-5">
                <div class="footer-banner">
                    <h3 class="footer-title">@lang('page.Technical support')</h3>
                    <ul>
                        <!-- <li>@lang('page.Shanghai Institute of Ceramics, Chinese Academy of Sciences')</li> -->
                        <!-- <li>@lang('page.High Performance Ceramics and ultrastructure of the State Key Laboratory')</li> -->
                        <!-- <li>@lang('page.Structural ceramics and composite materials research center')</li> -->
                        <li>@lang('page.Shanghai PlurJian aviation co-production base')</li>
                        <li>@lang('page.Guangzhou PlurJian aviation co-production base')</li>
                        <!-- <li>@lang('page.Foshan CAS Shanghai Institute of Silicate Ceramic Development Center')</li> -->
                        <li>@lang('page.School of Energy and Power Engineering, Xi`an Jiaotong University')</li>
                        <li>@lang('page.Institute of Advanced Manufacturing Technology, Hefei Institute of Material Science, Chinese Academy of Sciences')</li>
                        <li>@lang('page.Central Iron & Steel Research Institute')</li>
                        <li>@lang('page.Department of Electrical Engineering, TsingHua University')</li>
                        <!-- <li>@lang('page.Shanghai Institute of Ceramics, Chinese Academy of Sciences Advanced ceramic manufacturing technology development platform')</li> -->
                    </ul>
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
<script src="{{ elixir('js/homepage.js') }}"></script>

</body>

</html>
