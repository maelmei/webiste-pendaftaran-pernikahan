<!DOCTYPE html>
<html lang="en">
@include('part.header')
<body>
    @include('part.navbar')
    <div class="content">
        @yield('content')
    </div>
    @include('part.footer')
    @include('sweetalert::alert')
</body>
</html>