<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Participa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start">

    @include('layouts.menu')
    <div class="h-[80px]"></div>

    <div id="participa" class="w-full max-w-4xl px-4 mx-auto mt-12 mb-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-black-700 text-center">PARTICIPA</h2>
            <div class="w-60 h-1 bg-yellow-600 mt-1 rounded-full mx-auto"></div>
            <h3 class="text-lg font-semibold text-gray-800 text-center mb-2">
                ¿Hay baches, falta alumbrado, drenaje, o un parque en mal estado?
            </h3>
            <p class="text-center text-gray-600 mb-6">
                En Ayala tu voz cuenta. Envía tus sugerencias y juntos mejoramos nuestro municipio.
            </p>

            <form action="{{ route('obras.lista') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" name="nombre_ciudadano" placeholder="Nombre completo"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600" required />

                    <input type="text" name="localidad" placeholder="Localidad"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600" required />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="email" name="correo" placeholder="Correo electrónico (opcional)"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600" />
                    
                    <select name="tipo_obra_sugerida"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600" required>
                        <option disabled selected>Selecciona el tipo de obra</option>
                        <option value="Alumbrado público">Alumbrado público</option>
                        <option value="Drenaje">Drenaje</option>
                        <option value="Parques">Parques</option>
                        <option value="Calles o baches">Calles o baches</option>
                        <option value="Otra">Otra</option>
                    </select>
                </div>

                <div class="mb-4">
                    <input type="text" name="descripcion" placeholder="Sugerencia breve"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600" required />
                </div>

                <div class="mb-6">
                    <textarea name="mensaje" placeholder="Escribe tu mensaje"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600 h-24 resize-none"></textarea>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-cyan-800 text-white px-6 py-2 rounded-md hover:bg-cyan-700 transition">
                        ENVIAR
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
