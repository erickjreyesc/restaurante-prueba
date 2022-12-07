<div>
    <livewire:admin.misc.breadcumbs :title="$formtitle" />
    <div class="container-fluid">
        <div class="row">
            <div class="py-2 col-12 align-content-middle">
                <h1 class="title-index d-inline">{{$formtitle}}</h1>
                @can('actas.listar')
                <a class="btn btn-gray float-end" href="{{ route('actas.listar') }}">
                    <i class="me-1 fas fa-angle-left"></i>Volver
                </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="container">
        <div class="mb-3 row">
            <div class="py-3 col-12 border-bottom">
                <div class="d-inline float-start">
                    <h1 class="h6 fw-bold">Datos del Acta</h1>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-xs-12 col-md-4">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Tipo reunión o documento.'
                            texto='Seleccione un tipo de reunión o documento para describir el registro. <b class="text-danger fw-bold">Requerido</b>.'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <select wire:model.defer='tipo_reunion_id' class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ($tipo_reuniones as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                        @endforeach
                    </select>
                    @error('tipo_reunion_id')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="col-auto">
                    <div class="mb-2">
                        <div wire:ignore>
                            <livewire:admin.misc.label-help titulo='Fecha de la reunión'
                                texto='Asigne la fecha que llevó a cabo la reunión. <b class="text-danger fw-bold">Requerido</b>.'
                                :wire:key="random_int(100000, 999999)" />
                        </div>
                        <input type="text" class="form-control flatpickrlog" id="fecha_reunion"
                            wire:model.defer.defer='fecha_reunion' min="{{ \Carbon\Carbon::now() }}">
                        @error('fecha_reunion')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Lugar convocado'
                            texto='Indique el lugar que donde se llevó a cabo la convocatoria. <b class="text-danger fw-bold">Requerido</b>, Maximo 200 caracteres'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <input type="text" name="lugar_reunion" class="form-control" wire:model.defer="lugar_reunion"
                        placeholder="Ingrese el lugar que fue convocada la reunión" maxlength="200">
                    @error('lugar_reunion')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Departamento convocador'
                            texto='Seleccione la dependencia que convocó o se encuentra asignada de la reunión. <b class="text-danger fw-bold">Requerido</b>'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <div>
                        <select wire:model.defer='dependencia' class="form-control select2">
                            <option value="">Seleccione</option>
                            @foreach ($dependencias as $dep)
                            <option value="{{$dep->id}}">{{$dep->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('dependencia')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Nombre del convocador'
                            texto='Ingrese el nombre de la persona que convoco a la reunión. <b class="text-danger fw-bold">Requerido</b>, Máximo 100 caracteres.'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <input type="text" name="nombre_convocador" class="form-control"
                        wire:model.defer="nombre_convocador"
                        placeholder="Nombre de la persona que realizó la convocatoria" maxlength="100">
                    @error('nombre_convocador')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-xs-12 col-md-4">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Cargo del convocador'
                            texto='Ingrese el cargo del convocador. <b class="text-danger fw-bold">Requerido</b>, Máximo 100 caracteres'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <input type="text" name="cargo_convocador" class="form-control" wire:model.defer="cargo_convocador"
                        placeholder="Ingrese el cargo que realizó la convocatoria" maxlength="100">
                    @error('cargo_convocador')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-xs-12 col-md-6">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Objetivo'
                            texto='Describa brevemente el objetivo de la convocatoria. <b class="text-danger fw-bold">Requerido</b>, Min. 2 caracteres.'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <div wire:ignore>
                        <textarea class="form-control editor ckobjetivo" rows="15" id="objetivo" data-ckobjetivo="@this"
                            wire:model.defer.lazy="objetivo">
                            {!!$objetivo!!}
                    </textarea>
                    </div>
                    @error('objetivo')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Orden'
                            texto='Describa brevemente el orden de actividades de la convocatoria. <b class="text-danger fw-bold">Requerido</b>, Min. 2 caracteres.'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <div wire:ignore>
                        <textarea class="form-control editor ckorden" rows="15" id="orden" data-ckorden="@this"
                            wire:model.defer.lazy="orden">
                            {!!$orden!!}
                    </textarea>
                    </div>
                    @error('orden')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-xs-12">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Conclusiones'
                            texto='Describa brevemente las conclusiones obtenidas en la convocatoria. <b class="text-danger fw-bold">Requerido</b>, Min. 2 caracteres.'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <div wire:ignore>
                        <textarea class="form-control editor ckconclusiones" rows="15" id="conclusiones"
                            data-ckconclusiones="@this" wire:model.defer.lazy="conclusiones" name="conclusiones">
                                    {!!$conclusiones!!}
                            </textarea>
                    </div>
                    @error('conclusiones')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 border-bottom mb-2">
                <div class="d-inline float-start">
                    <h1 class="h6 fw-bold">Añadir convocatoria</h1>
                </div>
            </div>
            <div class="col-xs-12 col-md-5 col-lg-4">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Próxima fecha de la reunión'
                            texto='Ingrese la fecha de la nueva reunión. <b class="text-danger fw-bold">Requerido</b>.'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <input type="text" class="form-control flatpickrnew" id="fecha_proxima"
                        wire:model.defer.defer='fecha_proxima'>
                    @error('fecha_proxima')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-xs-12 col-md-7 col-lg-8">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Próximo lugar de convocatoria'
                            texto='Indique el lugar que donde se llevará a cabo la nueva reunión. <b class="text-danger fw-bold">Requerido</b>, Maximo 200 caracteres'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <input type="text" name="lugar_proxima" class="form-control" wire:model.defer="lugar_proxima"
                        placeholder="Ingrese el próximo lugar de la reunión" maxlength="200">
                    @error('lugar_proxima')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-12 mb-3">
                <div wire:ignore>
                    <livewire:admin.misc.label-help titulo='Correos de invitación'
                        texto='Envie una notificación a las personas que participarán en la próxima reunión. Separe los elementos con una coma (,) o presionando la tecla enter. <b class="text-danger fw-bold">Requerido</b>'
                        :wire:key="random_int(100000, 999999)" />
                </div>
                    <input data-pharaonic="tagify" id="invitados" name="invitados" class="form-control"
                        data-component-id="{{ $this->id }}" wire:model.defer="invitados" value='@json($invitados)' data-direct>
                @error('invitados')<span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row" x-data="{ countIn:1 }">
            <div class="col-12 border-bottom">
                <div class="my-2 d-inline float-start">
                    <h1 class="h6 fw-bold">Sección de responsabilidades y firmas</h1>
                </div>
                <div class="d-inline float-end">
                    <button type="button" class="btn btn-sm btn-success rounded-circle float-end"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar un nuevo responsable."
                        wire:click.prevent="addCommitmentFields()">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="my-2">
                @for ($i = 0; $i < $countResp; $i++) <div class="row">
                    <div class="col-4">
                        <div class="my-2">
                            <div wire:ignore>
                                <livewire:admin.misc.label-help titulo='Nombre o grupo responsable'
                                    texto='Indique el nombre y apellido de la persona o grupo responsable de las actividades que serán asignadas. <b class="text-danger fw-bold">Requerido</b>, máx. 100 caracteres'
                                    :wire:key="random_int(100000, 999999)" />
                            </div>
                            <input type="text" name="responsable" class="form-control" wire:model.defer="responsable"
                                placeholder="Nombre y apellido de la persona o grupo responsable" maxlength="100">
                            @error('responsable')<span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="my-2">
                            <div wire:ignore>
                                <livewire:admin.misc.label-help titulo='Correo electrónico'
                                    texto='Ingrese el correo electrónico de la persona o grupo responsable de las actividades que serán asignadas. <b class="text-danger fw-bold">Requerido</b>, máx. 100 caracteres'
                                    :wire:key="random_int(100000, 999999)" />
                            </div>
                            <input type="email" name="correo_responsable" class="form-control"
                                wire:model.defer="correo_responsable"
                                placeholder="Nombre y apellido de la persona o grupo correo_responsable"
                                maxlength="100">
                            @error('correo_responsable')<span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="my-2">
                            <div wire:ignore>
                                <livewire:admin.misc.label-help titulo='Fecha limite'
                                    texto='Ingrese la fecha limite de ejecución de los compromisos a asignar. <b class="text-danger fw-bold">Requerido</b>.'
                                    :wire:key="random_int(100000, 999999)" />
                            </div>
                            <input type="text" class="form-control flatpickrnew" id="fecha_limite"
                                wire:model.defer='fecha_limite'>
                            @error('fecha_limite')<span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-1 d-flex justify-content-end align-items-center">
                        @if ($i>0)
                        <button class="btn btn-danger btn-sm rounded-circle float-end"
                            x-on:click="countIn = countIn > 0 ? countIn-1 : countIn">
                            <i class="fas fa-minus"></i>
                        </button>
                        @endif
                    </div>
                    <div class="col-12">
                        <div class="my-2">
                            <div wire:ignore>
                                <livewire:admin.misc.label-help titulo='Actividades a asignar'
                                    texto='Ingrese la fecha de la nueva reunión. <b class="text-danger fw-bold">Requerido</b>.'
                                    :wire:key="random_int(100000, 999999)" />
                            </div>
                            <textarea class="form-control" rows="5" id="compromiso" wire:model.defer.lazy="compromiso"
                                name="compromiso">
                                {!!$compromiso!!}
                        </textarea>
                            @error('compromiso')<span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                    </div>
            </div>
            @endfor
        </div>

        <div class="row">
            <div class="col-12 border-bottom">
                <div class="my-2 d-inline float-start">
                    <h1 class="h6 fw-bold">Sección de firmantes</h1>
                </div>
                <div class="d-inline float-end">
                    <button type="button" class="btn btn-sm btn-success rounded-circle float-end"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Agregar un nuevo responsable."
                        wire:click.prevent="addSignFields()">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="my-1 col-12">
                @for ($i = 0; $i < $countSign; $i++) <div class="row my-2">
                    <div class="col-5">
                        <div wire:ignore>
                            <livewire:admin.misc.label-help titulo='Nombre de la persona que firma'
                                texto='Indique el nombre y apellido de la persona que aparecera como participe y conformidad en el documento. <b class="text-danger fw-bold">Requerido</b>, máx. 100 caracteres'
                                :wire:key="random_int(100000, 999999)" />
                        </div>
                        <input type="text" name="firmante" class="form-control" wire:model.defer="firmante"
                            placeholder="Ingrese el próximo lugar de la reunión" maxlength="100">
                        @error('firmante')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-5">
                        <div wire:ignore>
                            <livewire:admin.misc.label-help titulo='Cargo de la persona que firma'
                                texto='Indique el lugar que donde se llevará a cabo la nueva reunión. <b class="text-danger fw-bold">Requerido</b>, Maximo 200 caracteres'
                                :wire:key="random_int(100000, 999999)" />
                        </div>
                        <input type="text" name="cargo_firmante" class="form-control" wire:model.defer="cargo_firmante"
                            placeholder="Ingrese el próximo lugar de la reunión" maxlength="200">
                        @error('cargo_firmante')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-2" wire:ignore>
                        @if ($i > 0)
                        <button class="btn btn-danger btn-sm rounded-circle float-end"
                            wire:click.prevent="removeSignFields()" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Eliminar esta persona firmante.">
                            <i class="fas fa-minus"></i>
                        </button>
                        @endif
                    </div>
            </div>
            @endfor
        </div>

        <div class="my-3 row">
            <div class="col-12 border-bottom">
                <div wire:ignore>
                    <livewire:admin.misc.label-help titulo='Carga de Archivo.'
                        texto='Cargue los archivos vinculados a los datos. No se permiten archivos encriptados. Para esa opción, se sugiere que se emplee otro tipo de medio en la nube y coloque el enlace que corresponda. Archivos admitidos: png, jpg, jpeg, gif, tiff, webp, xls, xlsx, pdf, doc, aac, midi, ogg, x-wav, webm, 3gpp, wma,  mpeg, ogg, webm,  wmv,  wmv, mp4. Peso máximo: 100Mb'
                        :wire:key="random_int(100000, 999999)" />
                </div>
            </div>
            <div class="col-12">
                <div class="my-2">
                    <div wire:ignore>
                        <x-filepond wire:model.defer="archivos" multiple allowFileTypeValidation acceptedFileTypes="[
                                'image/png', 'image/jpg', 'image/jpeg', 'image/gif', 'image/tiff', 'image/webp',
                                'application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.oasis.opendocument.spreadsheet','application/msword', 'application/vnd.ms-powerpoint','text/plain','application/pdf','application/vnd.oasis.opendocument.presentation','application/vnd.oasis.opendocument.spreadsheet','application/vnd.oasis.opendocument.text',
                                'audio/aac','audio/midi','audio/ogg','audio/x-wav','audio/webm','audio/3gpp',
                                'video/x-msvideo', 'video/mpeg','video/ogg','video/webm','video/3gpp','video/x-ms-wmv','video/x-ms-wmv','video/mp4',
                                ]" allowFileSizeValidation label-file-processing-error="error" maxFileSize="100mb" />
                    </div>
                </div>
                @error('archivo')<span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="mb-2">
                    <button type="button" class="btn btn-main float-end px-4 py-2" wire:loading.attr="disabled"
                        wire:loading.class="bg-gray" wire:target="store" wire:click.submit="store()">
                        @if ($loading)
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        @else
                        <i class="me-1 fas fa-save"></i>
                        @endif
                        Enviar
                    </button>
                </div>
            </div>
        </div>


        <script src="{{ asset('js/ckeditor.js') }}"></script>
        <script>
            const toolbars = ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'];

            function ActivarCkeditor(identificador) {
                ClassicEditor.create(document.querySelector('#' + identificador), {
                    language: 'es',
                    toolbar: toolbars
                }).then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set(identificador, editor.getData());
                    })
                }).catch(error => {
                    console.error(error)
                });
            }

            ActivarCkeditor("objetivo");
            ActivarCkeditor("orden");
            ActivarCkeditor("conclusiones");

        </script>
    </div>
</div>