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
                Registrar Docente
            </h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.docente.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese el DNI" autocomplete="off" required maxlength="8" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id='nombres' placeholder="Ingrese los nombres" autocomplete="off" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id='apellidos' placeholder="Ingrese los apellidos" autocomplete="off" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info active">Registrar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card card-navy card-outline">
        <div class="card-header">
            <h3 class="card-title text-center">
                <i class="fas fa-table mr-2"></i>
                Tabla de Docentes
            </h3>
        </div>
        <div class="card-body">
            <table id="docente" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docente as $docentes)
                        <tr>
                            <td>{{ $docentes->id }}</td>
                            <td>{{ $docentes->dni }}</td>
                            <td>{{ $docentes->nombres }}</td>
                            <td> {{ $docentes ->apellidos }}</td>
                            <td width="10px">
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $docentes->id }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.docente.destroy', $docentes->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal de edición -->
                        <div class="modal fade" id="editModal{{ $docentes->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $docentes->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $docentes->id }}Label">Editar Docente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('admin.docente.update', $docentes->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Campos del formulario -->
                                            <div class="form-group">
                                                <label for="dni{{ $docentes->id }}">DNI</label>
                                                <input type="text" class="form-control" name="dni" id="dni{{ $docentes->id }}" value="{{ $docentes->dni}}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            </div>
                                            <div class="form-group">
                                                <label for="nombres{{ $docentes->id }}">Nombres</label>
                                                <input type="text" class="form-control" name="nombres" id="nombres{{ $docentes->id }}" value="{{ $docentes->nombres}}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();">
                                            </div>
                                            <div class="form-group">
                                                <label for="apellidos{{ $docentes->id }}">Apellidos</label>
                                                <input type="text" class="form-control" name="apellidos" id="apellidos{{ $docentes->id }}" value="{{ $docentes->apellidos}}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();">
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
    </div>
</div>
