<header>
    <h1 class="text-3xl mb-2 font-medium text-gray-900 dark:text-gray-100">
        {{ __('Nombre de la empresa') }}
    </h1>
</header>

<div class="grid grid-rows-1 grid-cols-2">
    <div class="form-control">
        <x-input-label for="companyName" :value="__('Nombre de la E.I.R.L. (EJ : Agricola '. Auth::user()->name .' E.I.R.L.):')" />
        <x-text-input id="companyName" name="companyName" type="text" class="mt-1 block w-full" autofocus required value="{{ $process->company_name }}" /> 
        <x-input-error class="mt-2" :messages="$errors->get('companyName')" />
    </div>
    <div class="form-control ml-2">
        <x-input-label for="companyNameFantasy" :value="__('Nombre de fantasia: (opcional)')" />
        <x-text-input id="companyNameFantasy" name="companyNameFantasy" type="text" class="mt-1 block w-full" value="{{ $process->company_name_fantasy }}" />
        <x-input-error class="mt-2" :messages="$errors->get('companyNameFantasy')" />
    </div>
</div>
<hr class="border-gray-100 mt-5 mb-5">
<header>
    <h1 class="text-3xl mb-2 font-medium text-gray-900 dark:text-gray-100">
        {{ __('Domicilio de la Empresa') }}
    </h1>
</header>

