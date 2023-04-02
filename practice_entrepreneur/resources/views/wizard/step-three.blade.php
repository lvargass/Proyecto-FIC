<div class="grid grid-rows-1 grid-cols-2">
    <div class="form-control">
      <x-input-label for="rubro" :value="__('El Rubro Seleccionado Es: ')" />
        <select id="rubro" disabled class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option>{{ $process->getRubro()->name }}</option>
        </select>
    </div>
    <div class="form-control ml-2">
        <x-input-label for="comuna" required :value="__('La Comuna Seleccionada Es: ')" />
        <select id="comuna" disabled class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option>{{ $process->getComuna()->name }}</option>
        </select>
    </div>
</div>
<div class="grid grid-rows-1 grid-cols-2 mt-2">
    <div class="form-control">
        <x-input-label :value="__('Para completar el fomulario debes de subir los siguientes documentos: ')" />
        <ol class="list-group">
            @foreach ($listDocuments as $document)
                <li class="list-group-item list-group-item-action dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700">
                    <label for="file-upload-{{ $loop->index }}" class="cursor-pointer w-full h-full">{{ $loop->index + 1 }}. {{ $document }}</label>
                </li>
            @endforeach
        </ol>
    </div>
    <div class="form-control ml-2">
        <x-input-label :value="__('Selecciona los documentos requeridos: ')" />
        <ol class="list-group">
            @foreach ($listDocuments as $document)
                <li class="list-group-item dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700">
                    <label>{{ $loop->index + 1 }}.</label>
                    <input id="file-upload-{{ $loop->index }}" name="file-upload-{{ $loop->index }}" type="file" required >
                </li>
            @endforeach
        </ol>
    </div>
</div>
<div class="grid grid-rows-1 grid-cols-2 mt-4">
    <button data-prev class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button">
    Volver
    </button>
    @if ($process->status == 'PENDIENTE')
        <x-primary-button class="ml-2 float-right text-center">{{ __('Completar formulario') }}</x-primary-button>
    @else
        <x-primary-button type="button" class="ml-2 float-right text-center" disabled>{{ __('Formulario Completado') }}</x-primary-button>
    @endif
</div>