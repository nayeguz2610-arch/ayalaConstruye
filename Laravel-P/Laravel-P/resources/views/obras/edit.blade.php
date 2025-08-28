<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Editar obra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start">
@include('layouts.menu')
    <div class="h-[80px]"></div>
<div class="max-w-4xl w-full mx-auto bg-white p-8 rounded-lg shadow-lg mt-10">
    <div class="flex items-center gap-3 mb-6">
        <i class="fa-solid fa-pen-to-square text-amber-500 text-2xl"></i>
        <h2 class="text-2xl font-bold text-gray-800">Editar Obra</h2>
    </div>

    <form action="{{ route('obras.update', $obra->id_obra) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-x-6 gap-y-4">
            @foreach([
                ['label' => 'Nombre', 'name' => 'nombre', 'type' => 'text'],
                ['label' => 'Tipo de obra', 'name' => 'tipo_obra', 'type' => 'text'],
                ['label' => 'Localidad', 'name' => 'localidad', 'type' => 'text'],
                ['label' => 'Presupuesto', 'name' => 'presupuesto', 'type' => 'number', 'step' => '0.01'],
                ['label' => 'Latitud', 'name' => 'latitud', 'type' => 'text'],
                ['label' => 'Longitud', 'name' => 'longitud', 'type' => 'text'],
                ['label' => 'Año', 'name' => 'año', 'type' => 'number'],
                ['label' => 'Contratista', 'name' => 'contratista', 'type' => 'text'],
                ['label' => 'Fecha inicio', 'name' => 'fecha_inicio', 'type' => 'date'],
                ['label' => 'Fecha fin', 'name' => 'fecha_fin', 'type' => 'date'],
            ] as $field)
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ $field['label'] }}</label>
                    <input type="{{ $field['type'] }}"
                           name="{{ $field['name'] }}"
                           value="{{ old($field['name'], $obra->{$field['name']}) }}"
                           @if(isset($field['step'])) step="{{ $field['step'] }}" @endif
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500">
                </div>
            @endforeach

            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="descripcion" rows="3"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500">{{ old('descripcion', $obra->descripcion) }}</textarea>
            </div>

            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700">Estatus</label>
                <select name="estatus"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500">
                    <option value="Planeada" {{ $obra->estatus == 'Planeada' ? 'selected' : '' }}>Planeada</option>
                    <option value="En proceso" {{ $obra->estatus == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="Finalizada" {{ $obra->estatus == 'Finalizada' ? 'selected' : '' }}>Finalizada</option>
                </select>
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-4">
            <button type="submit"
                    class="bg-amber-500 text-white px-6 py-2 rounded-md hover:bg-amber-600 transition font-semibold">
                Guardar
            </button>

            <a href="{{ route('obras.index') }}"
            class="bg-gray-300 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-400 transition font-semibold">
                Cancelar
            </a>

            
        </div>

    </form>
</div>


</body>
</html>
