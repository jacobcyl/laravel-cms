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

                <li class="menuItem"><a href="/#About">@lang('page.About')</a></li>
                <li class="menuItem"><a href="/#Prospects">@lang('page.Prospects')</a></li>
                <li class="menuItem"><a href="/#Gallery">@lang('page.Item Gallery')</a></li>
                <li class="menuItem"><a href="{{ route('news-list') }}">@lang('page.News')</a></li>
                <li class="menuItem"><a href="/#Team">@lang('page.Team')</a></li>
                <li class="menuItem"><a href="/#contact">@lang('page.Contact')</a></li>
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
<div class="row post-list">
    <div class="col-md-10 col-md-offset-1">
        <div class="row" >
        @foreach($posts as $post)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 img-item">
                <div class="post-area" style="overflow: hidden;">
                    <div  class="scale w-5-3-h" style="background: #aaa;">
                        <a href="{{ route('news-show', ['id' => $post->id]) }}">
                            <img class="scale-box" style="object-fit: cover" src="{{ url( $post->cover?$post->cover->path:'/img/placehold.png' ) }}"  />
                        </a>
                    </div>
                    <h2 style="padding: 0 20px; margin:0;font-size: 1rem;">
                        <a title="{{ $post->title }}" href="{{ route('news-show', ['id' => $post->id]) }}">{{ $post->title }}</a>
                    </h2>
                    <div class="info">
                        <div class="post-date">{{ $post->created_at }}</div>
                    </div>
                    <div class="category">
                    </div>
                </div>
            </div>            
        @endforeach
        </div>
        {{ $posts->links() }}
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">

        </div>
    </div>
</footer>
<style>
    .isStuck~.post-list{
        margin-top: 80px !important;
    }
    .img-item h2 a{
        display: inline-block;
        overflow: hidden;
        box-sizing: border-box;
        width: 100%;
        height: 50px;
        color: #000;
        vertical-align: top;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-weight: normal;
        font-size: 1.5rem;
        line-height: 50px;
        text-decoration: none
    }
    .post-area{
        margin-top: 20px;
    }
    .post-area:hover {
        -webkit-box-shadow: 0px 0px 15px #ccc;
        -moz-box-shadow: 0px 0px 15px #ccc;
        box-shadow: 0px 0px 15px #ccc;
    }
    .scale {
        height: 0;
        position: relative;
    }

    .w-5-3-h {
        padding-bottom: 60%;
    }
    .scale .scale-box {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }
    .post-area .info {
        position: relative;
        padding: 0 20px;
        /* height: 60px; */
        overflow: hidden;
    }
    .post-area .info .post-date{
        float: right;
        overflow: hidden;
        margin-left: 10px;
        color: #a3a3a3;
        text-align: left;
        white-space: nowrap;
        font-size: 14px;
    }
</style>
<script src="{{ elixir('js/homepage.js') }}"></script>

</body>

</html>
