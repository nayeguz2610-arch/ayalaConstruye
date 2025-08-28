<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Detalle de usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">

    @include('layouts.menu')
    <div class="h-[80px]"></div>

    <div class="max-w-4xl mx-auto px-6 py-10">
        <div class="bg-white rounded-xl shadow-lg p-10 space-y-10">

            
            <div class="text-center">
                <h2 class="text-3xl font-bold text-black">👤 Detalle del Usuario</h2>
                <p class="text-sm text-gray-600 mt-2">Información general del perfil</p>
                <div class="w-80 h-[3px] bg-yellow-500 mt-4 mx-auto rounded-full"></div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10 text-sm text-black">
                <div>
                    <span class="block font-medium mb-2">Nombre</span>
                    <p class="text-base font-semibold">{{ $usuario->nombre }}</p>
                </div>

                <div>
                    <span class="block font-medium mb-2">Correo electrónico</span>
                    <p class="text-base font-semibold">{{ $usuario->email }}</p>
                </div>

                <div>
                    <span class="block font-medium mb-2">Rol asignado</span>
                    <p class="text-base font-semibold">{{ ucfirst($usuario->getRoleNames()->first() ?? 'Sin rol') }}</p>
                </div>

                <div>
                    <span class="block font-medium mb-2">Fecha de creación</span>
                    <p class="text-base font-semibold">
                        {{ \Carbon\Carbon::parse($usuario->fecha_creacion)->format('d/m/Y') }}
                    </p>
                </div>
            </div>

            
            <div class="flex justify-end">
                <a href="{{ route('admin.users.index') }}"
                   class="bg-cyan-700 text-white px-5 py-2 rounded-lg hover:bg-cyan-800 transition text-sm font-semibold flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Volver a la lista
                </a>
            </div>

        </div>
    </div>

</body>
</html>
