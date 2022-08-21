<!DOCTYPE html>
<html>

<head>
    <title>education</title>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('fontend.layouts.css')
    @yield('page-css')
</head>

<body>
    <div id="page" class="site" itemscope itemtype="http://schema.org/LocalBusiness">
        @include('fontend.layouts.header')
        <!-- Header Close -->
        <div class="banner">
            @include('fontend.layouts.banner')
        </div>

        <!-- Banner Close -->
        @yield('content')
        <!-- End of Query Section -->
        <footer class="page-footer" itemprop="footer" itemscope itemtype="http://schema.org/WPFooter">
            @include('fontend.layouts.footer')
        </footer>

        <!-- <nav id="menu">
   <ul>
    <li><a href="#">HOME</a></li>
    <li>
     <span>COURSES</span>
     <ul>
      <li><a href="#/courses/child">Child</a></li>
      <li><a href="#/courses/child">Child</a></li>
      <li>
       <span>Child</span>
       <ul>
        <li><a href="#/courses/child/grandChild">Grand Child</a></li>
        <li><a href="#/courses/child/grandChild">Grand Child</a></li>
       </ul>
      </li>
     </ul>
    </li>
    <li>
     <a href="#">gallery</a>
     <ul>
      <li><a href="#">Child</a></li>
      <li><a href="#">Child</a></li>
      <li><a href="#">Child</a></li>
     </ul>
    </li>
    <li>
     <a href="#">news</a>
     <ul>
      <li><a href="#">Child</a></li>
      <li><a href="#">Child</a></li>
      <li><a href="#">Child</a></li>
     </ul>
    </li>
    <li><a href="#">about</a></li>
    <li><a href="#">contact</a></li>
   </ul>
  </nav> -->

    </div>
    @include('fontend.layouts.js')
    @yield('page-js')
</body>

</html>
