<!doctype html>
<html ng-app="gstarApp">
<head>
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>@yield('pageTitle')</title>
    {{ HTML::style('assets/admin/css/application.css') }}

    <!--[if lt IE 9]>
    {{ HTML::script('components/html5shiv/src/html5shiv.js') }}
    <![endif]-->
    {{ HTML::script('assets/admin/js/application.js') }}
    @yield('head')
    <script type="text/javascript">@yield('script')</script>
</head>

<body>
    <!-- header -->
    <div class="navbar navbar-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="#">G-Star Admin Panel</a>

                <div class="nav-collapse nav-collapse-top collapse">
                    @if(Auth::check())
                    <ul class="nav full pull-right">
                        <li class="dropdown user-avatar">

                            <!-- the dropdown has a custom user-avatar class, this is the small avatar with the badge -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span>
                                    <span>系統管理者 ({{ Auth::user()->username }})<i class="icon-caret-down"></i></span>
                                </span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="{{ URL::route('user.logout') }}"><i class="icon-off"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                    <ul class="nav pull-right">
                        <li class="active"><a href="#" title="Go home"><i class="icon-home"></i> Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::check())
    <!-- 側邊欄 -->
    <div class="sidebar-background">
        <div class="primary-sidebar-background"></div>
    </div>
    <div class="primary-sidebar">
        <!-- Main nav -->
        <ul class="nav nav-collapse collapse nav-collapse-primary">
            <li class="active">
                <span class="glow"></span>
                <a href="#">
                    <i class="icon-dashboard icon-2x"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="dark-nav">
                <span class="glow"></span>
                <a class="accordion-toggle collapsed " data-toggle="collapse" href="#Besh9nDMaU">
                    <i class="icon-headphones icon-2x"></i>
                    <span>
                        產品管理<i class="icon-caret-down"></i>
                    </span>
                </a>

                <ul id="Besh9nDMaU" class="collapse ">
                    <li class="">
                        <a href="{{ URL::route('admin.product.index') }}">
                            <i class="icon-edit"></i> 商品資料維護
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ URL::route('taxonomy') }}">
                            <i class="icon-sitemap"></i> 商品分類設定
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <span class="glow"></span>
                <a href="#">
                    <i class="icon-user icon-2x"></i>
                    <span>管理帳號設定</span>
                </a>
            </li>
        </ul>
    </div>
    @endif

    <div class="main-content">
        @if(Auth::check())
        <!-- 內容標題 -->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="area-top clearfix">
                    <div class="pull-left header">
                        <h3 class="title">
                            @yield('func_title')
                        </h3>
                        <h5>
                            @yield('func_subtitle')
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- 麵包屑 -->
        @yield('breadcrumbs')
        @endif
        <!-- 主內容 -->
        @yield('content')
    </div>
</body>
</html>
