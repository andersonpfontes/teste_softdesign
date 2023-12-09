<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script  src="<?php echo base_url('/assets/js/main.js'); ?>"></script>

<script>
  $(document).ready(function(){
        $('.confirm_delete').click(function (e) {
          e.preventDefault();
          var payload = {
            id: id = $(this).data("id")
          }
          swal({
            title: "Você tem certeza ?",
            text: "Uma vez excluído, você não poderá recuperar este registro",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  type : "POST",
                  url : "<?php echo base_url('books/destroy/');?>",
                  data : payload,
                  async : false,
                  cache : false,
                  dataType : 'json',
                  success : function(response){
                      swal(response.status, {
                        icon: response.icon,
                      })
                      .then((value) => {
                        window.location.reload();
                      });
                  }
                });

              } else {
                swal("Seu registro está seguro!");
              }
            });
        });

        $('.confirm_edit').click(function (e) {
          e.preventDefault();

          var payload = {
            id: id = $(this).data("id")
          }

          $.ajax({
            type : "POST",
            url : "<?php echo base_url('books/findOnly/');?>",
            data : payload,
            async : false,
            cache : false,
            dataType : 'json',
            success : function(response){
              $('.form').attr('action', '<?php echo base_url('books/edit/');?>');
              $("#btnResource").text('Atualizar');
              $("#id").val(response.book.id);
              $("#title").val(response.book.title);
              $("#description").val(response.book.description);
              $("#author").val(response.book.author);
              $("#number_pages").val(response.book.number_pages);
            }
          });
        });
    });
</script>

</body>
</html>
