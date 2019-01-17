<head>
    <meta charset="UTF-8">
    {{--<title> AdminLTE 2 with Laravel - @yield('htmlheader_title', 'Your title here') </title>--}}
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @if(!empty($meta))
<!--        --><?php //var_dump($meta); die();?>
        @foreach($meta as $one)
        <title> {{$one->title}} </title>
        <meta content='{{$one->keywords}}' name='keywords'>
        <meta content='{{$one->content}}' name='descrption'>
        @endforeach
    @endif
    <!-- Bootstrap 3.3.4 -->
    @if(session("lang")== 2)
        <link href="{{ asset('/css/bootstrap-arabic.css') }}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <!-- Font Awesome Icons -->
    {{--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />--}}

    <link rel="stylesheet" href={{asset("/css/font-awesome.min.css")}}>

    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset('/css/skins/skin-blue.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    <!-- datatables -->
    <link href="{{ asset('/css/datatables.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href={{ asset("/css/font.css")}}>
    <link rel="stylesheet" href={{ asset("/css/animate.css")}}>
    @if(session("lang") == 2)
        <link rel="stylesheet"  href={{ asset("/css/main-ar.css")}}>
    @endif
    {{--
    <link rel="stylesheet" href={{ asset("/css/structure.css")}}>
--}}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .navbar-default{
            background-color: #222;
            border-color: #080808;
        }

        .navbar-default .navbar-nav > li > a ,
        .navbar-default .navbar-brand{color: #ddd;}


        .navbar-default .navbar-nav > li > a:hover ,
        .navbar-default .navbar-brand:hover
        .navbar-default .navbar-nav > li > a:focus,
        .navbar-default .navbar-brand:focus{color: #fff;}

        .panel-default > .panel-heading {
            color: #f4f4f4;
            background-color: #222;
            border-color: #080808;
        }
        .navbar{
            margin-bottom: 0;
        }
        .dropdown-menu > li.kopie > a {
            padding-left:5px;
        }

        .dropdown-submenu {
            position:relative;
        }
        .dropdown-submenu>.dropdown-menu {
            top:0;right:100%;
            margin-top:-6px;margin-left:-1px;
            -webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;
        }

        .dropdown-submenu > a:after {
            border-color: transparent #333 transparent transparent;
            border-style: solid;
            border-width: 5px 5px 5px 0;
            content: " ";
            display: block;
            float: left;
            height: 0;
            margin-left: -10px;
            margin-top: 5px;
            width: 0;
}

        .dropdown-submenu:hover>a:after {
            border-left-color:#555;
        }

        .dropdown-menu > li > a:hover, .dropdown-menu > .active > a:hover {
            text-decoration: none;
        }
        .category-list-container{
            background-color: #FFD230;
        }
        .category-list-container hr{
            border-top-color: rgba(18,18,18,0.2);
            margin-bottom: 0;
            margin-top: 10px;
        }
        .category-list-container .category-parent-container header{
            padding-bottom: 5px;
            padding-top: 10px ;
        }
        .category-parent-container .h1{
            color: #000;
            font-weight: bold;
        }
        .category-children-container{
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .category-children-container .category-children-nav .category-children-item{
            border-left : 1px solid #333 ;
        }
        .category-children-container .category-children-nav .category-children-item a{
            text-decoration: none;
            color: #000;
        }
        .title-color{
            color: #20242c;
            font-weight: bold;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            margin: 0;
        }
        .description-color{
            color: #90949c;
            margin-bottom: 5px;
        }
        .recent-post-panel{
            margin-top: 70px;
        }
        #menuFooter{
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        @media (max-width: 767px) {

            .navbar-nav  {
                display: inline;
            }
            .navbar-default .navbar-brand {
                display: inline;
            }
            .navbar-default .navbar-toggle .icon-bar {
                background-color: #fff;
            }
            .navbar-default .navbar-nav .dropdown-menu > li > a {
                color: red;
                background-color: #ccc;
                border-radius: 4px;
                margin-top: 2px;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > li > a {
                color: #333;
            }
            .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
                background-color: #ccc;
            }

            .navbar-nav .open .dropdown-menu {
                border-bottom: 1px solid white;
                border-radius: 0;
            }
            .dropdown-menu {
                padding-left: 10px;
            }
            .dropdown-menu .dropdown-menu {
                padding-left: 20px;
            }
            .dropdown-menu .dropdown-menu .dropdown-menu {
                padding-left: 30px;
            }
            li.dropdown.open {
                border: 0px solid red;
            }

        }

        @media (min-width: 768px) {
            ul.nav li:hover > ul.dropdown-menu {
                display: block;
            }
            #navbar {
                text-align: center;
            }
        }

    </style>
    <script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('/js/tabs/jqxcore.js') }}"></script>
    <script src="{{ asset('/js/tabs/jqxtabs.js') }}"></script>
    <link href="{{ asset('/css/tabs/jqx.base.css') }}" rel="stylesheet" type="text/css" />


</head>