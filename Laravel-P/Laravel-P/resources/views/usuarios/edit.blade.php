<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Editar usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">

    @include('layouts.menu')
    <div class="h-[80px]"></div>

    <div class="max-w-3xl mx-auto px-6 py-10">
        <div class="bg-white rounded-xl shadow-lg p-10 space-y-10">

            <!-- Encabezado -->
            <div class="text-center">
                <h2 class="text-3xl font-bold text-black">✏️ Editar Usuario</h2>
                <p class="text-sm text-gray-600 mt-2">Modifica los datos del usuario seleccionado</p>
                <div class="w-24 h-[3px] bg-yellow-500 mt-4 mx-auto rounded-full"></div>
            </div>

            <!-- Formulario -->
            <form method="POST" action="{{ route('admin.users.update', $usuario->id_usuario) }}" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-black text-sm">
                    <div>
                        <label for="nombre" class="block font-medium mb-2">Nombre completo</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuario->nombre) }}"
                               required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-600 text-sm">
                        @error('nombre')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block font-medium mb-2">Correo electrónico</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}"
                               required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-600 text-sm">
                        @error('email')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="rol" class="block font-medium mb-2">Rol asignado</label>
                        <select name="rol" id="rol" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-600 text-sm">
                            @foreach($roles as $rol)
                                <option value="{{ $rol->name }}"
                                    {{ $usuario->hasRole($rol->name) ? 'selected' : '' }}>
                                    {{ ucfirst($rol->name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('rol')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-between mt-10">
                    <a href="{{ route('admin.users.index') }}"
                       class="bg-gray-300 text-black px-5 py-2 rounded-lg hover:bg-gray-400 transition text-sm font-semibold flex items-center gap-2">
                        <i class="fa-solid fa-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit"
                            class="bg-cyan-700 text-white px-5 py-2 rounded-lg hover:bg-cyan-800 transition text-sm font-semibold flex items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar cambios
                    </button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
