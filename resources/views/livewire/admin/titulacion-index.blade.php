<div class="mt-3">
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "¡Éxito!",
                text: "{{ session('success') }}"
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ $errors->first() }}"
            })
        </script>
    @endif
    <!-- formulario -->
    <div class="card card-navy">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit mr-2"></i>
                Registrar Titulación
            </h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.titulacion.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nro_acta">Nro de acta</label>
                            <input type="text" class="form-control" name="nro_acta" id='nro_acta' placeholder="Ingrese el nombre" autocomplete="off" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nro_rd1">Nro RD1</label>
                            <input type="text" class="form-control" name="nro_rd1" id='nro_rd1' placeholder="Ingrese la nro_rd1" autocomplete="off" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nro_rd2">Nro RD2</label>
                            <input type="text" class="form-control" name="nro_rd2" id='nro_rd2' placeholder="Ingrese la nro_rd1" autocomplete="off" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="titulando1">Titulando 1</label>
                            <input type="text" class="form-control" name="titulando1" id="titulando1" placeholder="Ingrse el nombre del titulando " required oninput="this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="nota_titulando1">Nota 1</label>
                        <input type="number" class="form-control" name="nota_titulando1" id="nota_titulando1" placeholder="nota 1" required>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="titulando2">Titulando 2</label>
                            <input type="text" class="form-control" name="titulando2" id="titulando2" placeholder="Ingrse el nombre del titulando " required oninput="this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="nota_titulando2">Nota 2</label>
                        <input type="number" class="form-control" name="nota_titulando2" id="nota_titulando2" placeholder="nota 2" required>
                    </div>                    
                </div>                
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="promocion">Promocion</label>
                            <input type="number" class="form-control" name="promocion" id="promocion" placeholder="año promocion" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Carrera</label>
                            <select class="form-control" name="programa_id" required>
                                <option selected disabled>Seleccione una opción</option>
                                @foreach ($programa as $programas)
                                    <option value="{{ $programas->id }}">{{ $programas->nombre_programa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="hora_inicio">Hora inicio</label>
                            <input type="time" class="form-control" name="hora_inicio" id="hora inicio" placeholder="hora inicio" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="hora_fin">Hora fin</label>
                            <input type="time" class="form-control" name="hora_fin" id="hora fin" placeholder="Hora inicio" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="fecha_titulacion">Fecha titulación</label>
                        <input type="date" class="form-control" name="fecha_titulacion" id="fecha_titulacion" placeholder="Fecha de titulación" required>
                    </div>
                </div>
                <div class="row">
                </div>
                <div class="row">                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Jurado 1</label>
                            <select class="form-control" name="jurado1" required>
                                <option selected disabled>Seleccione una opción</option>
                                @foreach ($jurado1 as $dictaminante1)
                                    <option value="{{ $dictaminante1->id }}">{{ $dictaminante1->nombres. " ".$dictaminante1->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Jurado 2</label>
                            <select class="form-control" name="jurado2" required>
                                <option selected disabled>Seleccione una opción</option>
                                @foreach ($jurado2 as $dictaminante2)
                                    <option value="{{ $dictaminante1->id }}">{{ $dictaminante2->nombres. " ".$dictaminante2->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Presidente</label>
                            <select class="form-control" name="presidente" required>
                                <option selected disabled>Seleccione una opción</option>
                                @foreach ($presidente as $presidentes)
                                    <option value="{{ $presidentes->id }}">{{ $presidentes->nombres. " ".$presidentes->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="nombre_proyecto">nombre del proyecto</label>
                        <input type="text" class="form-control" name="nombre_proyecto" id="nombre-proyecto" placeholder="nombre_proyecto" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info active">Registrar</button>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="card card-navy card-outline">
        <div class="card-header">
            <h3 class="card-title text-center">
                <i class="fas fa-table mr-2"></i>
                Tabla de programas
            </h3>
        </div>
        <div class="card-body">
            <table id="programa" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre programa</th>
                        <th>Abreviatura</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programa as $programas)
                        <tr>
                            <td>{{ $programas->id }}</td>
                            <td>{{ $programas->nro_acta }}</td>
                            <td>{{ $programas->nro_rd1 }}</td>
                            <td width="10px">
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $programas->id }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.programa.destroy', $programas->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal de edición -->
                        <div class="modal fade" id="editModal{{ $programas->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $programas->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $programas->id }}Label">Editar Programa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('admin.programa.update', $programas->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Campos del formulario -->
                                            <div class="form-group">
                                                <label for="nro_acta{{ $programas->id }}">Nombre Programa</label>
                                                <input type="text" class="form-control" name="nro_acta" id="nro_acta{{ $programas->id }}" value="{{ $programas->nro_acta}}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();">
                                            </div>
                                            <div class="form-group">
                                                <label for="nro_rd1{{ $programas->id }}">Abreviatura</label>
                                                <input type="text" class="form-control" name="nro_rd1" id="nro_rd1{{ $programas->id }}" value="{{ $programas->nro_rd1}}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-info active">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
</div>
