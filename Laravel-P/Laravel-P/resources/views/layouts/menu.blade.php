<nav class="bg-white shadow w-full fixed top-0 z-50">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-between items-center h-24">

      <div class="w-1/3"></div>

      <div class="w-1/3 flex justify-center">
        <img src="{{ asset('imagen/logo.png') }}" alt="Logo" class="h-12">
      </div>

      <div class="w-1/3 flex justify-end">
        <div class="flex space-x-8 text-gray-700 font-semibold text-sm items-center">

         
          <a href="{{ route('dashboard') }}" class="hover:text-cyan-600 transition">INICIO</a>

          
          <div class="relative group">
            <div class="flex flex-col">
              <div class="flex items-center cursor-pointer px-4 py-2 hover:text-cyan-600 transition">
                OBRAS
                <svg class="w-4 h-4 ml-1 transform transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
              <div class="absolute top-full left-0 hidden group-hover:flex flex-col bg-white shadow-lg rounded py-2 w-40 z-50">
                <a href="{{ route('obras.lista') }}" class="px-4 py-2 text-gray-700 hover:bg-cyan-100 hover:text-cyan-700 transition">Lista</a>
                <a href="{{ route('obras.create') }}" class="px-4 py-2 text-gray-700 hover:bg-cyan-100 hover:text-cyan-700 transition">Alta</a>
                <!--<a href="{{ route('obras.mapa') }}" class="px-4 py-2 text-gray-700 hover:bg-cyan-100 hover:text-cyan-700 transition">Mapa</a>-->
              </div>
            </div>
          </div>

          <div class="relative group">
            <div class="flex flex-col">
              <div class="flex items-center cursor-pointer px-4 py-2 hover:text-cyan-600 transition">
                USUARIOS
                <svg class="w-4 h-4 ml-1 transform transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
              <div class="absolute top-full left-0 hidden group-hover:flex flex-col bg-white shadow-lg rounded py-2 w-40 z-50">
                <a href="{{ route('obras.lista') }}" class="px-4 py-2 text-gray-700 hover:bg-cyan-100 hover:text-cyan-700 transition">Lista</a>
                <a href="{{ route('register') }}" class="px-4 py-2 text-gray-700 hover:bg-cyan-100 hover:text-cyan-700 transition">Alta</a>
                <!--<a href="{{ route('obras.mapa') }}" class="px-4 py-2 text-gray-700 hover:bg-cyan-100 hover:text-cyan-700 transition">Mapa</a>-->
              </div>
            </div>
          </div>

         
          <a href="{{ route('obras.participa') }}" class="hover:text-cyan-600 transition">PARTICIPA</a>
          
        </div>
      </div>
    </div>
  </div>
</nav>