<div class="grid grid-rows-1 grid-cols-2">
    <div class="first-column">
        <div class="form-control">
            <x-input-label for="street" :value="__('Calle:')" />
            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" required value="{{ $process->street }}" /> 
            <x-input-error class="mt-2" :messages="$errors->get('street')" />
        </div>
        <div class="form-control mt-2">
            <x-input-label for="village" :value="__('Villa/Poblacion:')" />
            <x-text-input id="village" name="village" type="text" class="mt-1 block w-full" value="{{ $process->village }}" />
            <x-input-error class="mt-2" :messages="$errors->get('village')" />
        </div>
        <div class="form-control mt-2">
            <x-input-label for="comuna" :value="__('Comuna:')" />
            <select name="comuna" id="comuna" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                @foreach ($comunas as $item)
                    <option value="{{ $item->id }}" {{ $process->comuna == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
              </select>
            <x-input-error class="mt-2" :messages="$errors->get('comuna')" />
        </div>
    </div>
    <div class="second-column ml-2">
        <div class="grid grid-rows-1 grid-cols-3">
            <div class="form-control">
                <x-input-label for="number" :value="__('Numero:')" />
                <x-text-input id="number" name="number" type="text" class="mt-1 block w-full" required value="{{ $process->number }}"/> 
                <x-input-error class="mt-2" :messages="$errors->get('number')" />
            </div>
            <div class="form-control">
                <x-input-label for="block" :value="__('Bloque:')" />
                <x-text-input id="block" name="block" type="text" class="mt-1 block w-full" required value="{{ $process->block }}"/> 
                <x-input-error class="mt-2" :messages="$errors->get('block')" />
            </div>
            <div class="form-control">
                <x-input-label for="department" :value="__('Depto:')" />
                <x-text-input id="department" name="department" type="text" class="mt-1 block w-full" required value="{{ $process->department }}"/> 
                <x-input-error class="mt-2" :messages="$errors->get('department')" />
            </div>
        </div>
        <div class="form-control mt-3">
            <x-input-label for="region" :value="__('Region:')" />
            <select name="region" id="region" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                <option value="">Seleccione una opcion</option>
              </select>
            <x-input-error class="mt-2" :messages="$errors->get('region')" />
        </div>
    </div>
</div>

{{-- Seccion del objetivo de la empresa --}}
<hr class="border-gray-100 mt-5 mb-5">
<header>
    <h1 class="text-3xl mb-2 font-medium text-gray-900 dark:text-gray-100">
        {{ __('Objeto de la Empresa') }}
    </h1>
</header>
<div class="grid grid-rows-1 grid-cols-1">
    <x-input-label for="object" :value="__('Objeto o Giro Unico:')" />
    <textarea name="object" id="object" rows="5" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" required>{{ $process->company_object }}</textarea> 
    <x-input-error class="mt-2" :messages="$errors->get('object')" />
</div>

{{-- Capital dedicado a la empresa --}}

<hr class="border-gray-100 mt-5 mb-5">
<header>
    <h1 class="text-3xl mb-2 font-medium text-gray-900 dark:text-gray-100">
        {{ __('Capital de la Empresa') }}
    </h1>
</header>
<div class="grid grid-rows-1 grid-cols-2">
    <div class="form-control">
        <x-input-label for="totalAmount" :value="__('Monto total del capital: ')" />
        <x-text-input id="totalAmount" name="totalAmount" type="number" class="mt-1 block w-full" value="{{ $process->company_capital }}"/> 
        <x-input-error class="mt-2" :messages="$errors->get('totalAmount')" />
    </div>
    <div class="form-control ml-3">
        <x-input-label for="typeCurrency" :value="__('Tipo de moneda')" />
        <select name="typeCurrency" id="typeCurrency" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option value="PESOS" {{ $process->type_currency == 'PESOS' ? 'selected' : '' }}>$ PESOS</option>
            <option value="DOLARES" {{ $process->type_currency == 'DOLARES' ? 'selected' : '' }}>$ DOLARES</option>
          </select>
        <x-input-error class="mt-2" :messages="$errors->get('typeCurrency')" />
    </div>
</div>
{{-- Duracion de la empresa y Administracion de la empresa --}}
<hr class="border-gray-100 mt-5 mb-5">
<div class="grid grid-rows-1 grid-cols-2">
    <div class="first-column">

        <header>
            <h1 class="text-3xl mb-2 font-medium text-gray-900 dark:text-gray-100">
                {{ __('Duracion de la empresa') }}
            </h1>
        </header>
        <div class="grid grid-rows-1 grid-cols-1">
            <fieldset>
                <div class="mt-6 space-y-6">
                  <div class="flex items-center gap-x-3">
                    <input id="push-everything" name="durationCompany" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-600" checked value="Indefinida">
                    <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Indefinida</label>
                  </div>
                  <div class="flex items-center gap-x-3">
                    <input id="push-email" name="durationCompany" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-600" value="Fecha cierta y sin renovacion">
                    <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Fecha cierta y sin renovacion</label>
                  </div>
                  <div class="flex items-center gap-x-3">
                    <input id="push-nothing" name="durationCompany" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-600" value="Otra">
                    <label for="push-nothing" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">Otra</label>
                  </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="second-column">
        <header>
            <h1 class="text-3xl mb-2 font-medium text-gray-900 dark:text-gray-100">
                {{ __('Administracion de la Empresa') }}
            </h1>
        </header>
        <div class="grid grid-rows-1 grid-cols-1">
            <fieldset>
                <div class="mt-6 space-y-6">
                    <div class="flex items-center gap-x-3">
                        <input id="administrationFor" name="administrationFor" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-600" checked>
                        <label for="administrationFor" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-100">El constituyente</label>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
{{-- Facultades de la Administracion --}}
<hr class="border-gray-100 mt-5 mb-5">
<header>
    <h1 class="text-3xl mb-2 font-medium text-gray-900 dark:text-gray-100">
        {{ __('Facultades de la Administracion') }}
    </h1>
</header>
<div class="grid grid-rows-1 grid-cols-1">
    <x-input-label for="administrationPowers" :value="__('Facultades de la Administracion:')" />
    <textarea name="administrationPowers" id="administrationPowers" rows="5" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" required>{{ $process->administration_powers }}</textarea> 
    <x-input-error class="mt-2" :messages="$errors->get('administrationPowers')" />
</div>
<div class="grid grid-rows-1 grid-cols-3 mt-4">
    <div></div>
    <button data-next class="block float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
      Siguiente
    </button>
</div>