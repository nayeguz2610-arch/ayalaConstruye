<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registrar Obra</title>
    <script src="https://cdn.tailwindcss.com"></script>

    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start">

    @include('layouts.menu')
    <div class="h-[80px]"></div>

    <div class="w-full max-w-4xl px-4 mt-12 mb-12">
        <div class="bg-white rounded-xl shadow-lg p-8">

            <h2 class="text-3xl font-bold text-cyan-900 mb-8 text-center">Registrar obra</h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('obras.store') }}" class="space-y-6">
                @csrf

                <input type="text" name="nombre" placeholder="Nombre de la obra" value="{{ old('nombre') }}" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-cyan-600" />

                <select name="tipo_obra" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-cyan-600">
                    <option value="">Selecciona tipo de obra</option>
                    <option value="Civil" {{ old('tipo_obra') == 'Civil' ? 'selected' : '' }}>Civil</option>
                    <option value="Arquitectura" {{ old('tipo_obra') == 'Arquitectura' ? 'selected' : '' }}>Arquitectura</option>
                    <option value="Eléctrica" {{ old('tipo_obra') == 'Eléctrica' ? 'selected' : '' }}>Eléctrica</option>
                    <option value="Mecánica" {{ old('tipo_obra') == 'Mecánica' ? 'selected' : '' }}>Mecánica</option>
                    <option value="Sanitaria" {{ old('tipo_obra') == 'Sanitaria' ? 'selected' : '' }}>Sanitaria</option>
                </select>

                <textarea name="descripcion" rows="3" placeholder="Descripción"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-cyan-600">{{ old('descripcion') }}</textarea>

                <input type="text" name="calle" placeholder="Calle" value="{{ old('calle') }}" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-cyan-600" />

                <input type="text" name="localidad" placeholder="Localidad" value="{{ old('localidad') }}" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-cyan-600" />

                <input type="number" name="año" placeholder="Año" min="1900" max="{{ date('Y') }}" value="{{ old('año') }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-cyan-600" />

                <input type="number" step="0.01" name="presupuesto" placeholder="Presupuesto" value="{{ old('presupuesto') }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-cyan-600" />

                <input type="text" name="contratista" placeholder="Contratista" value="{{ old('contratista') }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-cyan-600" />

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="fecha_inicio" class="block text-black-100 font-semibold mb-1">Fecha de inicio</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-cyan-600" />
                    </div>
                    <div>
                        <label for="fecha_fin" class="block text-black-100 font-semibold mb-1">Fecha de fin</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-cyan-600" />
                    </div>
                </div>

                
                <input type="hidden" name="latitud" id="latitud" value="{{ old('latitud') }}">
                <input type="hidden" name="longitud" id="longitud" value="{{ old('longitud') }}">

                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-2">Selecciona la ubicación en el mapa</h3>
                    <div id="map" class="w-full h-[400px] rounded shadow"></div>
                </div>

                <button type="submit"
                    class="w-full bg-cyan-800 hover:bg-cyan-700 text-white py-2 rounded font-semibold transition">
                    Registrar obra
                </button>
            </form>

            
            

        </div>
    </div>

    
    <script>
        const map = L.map('map').setView([18.9215, -99.2345], 13); // Cuernavaca

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        let marker;

        map.on('click', function (e) {
            const { lat, lng } = e.latlng;
            document.getElementById('latitud').value = lat;
            document.getElementById('longitud').value = lng;

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }
        });
    </script>

</body>
</html>
