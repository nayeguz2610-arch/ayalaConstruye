<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Registro de Usuario</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white p-8 sm:p-10 rounded-2xl shadow-lg w-full max-w-md">
    <div class="mb-8 text-center">
      <h2 class="text-3xl font-bold text-gray-800">Crear cuenta</h2>
    </div>

    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-2 rounded mb-4 text-sm">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.users.store') }}">
      @csrf

      <div>
        <label for="nombre" class="block text-sm text-gray-600 mb-1">Nombre</label>
        <input 
          type="text" 
          name="nombre" 
          id="nombre"
          required 
          autofocus
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
          value="{{ old('nombre') }}"
        >
        @error('nombre')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="email" class="block text-sm text-gray-600 mb-1">Correo electrónico</label>
        <input 
          type="email" 
          name="email" 
          id="email"
          required 
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
          value="{{ old('email') }}"
        >
        @error('email')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password" class="block text-sm text-gray-600 mb-1">Contraseña</label>
        <input 
          type="password" 
          name="password" 
          id="password"
          required 
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
        >
        @error('password')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password_confirmation" class="block text-sm text-gray-600 mb-1">Confirmar contraseña</label>
        <input 
          type="password" 
          name="password_confirmation" 
          id="password_confirmation"
          required 
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
        >
      </div>

      <div>
        <label for="rol" class="block text-sm text-gray-600 mb-1">Rol a asignar</label>
        <select 
          name="rol" 
          id="rol" 
          required 
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
        >
          @foreach($roles as $rol)
            <option value="{{ $rol->name }}">{{ ucfirst($rol->name) }} </option>
          @endforeach
        </select>
        @error('rol')
          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button 
        type="submit" 
        class="w-full bg-[#005F73] text-white py-2 rounded-lg hover:bg-[#004B5C] transition font-semibold text-sm mt-4"
      >
        Registrar
      </button>
    </form>
  </div>

</body>
</html>
