var base_url = $("meta#base_url").attr("content");
// console.clear()
let produkTypeHandler = function () {
   if ($("#produk-table").length > 0) {
      $(document).on("click", "#delete-produk", function () {
         let id = $(this).data("id")
         let tr= $(this).parents("tr");
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  type: "post",
                  url: base_url + "produkcontroller/delete",
                  data: { "id": id },
                  dataType: "json",
                  success: function (response) {
                     Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                     )
                   tr.remove();
                  }
               });

            }
         })
      })
   }
}
$(document).ready(function () {
   produkTypeHandler();
});