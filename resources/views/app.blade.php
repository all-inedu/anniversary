<!DOCTYPE html>
<html lang="en">
@include('layout.header')

<body>
    <div class="loading text-center">
        <h4 id="percentage">0%</h4>
        <div id="loading-bar">
            <div id="progress"></div>
        </div>
    </div>

    <div class="loading-bg"></div>

    @yield('body')

    @include('layout.footer')
</body>

</html>
