<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="{{ $konfig->keywords }}" name="keywords">
    <meta content="{{ $konfig->meta_text }}" name="description">
    <title>Daya Cahya Abadi | {{ $title }}</title>

    <!-- Favicon -->
    <link href="{{ $konfig->icon_url }}" rel="icon">
    {{-- <link href="{{ asset('assets/img/logo_dca.png') }}" rel="icon"> --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin//plugins/ekko-lightbox/ekko-lightbox.css') }}">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet"
        href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css?v=3.2.0') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ $konfig->image_url }}" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ $konfig->image_url }}" alt="Logo PT. DCA" {{-- <img src="{{ asset('assets/img/logo_dca.png') }}" alt="Logo PT. DCA" --}}
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Daya Cahya Abadi</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        {{-- <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image"> --}}

                        <img src="{{ Auth::user()->image_url }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        <a href="#" class="d-block"></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin-dashboard') }}"
                                class="nav-link  {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>


                        @can('list-admin')
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}"
                                class="nav-link {{ request()->is('admin/category*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p>
                                    Kategori
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a href="{{ route('service.index') }}"
                                class="nav-link {{ request()->is('admin/service*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Layanan
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('project.index') }}"
                                class="nav-link {{ request()->is('admin/project*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Galeri Project
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('testimonial.index') }}"
                                class="nav-link {{ request()->is('admin/testimonial*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-comment"></i>
                                <p>
                                    Testimoni
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="{{ route('client.index') }}"
                                class="nav-link {{ request()->is('admin/client*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>
                                    Klien
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a href="{{ route('staff.index') }}"
                                class="nav-link {{ request()->is('admin/staff*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Team
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>

                        @can('list-admin')

                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/configuration*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Konfigurasi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('configuration.index') }}"
                                        class="nav-link {{ request()->is('admin/configuration') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Konfigruasi Umum</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('konfigurasi-logo') }}"
                                        class="nav-link {{ request()->is('admin/configuration/logo') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ganti Logo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('konfigurasi-icon') }}"
                                        class="nav-link {{ request()->is('admin/configuration/icon') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ganti Icon</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user.index') }}"
                                class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    Pengaturan Pengguna
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.partnership.index') }}" class="nav-link {{ request()->is('admin/partnership*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>Pengajuan Partnership</p>
                            </a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a href="{{ route('user.profile') }}"
                                class="nav-link {{ request()->is('admin/user/profile') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>
                                    Profil
                                    {{-- <span class="right badge badge-danger">New</span> --}}
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                                class="nav-link">
                                <i class="nav-icon fas fa-arrow-left"></i>
                                <p>
                                    Logout

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        @yield('content')

        <footer class="main-footer">
            <!-- <strong>Copyright &copy; 2023 <a href="">PT. Daya Cahya Abadi</a>.</strong>
            All rights reserved.
            {{-- <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div> --}} -->
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }} "></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }} "></script>


    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    {{-- Sweetalert & Toastr --}}
    <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>

    {{-- lightbox --}}
    <script src="{{ asset('admin/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>

    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }} "></script>

    <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }} "></script>

    <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }} "></script>
    <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }} "></script>

    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }} "></script>

    <script src="{{ asset('admin/plugins/moment/moment.min.js') }} "></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }} "></script>

    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }} "></script>

    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }} "></script>

    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} "></script>

    <script src="{{ asset('admin/dist/js/adminlte.js?v=3.2.0') }} "></script>

    <script src="{{ asset('admin/dist/js/pages/dashboard.js') }} "></script>


    <script>
        $(function() {
            var Toast = Swal.mixin({
                // toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2500
            });

            @if(session('success_store'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('
                success_store ') }}'
            })
            @elseif(session('success_update'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('
                success_update ') }}'
            })
            @elseif(session('success_delete'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('
                success_delete ') }}'
            })
            @endif
        });
    </script>

    <script>
        function updatePreview(input, target) {
            let file = input.files[0];
            let reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function() {
                let img = document.getElementById(target);
                img.src = reader.result;
            }
        }
    </script>

    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['style']],
                    ['font', ['clear', 'fontname', 'fontsize', 'forecolor', 'backcolor', 'bold',
                        'underline', 'clear'
                    ]],
                    ['misc', ['undo', 'redo']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    // ['table', ['table']],
                    // ['insert', ['link', 'picture', 'video', 'hr']],
                    ['view', ['codeview', 'help']]
                ],
                fontNames: ['Serif', 'Sans', 'Open Sans', 'Arial', 'Arial Black', 'Courier',
                    'Courier New', 'Comic Sans MS', 'Helvetica',
                ],
                fontNamesIgnoreCheck: ['Serif', 'Sans', 'Open Sans', 'Arial', 'Arial Black', 'Courier',
                    'Courier New', 'Comic Sans MS', 'Helvetica',
                ],
                height: 150,
            });
        })
    </script>

    {{-- <script type="text/javascript">
        $('.delete').click(function() {
            var form = $(this).closest("form");
            Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Anda tidak akan dapat mengembalikannya!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!"
                // buttons: true,
                // dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    // window.location="/admin/category/destroy/"+id+"";
                    // Swal.fire({
                    //     title: "Deleted!",
                    //     text: "Your file has been deleted.",
                    //     icon: "success"
                    // });
                    form.submit();
                } else {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });
        })
    </script> --}}

    <script type="text/javascript">
        $('.delete').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Hapus!",
                    // buttons: true,
                    // dangerMode: true,
                })
                .then((result) => {
                    if (result.value) {
                        // Swal.fire({
                        //     title: "Deleted!",
                        //     text: "Your file has been deleted.",
                        //     icon: "success"
                        // });
                        form.submit();
                    } else {
                        // Swal.fire('Data Anda aman.', '', 'info')
                        swal.fire({
                            title: "Cancelled",
                            text: "Data Anda Masih tersimpan dengan aman :)",
                            icon: "error"
                        });
                    }
                });
        });
    </script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>

</body>

</html>