<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="items-center gap-4">
          @if(session('process') != null)
            <div role="alert"
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 5000)"
                class="text-sm text-gray-600 dark:text-gray-400 alert alert-danger"
            >{{ __(session('process')) }}</div>
          @endif
        </div>
          <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
              <div class="l">
                  <section>
                      <header>
                          <button onclick="toggleModal('defaultModal')" class=" float-right block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Comenzar un nuevo proceso
                          </button>
                          <h2 class="text-3xl font-medium text-gray-900 dark:text-gray-100">
                              Lista de procesos
                          </h2>
                  
                          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                              Aqui podemos ver la lista de procesos iniciados con su estatus correspondiente.
                          </p>
                          
                      </header>
                  
                      <div>
                        <table class="table">
                          <thead class="text-white">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre del Proceso</th>
                              <th scope="col">Rubro</th>
                              <th scope="col">Comuna</th>
                              <th scope="col">Estatus</th>
                              <th scope="col">Acciones</th>
                            </tr>
                          </thead>
                          <tbody class="text-gray-300">
                            @forelse ($processes as $item)
                              <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->getRubro()->name }}</td>
                                <td>{{ $item->getComuna()->name }}</td>
                                <td>
                                  <x-status-badge status="{{ $item->status }}"></x-status-badge>
                                </td>
                                <td>
                                  <a href="{{ route('formalize', ['id'=>$item->id]) }}">Abrir proceso</a>
                                </td>
                              </tr>
                            @empty
                              <tr>
                                <td colspan="6" class="text-center">No tienes procesos creados</td>
                              </tr>
                            @endforelse
                          </tbody>
                        </table>
                        {{ $processes->links() }}
                      </div>
                  </section>
              </div>
          </div>
      </div>
    </div>
    <div id="defaultModal"class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <!--
        Background backdrop, show/hide based on modal state.
    
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    
      <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
          <!--
            Modal panel, show/hide based on modal state.
    
            Entering: "ease-out duration-300"
              From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              To: "opacity-100 translate-y-0 sm:scale-100"
            Leaving: "ease-in duration-200"
              From: "opacity-100 translate-y-0 sm:scale-100"
              To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          -->
          <div class="relative transform overflow-hidden rounded-lg bg-white dark:bg-gray-800 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <form action="{{ route('create') }}" method="post">
              <div class="bg-white dark:bg-gray-800 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                  </div>
                  <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                    <h2 class="text-base font-semibold leading-6 text-gray-50" id="modal-title">Responde las siguiente preguntas...</h2>
                    <div class="mt-2">
                        @csrf
                        @method('post')
                        <div>
                          <x-input-label for="question1" :value="__('1. Asignale un nombre a este proceso?')" />
                          <x-text-input id="question1" name="question1" type="text" class="mt-1 block w-full" required />
                          <x-input-error class="mt-2" :messages="$errors->get('question1')" />
                        </div>
                        <div class="mt-2">
                          <x-input-label for="question2" :value="__('2. Cuál es el rubro del emprendimiento?')" />
                          <select name="question2" id="question2" required name="question1" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                            @foreach ($rubros as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mt-2">
                          <x-input-label for="question3" required :value="__('3. Cuál es la comuna en la que se emplaza?')" />
                          <select name="question3" id="question3" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                            @foreach ($comunas as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 dark:bg-gray-800 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Crear proceso</button>
                <button type="button" onclick="toggleModal('defaultModal')" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function toggleModal(modalID){
          $(`#${modalID}`).toggle('fast');
          $('#question1').focus()
        }
      </script>
</x-app-layout>
