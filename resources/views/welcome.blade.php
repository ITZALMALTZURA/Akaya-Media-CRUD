<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4 text-center">Lista de Productos</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newproduct"
            style="margin-bottom: 10px;">
            Agregar Nuevo Producto
        </button>
        <!-- Lista de tareas -->
        <div class="card">
            <div class="card-header">Productos</div>
            <table id="myTableC" border="1" class="display table table-hover text-center">
                <thead class="tbencabezado">
                    <tr>
                        <td><strong>
                                Nombre
                            </strong></td>
                        <td><strong>
                                Descripccion
                            </strong></td>
                        <td><strong>
                                Cantidad
                            </strong></td>
                        <td><strong>
                                Precio
                            </strong></td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                @forelse($products as $product)
                <tr>
                    <td>
                        {{ $product->nombre }}
                    </td>
                    <td>
                        {{ $product->descripccion }}
                    </td>
                    <td>
                        {{ $product->cantidad }}
                    </td>
                    <td>
                        {{ $product->precio }}
                    </td>
                    <td>
                        <button type="button" onclick="updateproduct('update','{{ $product->id }}')"
                            class="btn btn-success btn-sm">
                            Actualizar
                        </button>
                    </td>
                    <td>
                        <button type="button" onclick="updateproduct('delete','{{ $product->id }}')"
                            class="btn btn-danger btn-sm">
                            Eliminar
                        </button>
                    </td>
                </tr>
                @empty
                <li class="list-group-item text-center text-muted">No hay productos registradas.</li>
                @endforelse
            </table>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="newproduct" tabindex="-1" aria-labelledby="newproduct" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form method="POST" name="formNewproduct" action="/new_product">
                                @csrf
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                                </div>

                                <div class="mb-3">
                                    <label for="descripccion" class="form-label">Descripción</label>
                                    <textarea class="form-control" name="descripccion" id="descripccion"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="cantidad" class="form-label">cantidad</label>
                                    <input type="text" class="form-control" name="cantidad" id="cantidad" required>
                                </div>

                                <div class="mb-3">
                                    <label for="precio" class="form-label">precio</label>
                                    <input type="text" class="form-control" name="precio" id="precio" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="Confirmar()" id="btn-new-product"
                            class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Uoodate product Modal -->
        <div class="modal fade" id="updateproduct" tabindex="-1" aria-labelledby="updateproduct" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form method="POST" name="formUPproduct" action="/products/{$id}">
                                @csrf
                                <div class="mb-3">
                                    <label for="u_nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="u_nombre" id="u_nombre" required>
                                </div>

                                <div class="mb-3">
                                    <label for="u_descripccion" class="form-label">Descripción</label>
                                    <textarea class="form-control" name="u_descripccion" id="u_descripccion"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="u_cantidad" class="form-label">cantidad</label>
                                    <input type="number" class="form-control" name="u_cantidad" id="u_cantidad" required>
                                </div>

                                <div class="mb-3">
                                    <label for="u_precio" class="form-label">precio</label>
                                    <input type="number" class="form-control" name="u_precio" id="u_precio" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="Confirmaru()" id="btn-upt-product"
                            class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ajax-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- sweetalert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script language="JavaScript">
        function Confirmar() {
            document.formNewproduct.submit()

            $('#btn-new-product').attr('disabled', true);
        }
        function Confirmaru() {
            document.formUPproduct.submit()

            $('#btn-upt-product').attr('disabled', true);
        }

        function updateproduct(action, val) {
            console.log(action)
            if (action === 'delete') {
                $.ajax({
                    type: "DELETE",
                    url: '/products/' + val,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        console.log(data);
                        Swal.fire({
                            title: data.message,
                            icon: "success",
                            //html: 'Redireccionando...',
                            timer: 5000, // Tiempo en milisegundos antes de la redirección
                            timerProgressBar: true,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                    const content = Swal.getContent()
                                    if (content) {
                                        const b = content.querySelector('b')
                                        if (b) {
                                            b.textContent = Swal.getTimerLeft()
                                        }
                                    }
                                }, 100)
                            },
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                // Redireccionar después de que se complete el temporizador
                                window.location.reload();
                            }
                            // Redireccionar con boton o fuera del alert
                            window.location.reload();
                        });
                    }
                });
            } else if (action === 'update') {
                $.ajax({
                    type: "GET",
                    url: '/products/' + val,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        console.log(data);
                        if (!data.error) {
                            $('#updateproduct').modal('show');

                            const form = document.forms["formUPproduct"];
                            if (form && data?.id) {
                                form.action = `/products/${data.id}`;
                            }

                            $('#u_nombre').val(data.nombre ?? '');
                            $('#u_descripccion').val(data.descripccion ?? '');
                            $('#u_cantidad').val(data.cantidad ?? 0);
                            $('#u_precio').val(data.precio ?? 0.00);
                        }

                    }
                });




            }
        }
    </script>
</body>

</html>