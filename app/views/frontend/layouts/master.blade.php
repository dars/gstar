<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/menu_format.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="GSTAR,Headset,OEM,Bluetooth headset,Network microphone,Earphone,Earloop,Accessories,Gaming Headset" />
<meta name="copyright" CONTENT="copyright@G-STAR INDUSTrIAL CO.,LTD">
<!-- InstanceBeginEditable name="doctitle" -->
<title>G-STAR INDUSTRIAL CO., LTD</title>
<!-- InstanceEndEditable -->
{{ HTML::style('assets/frontend/css/reset.css') }}
{{ HTML::style('assets/frontend/css/base.css') }}
{{ HTML::style('assets/frontend/css/product_menu.css') }}
<link href='http://fonts.googleapis.com/css?family=Archivo+Black' rel='stylesheet' type='text/css'>
{{ HTML::style('assets/frontend/css/font-awesome.min.css') }}
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>
{{ HTML::style('assets/frontend/css/slider.css') }}
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" type="image/gif" href="animated_favicon1.gif">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
{{ HTML::script('assets/frontend/js/menu_scripts.js') }}
{{ HTML::script('assets/frontend/js/swipe.js') }}
{{ HTML::script('assets/frontend/js/rotate-patch.js') }}
{{ HTML::script('assets/frontend/js/slider.js') }}
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div id="leftHeader"></div>
<div id="mainWrap">
  <div class="header">
    <div class="logo"> <a href="index.html"><img src="{{ asset('assets/frontend/images/gstar_logo.png') }}" width="148" height="66" alt="G-STAR" /></a> </div>
    <div class="headerMenu">
      <ul>
        <li><a href="index.html">HOME</a></li>
        |
        <li><a href="all_products.html">PRODUCTS</a></li>
        |
        <li><a href="about.php">ABOUT</a></li>
        |
        <li><a href="contact.php">CONTACT</a></li>
        |
        <li><a href="support.php">SUPPORT</a></li>
      </ul>
    </div>
    <div id="searchwrapper">
      <form action="">
        <input type="text" class="searchbox" name="s" value="Product Search" />
        <input type="image" src="{{ asset('assets/frontend/images/search_icon.png') }}" class="searchbox_submit" value="" />
      </form>
    </div>
  </div>
  <div class="productBanner"><!-- InstanceBeginEditable name="mainb_banner" -->
    <div class="as_slider" id="gstarSlider">
        <img src="{{ asset('assets/frontend/images/slider_banners/index_slider01.jpg') }}" data-effect="boxesOrder-zoomOut" data-captioneffect="fade" />
        <img src="{{ asset('assets/frontend/images/slider_banners/index_slider02.jpg') }}" data-effect="boxesDiagonal" />
        <img src="{{ asset('assets/frontend/images/slider_banners/index_slider03.jpg') }}" data-effect="fromRight" />
        <img src="{{ asset('assets/frontend/images/slider_banners/index_slider04.jpg') }}" data-effect="boxesOrder-zoomOut" data-captioneffect="fade" />
    </div>


  <!-- InstanceEndEditable --></div>
  <!-- InstanceBeginEditable name="breadcrumb" -->
  <div id="newsBox">
    <div class="newsTitleImg">G-STAR NEWS</div>
    <div class="showImg"><img src="{{ asset('assets/frontend/images/show_logo.jpg') }}" /></div>
    <div class="newsArrow"><img src="{{ asset('assets/frontend/images/news_arrow.png') }}" /></div>
    <div class="contenctTxt">
      <p>Welcome to visit Gstar booth at Electronics show, Hong Kong on 13-16 Apr,
      </p>
      <p>2013 at Hall3, 3EA03. </p>
    </div>
  </div>
  <!-- InstanceEndEditable -->
  <div id="mainContent"><!-- InstanceBeginEditable name="ProductMenu" -->
    <div id="productMenu"> <img src="{{ asset('assets/frontend/images/menu_title.gif') }}" />
      <!-- \ mainmenu -->
      <!-- \ 1st Menu Item -->
      <ul class="accordion">
        <li><a href="#">Wireless Headset</a>
          <ul>
            <!-- \ expanded submenu -->
            <li><a href="products_second.html">2.4GHz RF Headset</a></li>
            <li><a href="products_second.html">Bluetooth Headset</a></li>
          </ul>
        </li>
        <!-- \ 2nd Menu Item -->
        <li><a href="#">Stereo Headset / Headphone</a>
          <ul>
            <!-- \ submenu -->
            <li><a href="products_second.html">Multimedia Headset</a></li>
            <li><a href="products_second.html">Active Noise Cancellation Headphone</a></li>
            <li><a href="products_second.html">Hi Fi Audio Headphone</a></li>
            <li><a href="products_second.html">USB Stereo Headset</a></li>
            <li><a href="products_second.html">Neckband Headset/Headphone</a></li>
          </ul>
        </li>
        <!-- \ 3rd Menu Item -->
        <li><a href="#">Gaming Headset</a>
          <ul>
            <!-- \ submenu -->
            <li><a>Real 5.1ch / 7.1ch Surrounding Headset</a></li>
            <li><a>Virtual 7.1ch Surrounding Headset</a></li>
            <li><a>Console Gaming Headset
              (PS3, Xbox, PC)</a></li>
            <li><a>USB Bass Bibration / ENC/EQ Headset</a></li>
          </ul>
        </li>
        <!-- \ 4th Menu Item -->
        <li><a href="#">Earphone / Earloop</a>
          <ul>
            <!-- \ submenu -->
            <li><a href="products_second.html">Smart Phone / Tablet</a></li>
            <li><a href="products_second.html">Earbud/Earloop</a></li>
          </ul>
        </li>
        <!-- \ 5th Menu Item -->
        <li><a href="#">Accessories / Microphone</a>
          <ul>
            <!-- \ submenu -->
            <li><a href="products_second.html">USB Sound Adaptor</a></li>
            <li><a href="products_second.html">Calbe Adaptor</a></li>
            <li><a href="products_second.html">Internet Microphone</a></li>
          </ul>
        </li>
      </ul>
      <!-- / mainmenu -->
    </div>
  <!-- InstanceEndEditable -->
    <div id="ContentR"><!-- InstanceBeginEditable name="ContentR" -->
        <div id="indexR">
        <ul>
            <li><img src="{{ asset('assets/frontend/images/pimg01.jpg') }}" width="180" height="204" /></li>
            <li><img src="{{ asset('assets/frontend/images/pimg02.jpg') }}" width="180" height="204" /></li>
            <li><img src="{{ asset('assets/frontend/images/pimg03.jpg') }}" width="180" height="204" /></li>
            <li><img src="{{ asset('assets/frontend/images/pimg04.jpg') }}" width="180" height="204" /></li>
            <li><img src="{{ asset('assets/frontend/images/pimg05.jpg') }}" width="180" height="204" /></li>
            <li><img src="{{ asset('assets/frontend/images/pimg06.jpg') }}" width="180" height="204" /></li>
        </ul>
        </div>
          <script type="text/javascript">

      $(window).load(function(){

          var slr = jQuery('#gstarSlider').autoSlider();


      });

  </script>
    <!-- InstanceEndEditable --></div>
  </div>
</div>
<div id="footer01">iPad, iPhone, iPod classic, iPod shuffle, and iPod touch are trademarks of Apple Inc., registered in the U.S. and other countries.</div>
<div id="footer02">
  <div class="footerContent">
    <div class="footer02L">copyright@2013 G-STAR INDUSTrIAL CO.,LTD</div>
    <div class="footer02R">3F., No.646, Sec. 5, Chongxin Rd., Sanchong Dist., New Taipei City 241, Taiwan (R.O.C.) <br />
      Tel.+886-2-2278-3655&nbsp;&nbsp;|&nbsp;&nbsp;Fax. +886-2-2278-2206</div>
  </div>
</div>
</body>
</html>
