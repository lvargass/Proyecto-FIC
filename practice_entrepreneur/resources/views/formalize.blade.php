<x-app-layout>
    <style>
        .zangdar__wizard .zangdar__step {
			display: none;
		}
		.zangdar__wizard .zangdar__step.zangdar__step__active {
			display: block;
		}
		.form-completed {
			display: none;
		}
		.step li.step-item:first-child::before {
			background: transparent !important;
		}

		.zangdar-form-2 {
			position: relative;
		}

		.zangdar-form-2 .zangdar__step {
			position: absolute;
			visibility: hidden;
		}
		.zangdar-form-2 .zangdar__step.zangdar__step__active {
			visibility: visible;
		}
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Formalizate como empresa') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="text-center mt-4 mb-3">
              <h1 class="h3 text-gray-800 dark:text-red-200">Formulario de Formalizacion</h1>
              <x-status-badge status="{{ $process->status }}"></x-status-badge>
              @if ($process->status == 'PROCESANDO')
                  
                <p class="lead text-gray-800 dark:text-gray-400">
                    Actualmente estamos procesando esta solicitud, por favor espere y sea paciente.
                </p>
              @endif
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="l">
                    <section>
                        <ul id="steps-native" class="nav nav-pills justify-content-center text-center"></ul>
                        
                        <form id="wizard" action="{{ route('formalize.completeProcess', [ 'id'  =>  $process->id ]) }}" method="post" class="my-2 py-2">
                            @csrf
                            @method('post')
                            <section data-step="Paso 1. Contruir una empresa">
                                @include('wizard.step-one')
                            </section>
                            
                            <section data-step="Paso 2. Formalizar ante el SII">
                                @include('wizard.step-two')
                            </section>
                            
                            <section data-step="Paso 3. Presentar documentación en Municipio">
                                @include('wizard.step-three', [
                                    'process' => $process,
                                    'listDocuments' => $listDocuments,
                                    'comunas'   =>  $comunas
                                ])
                            </section>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/zangdar.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function buildStepsBreadcrumb (wizard, element, steps) {
            const $steps = document.getElementById(element)
            $steps.innerHTML = ''
            for (let label in steps) {
                if (steps.hasOwnProperty(label)) {
                const $li = document.createElement('li')
                const $a = document.createElement('a')
                $li.classList.add('nav-item')
                $a.classList.add('nav-link')
                if (steps[label].active) {
                    $a.classList.add('active')
                }
                $a.setAttribute('href', '#')
                $a.innerText = label
                $a.addEventListener('click', e => {
                    e.preventDefault()
                    wizard.revealStep(label)
                })
                $li.appendChild($a)
                $steps.appendChild($li)
                }
            }
            }

            function onStepChange(wizard, selector) {
                const steps = wizard.getBreadcrumb()
                buildStepsBreadcrumb(wizard, selector, steps)
            }

            const wizard = new window.Zangdar('#wizard', {
            onStepChange: () => {
                onStepChange(wizard, 'steps-native')
            },
            })

            onStepChange(wizard, 'steps-native')
    </script>
</x-app-layout>
