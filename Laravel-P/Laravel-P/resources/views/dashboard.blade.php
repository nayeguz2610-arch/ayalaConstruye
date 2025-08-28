<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start">

    @include('layouts.menu')

    <section class="relative w-full h-[600px] bg-cover bg-center" style="background-image: url('imagen/imagen1.jpg')">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        <div class="relative z-10 flex flex-col items-start justify-center h-full px-6 sm:px-12 lg:px-36 text-white space-y-6">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight max-w-2xl">
            Conoce las obras públicas<br>
            que transforman nuestro<br>
            municipio
            </h1>

            <a href="{{ route('obras.mapa') }}" class="bg-white text-cyan-800 font-semibold px-4 py-2 sm:px-6 sm:py-2 rounded hover:bg-gray-200 transition text-sm sm:text-base">
            Ver mapa
            </button>
        </div>
      
       <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 z-20 w-full max-w-7xl px-4 flex flex-wrap justify-center gap-4">
            <div class="bg-cyan-700 text-white px-10 py-10 rounded grow basis-[200px] text-center shadow-lg">
                <div class="text-3xl font-bold">{{ $terminadas }}</div>
                <div class="mt-1 text-base">Obras Terminadas</div>
            </div>
            <div class="bg-cyan-600 text-white px-10 py-10 rounded grow basis-[200px] text-center shadow-lg">
                <div class="text-3xl font-bold">{{ $enProceso }}</div>
                <div class="mt-1 text-base">En Proceso</div>
            </div>
            <div class="bg-yellow-100 text-black px-10 py-10 rounded grow basis-[200px] text-center shadow-lg">
                <div class="text-3xl font-bold">{{ $planeadas }}</div>
                <div class="mt-1 text-base">Planeadas</div>
            </div>
            <div class="bg-orange-700 text-white px-10 py-10 rounded grow basis-[200px] text-center shadow-lg">
                <div class="text-3xl font-bold">${{ number_format($inversionTotal, 2, '.', ',') }}</div>
                <div class="mt-1 text-base">Inversión Total</div>
            </div>
        </div>



    </section>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
    </form>
    <button
        type="submit"
        form="logout-form"
        class="fixed bottom-6 right-6 bg-red-600 text-white px-4 py-2 rounded shadow-lg hover:bg-red-700 transition"
    >
        Cerrar Sesión
    </button>


    <script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
        });
    });
    </script>



</body>
</html>
