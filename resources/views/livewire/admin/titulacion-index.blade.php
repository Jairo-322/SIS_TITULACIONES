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
    <div class="card card-navy" style="border-color: #001F3F">
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
                            <input type="text" class="form-control" name="nro_acta" id='nro_acta'
                                placeholder="Ingrese el nombre" autocomplete="off" required  style="border: 2px solid #001F3F; border-radius: 5px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nro_rd1">Nro RD1</label>
                            <input type="text" class="form-control" name="nro_rd1" id='nro_rd1'
                                placeholder="Ingrese la nro_rd1" autocomplete="off" required  style="border: 2px solid #001F3F; border-radius: 5px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nro_rd2">Nro RD2</label>
                            <input type="text" class="form-control" name="nro_rd2" id='nro_rd2'
                                placeholder="Ingrese la nro_rd1" autocomplete="off" required  style="border: 2px solid #001F3F; border-radius: 5px;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="titulando1">Titulando 1</label>
                            <input type="text" class="form-control" name="titulando1" id="titulando1"
                                placeholder="Ingrse el nombre del titulando " required  style="border: 2px solid #001F3F; border-radius: 5px;">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="nota_titulando1">Nota 1</label>
                        <input type="number" class="form-control" name="nota_titulando1" id="nota_titulando1"
                            placeholder="nota 1" required  style="border: 2px solid #001F3F; border-radius: 5px;">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="titulando2">Titulando 2</label>
                            <input type="text" class="form-control" name="titulando2" id="titulando2"
                                placeholder="Ingrse el nombre del titulando " required style="border: 2px solid #001F3F; border-radius: 5px;">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="nota_titulando2">Nota 2</label>
                        <input type="number" class="form-control" name="nota_titulando2" id="nota_titulando2"
                            placeholder="nota 2" required  style="border: 2px solid #001F3F; border-radius: 5px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="promocion">Promocion</label>
                            <input type="number" class="form-control" name="promocion" id="promocion"
                                placeholder="año promocion" required  style="border: 2px solid #001F3F; border-radius: 5px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Carrera</label>
                            <select class="form-control" name="programa_id" required style="border: 2px solid #001F3F; border-radius: 5px;">
                                <option selected disabled>Seleccione una opción</option>
                                @foreach ($programa as $titulaciones)
                                    <option value="{{ $titulaciones->id }}">{{ $titulaciones->nombre_programa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="hora_inicio">Hora inicio</label>
                            <input type="time" class="form-control" name="hora_inicio" id="hora_inicio"
                                placeholder="hora inicio" required style="border: 2px solid #001F3F; border-radius: 5px;">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="hora_fin">Hora fin</label>
                            <input type="time" class="form-control" name="hora_fin" id="hora_fin"
                                placeholder="Hora inicio" required style="border: 2px solid #001F3F; border-radius: 5px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="fecha_titulacion">Fecha titulación</label>
                        <input type="date" class="form-control" name="fecha_titulacion" id="fecha_titulacion"
                            placeholder="Fecha de titulación" required style="border: 2px solid #001F3F; border-radius: 5px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Jurado 1</label>
                            <select class="form-control" name="jurado1" required style="border: 2px solid #001F3F; border-radius: 5px;">
                                <option selected disabled>Seleccione una opción</option>
                                @foreach ($jurado1 as $dictaminante1)
                                    <option value="{{ $dictaminante1->id }}">
                                        {{ $dictaminante1->nombres . ' ' . $dictaminante1->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Jurado 2</label>
                            <select class="form-control" name="jurado2" required style="border: 2px solid #001F3F; border-radius: 5px;">
                                <option selected disabled>Seleccione una opción</option>
                                @foreach ($jurado2 as $dictaminante2)
                                    <option value="{{ $dictaminante2->id }}">
                                        {{ $dictaminante2->nombres . ' ' . $dictaminante2->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Presidente</label>
                            <select class="form-control" name="presidente" required style="border: 2px solid #001F3F; border-radius: 5px;">
                                <option selected disabled>Seleccione una opción</option>
                                @foreach ($presidente as $presidentes)
                                    <option value="{{ $presidentes->id }}">
                                        {{ $presidentes->nombres . ' ' . $presidentes->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <label for="nombre_proyecto">Nombre del proyecto</label>
                        <textarea class="form-control" name="nombre_proyecto" id="nombre_proyecto" placeholder="Nombre del proyecto"
                            rows="4" required style="border: 2px solid #001F3F; border-radius: 5px;"></textarea>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                        <button type="submit" class="btn btn-info active" style="background: #001F3F">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card card-navy card-outline" style="border-color: #001F3F">
        <div class="card-header">
            <h3 class="card-title text-center">
                <i class="fas fa-table mr-2"></i>
                Tabla de titulaciones
            </h3>
        </div>
        <div class="card-body" style="border: 2px solid #001F3F;padding: 15px;background-color: #f9f9f9;box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <table id="titulacion" class="table table-bordered table-striped" style="border-color: #001F3F;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nro acta</th>
                        <th>Nro rd1</th>
                        <th>Nro rd2</th>
                        <th>titulando 1</th>
                        <th>nota 1</th>
                        <th>titulando 2</th>
                        <th>nota 2</th>
                        <th>Promocion</th>
                        <th>Carrera</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                        <th>Fecha titulación</th>
                        <th>Jurado 1</th>
                        <th>Jurado 2</th>
                        <th>Presidente</th>
                        <th>Nombre proyecto</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($titulacion as $titulaciones)
                        <tr>
                            <td>{{ $titulaciones->id }}</td>
                            <td>{{ $titulaciones->nro_acta }}</td>
                            <td>{{ $titulaciones->nro_rd1 }}</td>
                            <td>{{ $titulaciones->nro_rd2 }}</td>
                            <td>{{ $titulaciones->titulando1 }}</td>
                            <td>{{ $titulaciones->nota_titulando1 }}</td>
                            <td>{{ $titulaciones->titulando2 }}</td>
                            <td>{{ $titulaciones->nota_titulando2 }}</td>
                            <td>{{ $titulaciones->promocion }}</td>
                            <td>{{ $titulaciones->programa->abreviatura }}</td>
                            <td>{{ $titulaciones->hora_inicio }}</td>
                            <td>{{ $titulaciones->hora_fin }}</td>
                            <td>{{ $titulaciones->fecha_titulacion }}</td>
                            <td>{{ $titulaciones->juradouno ? $titulaciones->juradouno->nombres . ' ' . $titulaciones->juradouno->apellidos : 'No asignado' }}
                            </td>
                            <td>{{ $titulaciones->juradodos ? $titulaciones->juradodos->nombres . ' ' . $titulaciones->juradodos->apellidos : 'No asignado' }}
                            </td>
                            <td>{{ $titulaciones->docentepresidente ? $titulaciones->docentepresidente->nombres . ' ' . $titulaciones->docentepresidente->apellidos : 'No asignado' }}
                            </td>
                            <td>{{ $titulaciones->nombre_proyecto }}</td>
                            <td width="10px">
                                <a href="" class="btn btn-warning" data-toggle="modal"
                                    data-target="#editModal{{ $titulaciones->id }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.titulacion.destroy', $titulaciones->id) }}"
                                    method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal de edición -->
                        <div class="modal fade" id="editModal{{ $titulaciones->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $titulaciones->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $titulaciones->id }}Label">Editar Titulación</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('admin.titulacion.update', $titulaciones->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Campos del formulario -->
                                            <div class="form-group">
                                                <label for="nro_acta">Nro acta</label>
                                                <input type="text" class="form-control" id="nro_acta" name="nro_acta" value="{{ $titulaciones->nro_acta }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="titulando1">Titulando 1</label>
                                                <input type="text" class="form-control" id="titulando1" name="titulando1" value="{{ $titulaciones->titulando1 }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nota_titulando1">Nota 1</label>
                                                <input type="number" class="form-control" id="nota_titulando1" name="nota_titulando1" value="{{ $titulaciones->nota_titulando1 }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="titulando2">Titulando 2</label>
                                                <input type="text" class="form-control" id="titulando2" name="titulando2" value="{{ $titulaciones->titulando2 }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nota_titulando2">Nota 2</label>
                                                <input type="number" class="form-control" id="nota_titulando2" name="nota_titulando2" value="{{ $titulaciones->nota_titulando2 }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nro_rd1">Nro rd1</label>
                                                <input type="text" class="form-control" id="nro_rd1" name="nro_rd1" value="{{ $titulaciones->nro_rd1 }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nro_rd2">Nro rd2</label>
                                                <input type="text" class="form-control" id="nro_rd2" name="nro_rd2" value="{{ $titulaciones->nro_rd2 }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre_proyecto">Nombre proyecto</label>
                                                <input type="text" class="form-control" id="nombre_proyecto" name="nombre_proyecto" value="{{ $titulaciones->nombre_proyecto }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="promocion">Promocion</label>
                                                <input type="number" class="form-control" id="promocion" name="promocion" value="{{ $titulaciones->promocion }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="programa_id">Programa</label>
                                                <select class="form-control" id="programa_id" name="programa_id">
                                                    @foreach ($programa as $programas)
                                                        <option value="{{ $programas->id }}">{{ $programas->nombre_programa }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="hora_inicio">Hora inicio</label>
                                                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="{{ $titulaciones->hora_inicio }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="hora_fin">Hora fin</label>
                                                <input type="time" class="form-control" id="hora_fin" name="hora_fin" value="{{ $titulaciones->hora_fin }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fecha_titulacion">Fecha titulacion</label>
                                                <input type="date" class="form-control" id="fecha_titulacion" name="fecha_titulacion" value="{{ $titulaciones->fecha_titulacion }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="jurado1">Jurado 1</label>
                                                <select class="form-control" id="jurado1" name="jurado1">
                                                    @foreach ($jurado1 as $dictaminante1)
                                                        <option value="{{ $dictaminante1->id }}"
                                                            {{ isset($titulaciones->jurado1) && $titulaciones->jurado1 == $dictaminante1->id ? 'selected' : '' }}>
                                                            {{ $dictaminante1->nombres . ' ' . $dictaminante1->apellidos }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jurado2">Jurado 2</label>
                                                <select class="form-control" id="jurado2" name="jurado2">
                                                    @foreach ($jurado2 as $dictaminante2)
                                                        <option value="{{ $dictaminante2->id }}"
                                                            {{ isset($titulaciones->jurado2) && $titulaciones->jurado2 == $dictaminante2->id ? 'selected' : '' }}>
                                                            {{ $dictaminante2->nombres . ' ' . $dictaminante2->apellidos }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="presidente">Presidente</label>
                                                <select class="form-control" id="presidente" name="presidente">
                                                    @foreach ($presidente as $dictaminante3)
                                                        <option value="{{ $dictaminante3->id }}"
                                                            {{ isset($titulaciones->presidente) && $titulaciones->presidente == $dictaminante3->id ? 'selected' : '' }}>
                                                            {{ $dictaminante3->nombres . ' ' . $dictaminante3->apellidos }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-navy active" style="background: #001F3F; color: white">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
