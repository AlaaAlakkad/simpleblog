@include('partials._head')
<body>
    <div id="app">
        
        @include('layouts.navbar')
        <main class="py-4">
            <div class="container">
                @include('partials._messages')
                @yield('content')
                @include('partials._footer')
            </div>
        </main>
    </div>

    @yield('scripts')
</body>
</html>
