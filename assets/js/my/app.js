var base_url = $("meta#base_url").attr("content");
console.clear()
let distributorTypeHandler = function () {
   if ($("#distributor-table").length > 0) {
      $(document).on("click", "#delete-distributor", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
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
                  url: base_url + "distributorcontroller/delete",
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
let produkTypeHandler = function () {
   if ($("#produk-table").length > 0) {
      $(document).on("click", "#delete-produk", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
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
let gudangSatuanTypeHandler = function () {
   if ($("#gudang-table").length > 0) {
      $(document).on("click", "#edit-gudang", function () {
         let id = $(this).data("id")
         let kode = $(this).parents("tr").find("td:eq(0)").text();
         let nama = $(this).parents("tr").find("td:eq(1)").text();
         $("#gudang-form input[name='kode']").val(kode)
         $("#gudang-form input[name='id']").val(id)
         $("#gudang-form input[name='nama']").val(nama)
         $("#gudang-form").attr("action", base_url + "gudangcontroller/edit/" + id);
      })
      $(document).on("click", "#edit-satuan", function () {
         let id = $(this).data("id")
         let nama = $(this).parents("tr").find("td:eq(0)").text();
         $("#satuan-form input[name='id']").val(id)
         $("#satuan-form input[name='nama']").val(nama)
         $("#satuan-form").attr("action", base_url + "satuancontroller/edit/" + id);
      })
      $(document).on("click", "#add-satuan", function () {
         $("#satuan-form input[name='id']").val("")
         $("#satuan-form input[name='nama']").val("")
         $("#satuan-form").attr("action", base_url + "satuancontroller/add/");
      })
      $(document).on("click", "#add-gudang", function () {
         $("#gudang-form input[name='kode']").val("")
         $("#gudang-form input[name='id']").val("")
         $("#gudang-form input[name='nama']").val("")
         $("#gudang-form").attr("action", base_url + "gudangcontroller/add/");
      })
      $(document).on("click", "#delete-satuan", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
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
                  url: base_url + "satuancontroller/delete",
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
      $(document).on("click", "#delete-gudang", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
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
                  url: base_url + "gudangcontroller/delete",
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
let stokMasukTypeHandler = function () {
   if ($("#form-stok-masuk").length > 0) {
      let date = new Date()
      if (!$("#form-stok-masuk input[name='faktur']").val()) {
         $("#form-stok-masuk input[name='faktur']").val("STI" + date.getSeconds() + date.getDay() + date.getMonth() + 1 + date.getYear())
      }
      $(document).on("change", "#select-produk", function () {
         let this_value = $(this).val()
         $.ajax({
            type: "get",
            url: base_url + "trstokmasukcontroller/get_any/produk/" + this_value,
            dataType: "json",
            success: function (response) {
               $("#form-stok-masuk input[name='stok_awal']").val(response.qty)
               $("#form-stok-masuk #stok-final").val(response.qty)
               $("#form-stok-masuk input[name='qty']").val("")
            }
         });
      })
      $(document).on("keyup", "#form-stok-masuk input[name='qty']", function () {
         let stok_final = parseInt($("#form-stok-masuk #stok-final").val())
         let this_value = parseInt($(this).val())
         let total = stok_final + this_value;
         if (this_value) {
            $("#form-stok-masuk input[name='stok_awal']").val(total < 0 ? 0 : total)
         } else {
            $("#form-stok-masuk input[name='stok_awal']").val(stok_final < 0 ? 0 : stok_final)
         }

      })
   }
   if ($("#stokmasuk-table").length > 0) {
      $(document).on("click", "#delete-trstokmasuk", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
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
                  url: base_url + "trstokmasukcontroller/delete",
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
let stokKeluarTypeHandler = function () {
   if ($("#form-stok-keluar").length > 0) {
      let date = new Date()
      $("#form-stok-keluar input[name='faktur']").val("STO" + date.getSeconds() + 1 + date.getYear())
      if ($("#aksi").val("edit")) { 
         $("#form-stok-keluar input").attr("disabled", true)
         $("#form-stok-keluar textarea").attr("disabled", true)
         $("#form-stok-keluar select").attr("disabled", true)
       }
      $(document).on("change", "#select-produk", function () {
         let this_value = $(this).val()
         $.ajax({
            type: "get",
            url: base_url + "trstokkeluarcontroller/get_any/produk/" + this_value,
            dataType: "json",
            success: function (response) {
               $("#form-stok-keluar input[name='stok_awal']").val(response.qty)
               $("#form-stok-keluar #stok-final").val(response.qty)
               $("#form-stok-keluar input[name='qty']").val("")
            }
         });
      })
      $(document).on("keyup", "#form-stok-keluar input[name='qty']", function () {
         let stok_final = parseInt($("#form-stok-keluar #stok-final").val())
         let this_value = parseInt($(this).val())
         if (this_value) {
            if (this_value > stok_final) {
               $(this).val(stok_final < 0 ? 0 : stok_final)
               $("#form-stok-keluar input[name='stok_awal']").val(0)
            } else {
               $("#form-stok-keluar input[name='stok_awal']").val(stok_final - this_value)
            }
         } else {
            $("#form-stok-keluar input[name='stok_awal']").val(stok_final < 0 ? 0 : stok_final)
         }

      })
   }
   if ($("#stokkeluar-table").length > 0) {
      $(document).on("click", "#delete-trstokkeluar", function () {
         let id = $(this).data("id")
         let tr = $(this).parents("tr");
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
                  url: base_url + "trstokkeluarcontroller/delete",
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
   stokKeluarTypeHandler()
   stokMasukTypeHandler()
   gudangSatuanTypeHandler();
   distributorTypeHandler()
   produkTypeHandler();
});