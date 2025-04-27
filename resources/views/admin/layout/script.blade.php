 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

 <!-- Page level plugins -->
 <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

 <!-- Page level custom scripts -->
 <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

 {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
 <script src="{{ asset('admin/vendor/sweetalert/sweetalert2.js') }}"></script>

 <!-- Page level plugins -->
 {{-- <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script> --}}

 <!-- Page level custom scripts -->
 {{-- <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
 <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script> --}}

<script>
    const success = "{{ session()->get('success') }}";

    // alert(success);

    $(document).ready(()=>{

        if (success) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: success,
                showConfirmButton: false,
                timer: 1500
            });
        }
    });

</script>
