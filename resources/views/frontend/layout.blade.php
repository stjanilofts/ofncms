<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@include('frontend._title')</title>
        <meta name="description" content="{{ isset($seo) ? $seo->title : config('formable.site_title') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="token" name="token" value="{{ csrf_token() }}">

        <meta property="og:title" content="{{ isset($seo) ? $seo->title : config('formable.site_title') }}" />
        <meta property="og:url" content="{{ \Request::root() }}/{{ \Request::path() }}" />

        @if(isset($seo))
            @if($seo->img()->exists())
                <meta property="og:image"
                      content="{{ \Request::root() }}/imagecache/facebook/{{ $seo->img()->first() }}" />
            @else
                <meta property="og:image" content="{{ \Request::root() }}/imagecache/facebook/facebook.jpg" />
            @endif

            @if($seo->content)
                <meta property="og:description" content="{{ shortenClean($seo->content, 200) }}" />
            @endif
        @else
            <meta property="og:image" content="{{ \Request::root() }}/imagecache/facebook/facebook.jpg" />
            <meta property="og:description" content="{{ config('formable.site_description') }}" />
        @endif

        <meta property="og:image:width" content="600"/>
        <meta property="og:image:height" content="315"/>

        <link rel="stylesheet" href="/css/bundle.css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="/js/bundle.js"></script>
        <script>
        Vue.config.debug = false;
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
        </script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        {{-- 
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '',
              xfbml      : true,
              version    : 'v2.5'
            });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/is_IS/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script> --}}

        <div class="container container--shadow">
            <div class="Head">            
                <a id="logo" href="/"><img src="/img/logo.png" /></a>

                <div class="icons">
                    <ul>
                        <li><a href="https://www.facebook.com/ofnasmidjareykjavikur"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>

                <nav class="Main">
                    {!! kalMenu() !!}
                </nav>

                <nav class="Mobile">
                    <ul>
                        <li><a class="Mobile__button" href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </nav>
            </div>
            <nav class="Mobile__nav">
                {!! kalMenu() !!}
            </nav>

            @if(frontpage())
                <div class="Slider">
                    <?php

                    $subs = getContentBySlug('_forsidumyndir')->getSubs()->shuffle();

                    ?>
                    @foreach($subs as $sub)
                        <div>
                            <div class="Slider__image">
                                <img src="/imagecache/slider/{{ $sub->img()->first() }}" />
                                
                                <div class="Slider__text">
                                    <h2>{{ trim(strip_tags($sub->content)) }}</h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <?php

                $banner = getContentBySlug('_forsidumyndir')->getSubs()->random();

                ?>
                <div class="Banner" style="background: white url('/imagecache/banner/{{ $banner->img()->first() }}') center center no-repeat; background-size: cover;">
                    <h1>@yield('title')</h1>
                </div>
            @endif
        </div>

        @if(frontpage())
            <div class="container container--gutter-top">
                <div class="Cards">
                    <?php

                    $subs = getContentBySlug('_forsidukubbar')->getSubs();

                    ?>
                    @foreach($subs as $sub)
                        @include('frontend._card', ['item'=>$sub, 'path'=>'#'])
                    @endforeach
                </div>
            </div>
        @endif

        @yield('content')

        <div class="container container--gutter-top">
            <?php

            $opnunartimi = getContentBySlug('_opnunartimi');
            $stadsetning = getContentBySlug('_stadsetning');
            $simi = getContentBySlug('_simi');

            ?>
            @include('frontend._box', ['align' => 'center', 'icon' => 'fa-clock-o', 'item' => $opnunartimi])
            @include('frontend._box', ['align' => 'center', 'icon' => 'fa-phone', 'item' => $simi])
            @include('frontend._box', ['pure' => true, 'item' => $stadsetning])
        </div>

        <div class="container container--shadow">
            <div class="Logos">
                <?php

                $subs = getContentBySlug('_merki')->getSubs()->shuffle();

                ?>
                @foreach($subs as $sub)
                    <div>
                        <div class="Logos__image">
                            <a href="#"><img src="/imagecache/logo/{{ $sub->img()->first() }}" /></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="container">
            <div class="Footer">
                © Ofnasmiðja Reykjavíkur | Vagnhöfði 11 | 110 Reykjavík | Iceland | Kt. 701293-4449
            </div>
        </div>

        <script src="/js/scripts.js"></script>
    </body>
</html>
