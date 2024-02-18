<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @if(!Route::is('index'))
        @include('layouts.header')
    @endif
    <div class="container">
        @yield('content')
    </div>
    @include('layouts.scripts')
</body>
</html>
