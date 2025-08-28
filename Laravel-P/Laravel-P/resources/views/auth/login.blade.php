<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white p-8 sm:p-10 rounded-2xl shadow-lg w-full max-w-md">
    <div class="mb-8 text-center">
      <h2 class="text-3xl font-bold text-gray-800">Iniciar sesión</h2>
      <p class="text-gray-500 text-sm mt-2">Accede a tu cuenta</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
      @csrf

      <div>
        <label for="email" class="block text-sm text-gray-600 mb-1">Correo</label>
        <input 
          type="email" 
          name="email" 
          id="email"
          required 
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
          value="{{ old('email') }}"
        >
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
      </div>

      <button 
        type="submit" 
        class="w-full bg-[#005F73] text-white py-2 rounded-lg hover:bg-[#004B5C] transition font-semibold text-sm"
      >
        Iniciar sesión
      </button>

      <div class="text-center mt-2">
        <a 
          href="{{ route('register') }}" 
          class="underline text-sm text-gray-600 hover:text-[#005F73] transition"
        >
          Registrarse
        </a>
      </div>
    </form>
  </div>

</body>
</html>
