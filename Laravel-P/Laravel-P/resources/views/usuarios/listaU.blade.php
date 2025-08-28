<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Lista de usuarios</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start">

    @include('layouts.menu')
    <div class="h-[80px]"></div>

    <div id="lista" class="w-full max-w-7xl px-4 mt-12 mb-6">
        <div class="bg-white rounded shadow p-6">

            <div class="w-full flex flex-col items-center justify-center mb-6">
                <h2 class="text-2xl font-bold text-black-800">LISTA DE USUARIOS</h2>
                <div class="w-60 h-[2px] bg-yellow-600 mt-2 rounded-full"></div>
            </div>

            <div class="w-full flex flex-col items-start justify-center mb-6">
                <div id="filtros" class="flex flex-wrap gap-6 border-b border-cyan-800 pb-1 w-full">
                    <button onclick="setActive(this)" class="filtro-btn bg-cyan-800 text-white font-semibold text-sm px-1 py-1">Todos</button>
                    <button onclick="setActive(this)" class="filtro-btn bg-white text-cyan-800 font-semibold text-sm px-1 py-1">Admin</button>
                    <button onclick="setActive(this)" class="filtro-btn bg-white text-cyan-800 font-semibold text-sm px-1 py-1">Editor</button>
                    <button onclick="setActive(this)" class="filtro-btn bg-white text-cyan-800 font-semibold text-sm px-1 py-1">Usuario</button>
                </div>
            </div>

            <div class="overflow-x-auto bg-white rounded shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">#</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Correo</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Rol</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Creado</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="userTable" class="divide-y divide-gray-200">
                        @forelse ($usuarios as $usuario)
                        <tr class="hover:bg-gray-50 transition" data-rol="{{ $usuario->getRoleNames()->first() }}">
                            <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $usuario->id_usuario }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $usuario->nombre }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $usuario->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $usuario->getRoleNames()->first() ?? 'Sin rol' }}</td>
                             
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ \Carbon\Carbon::parse($usuario->fecha_creacion)->format('d/m/Y') }}
                            </td>

                            <td class="px-6 py-4 text-sm">
                                <div class="flex gap-3">
                                    <a href="{{ route('admin.users.show', $usuario->id_usuario) }}"
                                       class="w-9 h-9 flex items-center justify-center rounded-full bg-sky-500 text-white hover:bg-sky-600 transition"
                                       title="Ver">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $usuario->id_usuario) }}"
                                       class="w-9 h-9 flex items-center justify-center rounded-full bg-amber-400 text-white hover:bg-amber-500 transition"
                                       title="Editar">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.users.show', $usuario->id_usuario) }}" method="POST"
                                          onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-9 h-9 flex items-center justify-center rounded-full bg-red-600 text-white hover:bg-red-700 transition"
                                                title="Eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">No hay usuarios registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div id="noResults" class="text-center py-6 text-gray-500 text-sm hidden">
                    No hay usuarios con ese rol
                </div>
            </div>
        </div>
    </div>

    <script>
        function setActive(button) {
            const buttons = document.querySelectorAll('.filtro-btn');
            buttons.forEach(btn => {
                btn.classList.remove('bg-cyan-800', 'text-white');
                btn.classList.add('bg-white', 'text-cyan-800');
            });
            button.classList.add('bg-cyan-800', 'text-white');
            button.classList.remove('bg-white', 'text-cyan-800');

            const filtro = button.textContent.trim();
            const filas = document.querySelectorAll('#userTable tr');
            let visibles = 0;

            filas.forEach(fila => {
                const rol = fila.getAttribute('data-rol');
                if (filtro === 'Todos' || rol === filtro) {
                    fila.style.display = '';
                    visibles++;
                } else {
                    fila.style.display = 'none';
                }
            });

            document.getElementById('noResults').style.display = visibles === 0 ? 'block' : 'none';
        }
    </script>

</body>
</html>
