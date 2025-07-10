$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  table = $('#Module_table').DataTable({ 
   
    "responsive": true,
    "paging":   true,
     "searching": true,
  
    "ordering":true,
    "language": {   "emptyTable": "Aucune donnée disponible dans le tableau",
                  "lengthMenu": "Afficher _MENU_ éléments",
                  "loadingRecords": "Chargement...",
                  "zeroRecords": "Aucun élément correspondant trouvé",
                  "paginate": 
                      {   "first": "Premier",
                          "last": "Dernier",
                          "previous": "Précédent",
                          "next": "Suiv" },
                  "info": "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
                  "infoEmpty": "Affichage de 0 à 0 sur 0 éléments",
                  "infoFiltered": "", },
    "columnDefs": [
                  { 
                   "order": [[1,2,"asc"]],
                  "targets": [1, 2], "orderable": false }],
    "dom": 'rt<"row"<"col-md-4"l><"col-md-4"i><"col-md-4"p>><"clear">',
    "serverSide" : true,
    "lengthChange": true,
    "processing": true,
    "ajax": {
    "url": "/get_modules",
    "type": "post",
    },
        "columnDefs": [ {
              "targets": [5],
              "data": null,
              render: function(data, type, row) {
                return "<button type='button' class='btn btn-danger btn-sm'  onclick='supp("+row[0]+")'>Supprimer</button> <button class='btn btn-sm btn-primary edit' onclick='editform("+row[0]+")'>Modifier</button>";
              }
          } ]
    });

    function add() {
        $('#ajoutModule').modal('toggle');   
      }
    $("#add_module").submit(function(event){
        event.preventDefault();
        var post_url = $(this).attr("action");
        var request_method = $(this).attr("method");
        var form_data = $(this).serialize();
        $.ajax({
          url : post_url,
          type: request_method,
          data : form_data,
          success: function(response){
            table.ajax.reload();
            toastr["success"]("ajout effectué");
            $('#modadd').val('');
            $('#descadd').val('');
            $('#coefadd').val('');
            $('#nbadd').val('');

            $('#ajoutModule').modal('toggle');},
        }
        );
    });


    function supp(id){
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success mt-2',
          cancelButtonClass: 'btn btn-danger ms-2 mt-2',
          buttonsStyling: false,
      }).then(function (result) {
          if (result.value) {  
            $.ajax({
              url : '/destroym/'+id,
              type: 'get',
              data:   {
                id:id,
                _token:"{{ csrf_token }}" ,
              },
            }),
            Swal.fire({
              title: 'Deleted!',
              text: 'Your file has been deleted.',
              icon: 'success',
            }).then(function (result) {
            table.ajax.reload()})
          .done(function(response){   
            var er = response.success;
            var message = response.message;          
            if (er=== 'yes') {      
              Swal.fire({
                title: 'Deleted!',
                text: 'Your file has been deleted.',
                icon: 'success',
              })
            } else {
              Swal.fire({
                title: 'Cancelled',
                text: 'Your imaginary file is safe :)',
                icon: 'error',
              })
            }
          });
            } else if (
              result.dismiss === Swal.DismissReason.cancel
            ) {
              Swal.fire({
                title: 'Cancelled',
                text: 'Your imaginary file is safe :)',
                icon: 'error',
              })
            }
      });    
      }

      function editform(id) {
        $('#ModuleModal').modal('toggle');
        $.ajax({
          url : "/get_module",
          type: "POST",
          data : { id: id }
        })
        .done(function(response){
          //console.log(response[0].groupe)
          $('#modmodif').val(response[0].nom);
          $('#descmodif').val(response[0].desc);
          $('#coefmodif').val(response[0].coef);
          $('#nbmodif').val(response[0].nbheure);
          $('#id').val(response[0].id);
          console.log(response[0].id);
        });
      }
      function cancel() {
        $('#ModuleModal').modal('toggle');
      }
    
      $("#edit_module").submit(function(event){
        event.preventDefault();
        var post_url = $(this).attr("action");
        var request_method = $(this).attr("method");
        var form_data = $(this).serialize();
        $.ajax({
          url : post_url,
          type: request_method,
          data : form_data,
          success: function(response){
            table.ajax.reload();
            toastr["success"]("modification effectué");
    
            $('#ModuleModal').modal('toggle');},
           
        }
        );
    });
    toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": 300,
              "hideDuration": 1000,
              "timeOut": 5000,
              "extendedTimeOut": 1000,
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"}