<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Detalles de la obra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start">
    @include('layouts.menu')
    <div class="h-[80px]"></div>

    <div class="max-w-4xl w-full mx-auto bg-white p-8 rounded-lg shadow-lg mt-10">
        <div class="flex items-center gap-3 mb-6">
            <i class="fa-solid fa-eye text-amber-500 text-2xl"></i>
            <h2 class="text-2xl font-bold text-gray-800">Detalles de la Obra</h2>
        </div>

        <div class="grid grid-cols-2 gap-x-6 gap-y-4 text-sm text-gray-700">
            <div><span class="block font-medium text-gray-600">Nombre:</span> {{ $obra->nombre }}</div>
            <div><span class="block font-medium text-gray-600">Tipo de obra:</span> {{ $obra->tipo_obra }}</div>
            <div class="col-span-2"><span class="block font-medium text-gray-600">Descripción:</span> {{ $obra->descripcion }}</div>
            <div><span class="block font-medium text-gray-600">Localidad:</span> {{ $obra->localidad }}</div>
            <div><span class="block font-medium text-gray-600">Presupuesto:</span> ${{ number_format($obra->presupuesto, 2) }}</div>
            <div><span class="block font-medium text-gray-600">Latitud:</span> {{ $obra->latitud }}</div>
            <div><span class="block font-medium text-gray-600">Longitud:</span> {{ $obra->longitud }}</div>
            <div><span class="block font-medium text-gray-600">Año:</span> {{ $obra->año }}</div>
            <div><span class="block font-medium text-gray-600">Contratista:</span> {{ $obra->contratista }}</div>
            <div><span class="block font-medium text-gray-600">Fecha inicio:</span> 
                {{ $obra->fecha_inicio ? \Carbon\Carbon::parse($obra->fecha_inicio)->format('d/m/Y') : 'Sin fecha' }}
            </div>
            <div><span class="block font-medium text-gray-600">Fecha fin:</span> 
                {{ $obra->fecha_fin ? \Carbon\Carbon::parse($obra->fecha_fin)->format('d/m/Y') : 'Sin fecha' }}
            </div>
            <div><span class="block font-medium text-gray-600">Estatus:</span> {{ $obra->estatus }}</div>
            
            <div><span class="block font-medium text-gray-600">Usuario creador:</span> {{ $obra->creador->nombre ?? 'Desconocido' }}</div>
            <div><span class="block font-medium text-gray-600">Fecha de registro:</span> 
                {{ \Carbon\Carbon::parse($obra->fecha_registro)->format('d/m/Y H:i') }}
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <a href="{{ route('obras.index') }}"
               class="bg-gray-300 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-400 transition font-semibold">
                Regresar
            </a>
        </div>
    </div>
</body>
</html>
