$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
table = $('#User_table').DataTable({ 
 
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
  "url": "/get_users",
  "type": "post",
  },
      "columnDefs": [ {
            "targets": [4],
            "data": null,
            render: function(data, type, row) {
              return "<button type='button' class='btn btn-danger btn-sm'  onclick='supp("+row[0]+")'>Supprimer</button> <button class='btn btn-sm btn-primary edit' onclick='editform("+row[0]+")'>Modifier</button>";
            }
        } ]
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
          url : '/destroyu/'+id,
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
    $('#exampleModal').modal('toggle');
    $.ajax({
      url : "/get_user",
      type: "POST",
      data : { id: id }
    })
    .done(function(response){
      console.log(response[0])
      $('#nommodif').val(response[0].lastname);
      $('#emailmodif').val(response[0].email);
      $('#prenommodif').val(response[0].name);
      $('#telmodif').val(response[0].tel);
      $('#datenmodif').val(response[0].datN);
      $('#datedmodif').val(response[0].datedebut);
      if (response[0].genre === 'male') {
        $('#malemodif').prop('checked', true);
      }else{$('#femalemodif').prop('checked', true);}

      if (response[0].fonction === 'administrateur') {
        $('#administrateur').prop('selected', true);
      }else if (response[0].fonction === 'secretaire') {
        $('#secretaire').prop('selected', true);
      }else if (response[0].fonction === 'etudiant') {
        $('#etudiant').prop('selected', true);
      }else if (response[0].fonction === 'prof') {
        $('#prof').prop('selected', true);
      }
      
      $('#id').val(response[0].id);
    });
  }
  function cancel() {
    $('#exampleModal').modal('toggle');
  }

  $("#edit_user").submit(function(event){
    
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
        $('#exampleModal').modal('toggle');},
        
        error: function(response){
          toastr["error"]("email invalide")
      }
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





