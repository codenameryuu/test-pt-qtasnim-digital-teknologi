<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ MetadataHelper::metadata()->title }}</title>
    <meta name="description" content="{{ MetadataHelper::metadata()->description }}">
    <meta name="keywords" content="{{ MetadataHelper::metadata()->keywords }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.png') }}">

    {{-- * JQuery --}}
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    {{-- * Simple bar --}}
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

    {{-- * Animate --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />

    {{-- * Block UI --}}
    <script src="{{ asset('assets/vendor/libs/block-ui/block-ui.js') }}"></script>

    {{-- * Bootstrap Css --}}
    <link href="{{ asset('assets/vendor/libs/bootstrap-5.3/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

    {{-- * Datatable --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />

    {{-- * Flatpickr --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/themes/material_blue.css') }}" />

    {{-- * Form Validation --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/form-validation/dist/css/formValidation.min.css') }}" />
    <script src="{{ asset('assets/vendor/libs/form-validation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/form-validation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/form-validation/dist/js/plugins/AutoFocus.min.js') }}"></script>

    {{-- * Icons Css --}}
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- * Izi Toast --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/izi-toast/css/iziToast.min.css') }}">
    <script src="{{ asset('assets/vendor/libs/izi-toast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('assets/helper/izi-toast.js') }}"></script>

    {{-- * SweetAlert2 --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    {{-- * Select2 --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/css/select2-bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />

    {{-- * Style Css --}}
    <link href="{{ asset('assets/css/style.min.css') }}" class="theme-opt" rel="stylesheet" type="text/css" />

    @yield('custom_head')
</head>

@yield('custom_css')

<body>
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>

    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('partials.alert')

                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    {{-- * Axios --}}
    <script src="{{ asset('assets/vendor/libs/axios/axios.min.js') }}"></script>

    {{-- * Block Card --}}
    <script src="{{ asset('assets/helper/block-card.js') }}"></script>

    {{-- * Bootstrap --}}
    <script src="{{ asset('assets/vendor/libs/bootstrap-5.3/js/bootstrap.bundle.min.js') }}"></script>

    {{-- * Datatable --}}
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    {{-- * Flatpickr --}}
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/l10n/id.js') }}"></script>
    <script src="{{ asset('assets/helper/flatpickr.js') }}"></script>

    {{-- * Icon --}}
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>

    {{-- * Preview Image --}}
    <script src="{{ asset('assets/helper/preview-image.js') }}"></script>

    {{-- * Regex --}}
    <script src="{{ asset('assets/helper/regex.js') }}"></script>

    {{-- * Select2 --}}
    <script src="{{ asset('assets/vendor/libs/select2/js/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/helper/select2-translation.js') }}"></script>
    <script src="{{ asset('assets/helper/select2.js') }}"></script>

    {{-- * Simplebar --}}
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>

    {{-- * Plugins --}}
    <script src="{{ asset('assets/js/plugins.init.js') }}"></script>

    {{-- * Main --}}
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @yield('custom_js')

</body>

</html>
