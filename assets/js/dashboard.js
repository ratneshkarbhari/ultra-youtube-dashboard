$(".single").select2({
    placeholder: "Select a Chanel",
    allowClear: true,
  });
  $(".multiple").select2({
    placeholder: "Select a Chanel",
    allowClear: true,
  });

  $(document).ready(function() {
    $('.DataTable').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );