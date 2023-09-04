
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-app-title/>
    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/bootstrap.js'])
</head>
<body>
    <nav>
        @include('components.navigation')
    </nav>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>
