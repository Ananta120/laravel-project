<!DOCTYPE html>
<html>
<head>
    <title>Bantuan Anak Panti Asuhan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<nav class="bg-blue-600 p-4 shadow">
    <h1 class="text-white text-2xl font-bold text-center">
        Bantuan Anak Panti Asuhan
    </h1>
</nav>

<div class="container mx-auto p-6">
    @yield('content')
</div>

</body>
</html>