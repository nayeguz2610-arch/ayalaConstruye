<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mapa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start">

    @include('layouts.menu')
    <div class="h-[80px]"></div>

        <div class="w-full flex flex-col items-center justify-center mt-12 mb-6">
            <h2 class="text-2xl font-bold text-black-700 ">MAPA DE OBRAS</h2>
            <div class="w-60 h-1 bg-yellow-600 mt-1 rounded-full"></div>
        </div>
    
        <div class="flex gap-6 w-full max-w-7xl mb-10 px-4">
            
            <div class="bg-white shadow-md rounded p-8 w-full max-w-lg text-gray-800">
                <h1 class="text-3xl font-bold mb-6 text-left">Filtros</h1>

            <div>
                <div> 
                <select id="localidad" class="w-full border border-gray-300 rounded px-3 py-2 mb-6">
                    <option value="" disabled selected>Localidad</option>
                    <option value="Centro">Centro</option>
                    <option value="San Juan">San Juan</option>
                    <option value="Ayala">Ayala</option>
                </select>
                </div>
            </div>

        
            <div> 
                <select id="localidad" class="w-full border border-gray-300 rounded px-3 py-2 mb-6">
                    <option value="" disabled selected>Tipo de obra</option>
                    <option value="Centro">Centro</option>
                    <option value="San Juan">San Juan</option>
                    <option value="Ayala">Ayala</option>
                </select>
            </div>


            <div>
                <select id="localidad" class="w-full border border-gray-300 rounded px-3 py-2 mb-6">
                    <option value="" disabled selected>Año</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                </select>
            </div>

            <div>
                
                <select id="estatus" class="w-full border border-gray-300 rounded px-3 py-2 mb-10">
                    <option value="" disabled selected>Estatus</option>
                    <option value="Terminado">Terminado</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Planeado">Planeado</option>
                </select>
            </div>

                    
                    <div class="flex justify-center mt-4">
                    <button
                        type="submit"
                        form="logout-form"
                        class="px-8 py-2 text-sm bg-cyan-800 text-white rounded shadow hover:bg-cyan-700 transition"
                    >
                        Aplicar filtros
                    </button>
                    </div>

                </div>
                <div id="mapa" class="w-full h-[500px]">
                <div id="map" class="w-full h-full rounded-lg border border-gray-400"></div>
            </div>
            </div>
            
        </div>
        
    <script>
        function initMap() {
            const center = { lat: 18.922272, lng: -99.234085 };
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: center
            });
        }
    </script>

    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCISwR7xUgaV6FUFfefDZjdxq4CzJ4NeYM&callback=initMap">
    </script>

</body>
</html>

