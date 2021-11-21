<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.include.header')
<body>
    <div id="app">
       @include('layouts.include.nav')
       
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    @guest
                    
                    @else
                  @include('layouts.include.side_nav')
                  <div class="col-md-9">
                    @endguest
                    @yield('content')
                  </div>
                </div>
            </div>
          
        </main>
    </div>
</body>
</html>
