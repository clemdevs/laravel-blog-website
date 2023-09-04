<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-app-title/>
    @vite(['resources/scss/app.scss', 'resources/js/app.js', 'resources/js/bootstrap.js'])
</head>
<body>
    <main>
        <div class="container">
            @yield('admin-content')
        </div>
    </main>
</body>
</html>
