<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ecommerce</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="font-sans antialiased ">
    @if (Route::has('login'))
        <nav class=" px-6 py-2 shadow-xl  flex flex-1 justify-end">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                    Log in
                    <i class="fa-solid mx-2 fa-arrow-right"></i>
                </a>

            @endauth
        </nav>
    @endif
    <div class="min-h-screen flex flex-col justify-between">
        <div class="flex-grow flex items-center justify-center">
            <h1 class="text-3xl font-bold mt-16">Selamat Datang di Aplikasi E-commerce</h1>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffce62" fill-opacity="1" d="M0,32L14.1,58.7C28.2,85,56,139,85,170.7C112.9,203,141,213,169,218.7C197.6,224,226,224,254,192C282.4,160,311,96,339,101.3C367.1,107,395,181,424,186.7C451.8,192,480,128,508,101.3C536.5,75,565,85,593,106.7C621.2,128,649,160,678,165.3C705.9,171,734,149,762,128C790.6,107,819,85,847,112C875.3,139,904,213,932,224C960,235,988,181,1016,170.7C1044.7,160,1073,192,1101,176C1129.4,160,1158,96,1186,85.3C1214.1,75,1242,117,1271,122.7C1298.8,128,1327,96,1355,96C1383.5,96,1412,128,1426,144L1440,160L1440,320L1425.9,320C1411.8,320,1384,320,1355,320C1327.1,320,1299,320,1271,320C1242.4,320,1214,320,1186,320C1157.6,320,1129,320,1101,320C1072.9,320,1045,320,1016,320C988.2,320,960,320,932,320C903.5,320,875,320,847,320C818.8,320,791,320,762,320C734.1,320,706,320,678,320C649.4,320,621,320,593,320C564.7,320,536,320,508,320C480,320,452,320,424,320C395.3,320,367,320,339,320C310.6,320,282,320,254,320C225.9,320,198,320,169,320C141.2,320,113,320,85,320C56.5,320,28,320,14,320L0,320Z"></path>
        </svg>

    </div>
</body>

</html>
