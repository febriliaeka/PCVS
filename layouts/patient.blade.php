<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Centre Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link href="{{ asset('assets/vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">

    {{-- CKEDITOR --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    {{-- SELECT2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2-custom.css') }}">

</head>

<body>
    <div id="app">
        @include('patient.components.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3 style="color:#D8201C!important;">
                                @yield('page-title')
                            </h3>
                            <p class="text-subtitle text-muted">
                                @yield('page-desc')
                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" style="color:#eb7974!important;">
                                            @yield('page-parent-route')
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        @yield('page-current-route')
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    @include('components.error')
                    <div class="card">
                        <div class="card-header">
                            @yield('page-content-title')
                            {{-- <h4 class="card-title">
                            </h4> --}}
                        </div>
                        <div class="card-body">
                            @yield('page-content-body')
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy;</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> 
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal fade" id="penuliskode-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="penuliskode-modal-title">Modal title</h5>
                    {{--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>  --}}

                    <button type="button" class="close" data-bs-dismiss="modal">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                </div>
                <div class="modal-body" id="penuliskode-modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets/js/extensions/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    
    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width:"100%"
            });
            // $('select').selectpicker();
            // $('.fancybox').fancybox();
            // $('.loading-overlay').fadeOut();
        });
        function penuliskode_modal(title, target) {
            $('#penuliskode-modal-title').html(title);
            $.get(target, function(result) {
                $('#penuliskode-modal-body').html(result);
                $('#penuliskode-modal').modal('show');
            }).fail(function(e) {
                alert("Terjadi kesalahan tidak terduga!");
                console.log(e);
            });
        }
        function delete_data(text, target, refresh) {
            Swal.fire({
                title: "Are you sure want to delete data?",
                width: 600,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e74a3b',
                cancelButtonColor: '#858796',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: target,
                        method: "POST",
                        data: '_method=DELETE&_token={{ csrf_token() }}',
                        success: function(data) {
                            if (data.status == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Gotcha!',
                                    text: data.text
                                })
                                window.location.href = refresh;
                            } else {
                                console.log(data);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Whoops!',
                                    text: data.text
                                })
                            }
                        },
                        error: function(data) {
                            console.log(data);
                            Swal.fire({
                                icon: 'error',
                                title: 'Whoops!',
                                text: 'Error occur.'
                            })
                        }
                    });
                }
            })
        }
    </script>
    @yield('js')
</body>

</html>
