<!doctype html>
<html lang="en">
  @include('part_admin.header')
  <body>
@include('part_admin.navbar')
  <div class="content">
    @yield('content')
  </div>

@include('part_admin.footer')
  </body>
</html>