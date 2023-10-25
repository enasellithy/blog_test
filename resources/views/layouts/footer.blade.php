
<script src="{{ asset('') }}assets/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('') }}assets/vendor/js/bootstrap.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/hammer/hammer.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/i18n/i18n.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="{{ asset('') }}assets/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('') }}assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/swiper/swiper.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

<script src="{{ asset('') }}assets/vendor/libs/flatpickr/flatpickr.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/select2/select2.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="{{ asset('') }}assets/vendor/libs/moment/moment.js"></script>

<!-- Main JS -->
<script src="{{ asset('') }}assets/js/main.js"></script>

<!-- Page JS -->

<!-- Page JS -->
<script src="{{ asset('') }}assets/js/dashboards-analytics.js"></script>
<script src="{{ asset('') }}assets/js/form-layouts.js"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script>
    $('#inf_category').select2();
    $('#inf_platform').select2();
</script>

@livewireScripts
@stack('js')
