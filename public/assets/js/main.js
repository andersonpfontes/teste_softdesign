$(document).ready(function () {
  $("#table_books").DataTable({
    aaSorting: [],
    responsive: true,

    columnDefs: [
      {
        responsivePriority: 1,
        targets: 0 },

      {
        responsivePriority: 2,
        targets: -1 }] });




  $(".dataTables_filter input").
  attr("placeholder", "Busca por livros...").
  css({
    width: "300px",
    display: "inline-block" });


  $('[data-toggle="tooltip"]').tooltip();
});