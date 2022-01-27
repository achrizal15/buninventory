!function ($) {
  "use strict";

  var DynamicTable = function () { };

  // Init plugin demo and examples
  DynamicTable.prototype.init = function () {
    // basic datatable with default features
    $('#datatable-basic').DataTable();
    
    // datatable with scrolling
    $('#datatable-basic-scrolling').DataTable({
      scrollY: "300px",
      scrollCollapse: true,
      paging: false
    });

    // datatable with export features
    $('#datatable-export').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'print',
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
      ]
    });

    // datatable with column filter enabled
    var elTable = $('#datatable-column-filter');
    var dtTable = elTable.DataTable({ // use DataTable, not dataTable
      sDom: // redefine sDom without lengthChange and default search box
        "t"+
        "<'row'<'col-sm-6'i><'col-sm-6'p>>"
    }); 

    elTable.find('thead').append('<tr class="row-filter"><th></th><th></th><th></th></tr>');
    elTable.find('thead .row-filter th:first-child')
    .html('<input type="text" class="form-control form-control-sm" placeholder="Search...">');

    elTable.find('thead .row-filter th:nth-child(2)')
    .html('<input type="text" class="form-control form-control-sm" placeholder="Search...">');
    

    elTable.find('thead .row-filter th:nth-child(3)')
    .html('<input type="range" class="custom-range" value="700" min="300" max="700">');

    elTable.find('.row-filter input[type="text"]').on('keyup change', function() {
      dtTable
        .search(this.value)
        .draw();
    });

    /* Custom filtering for range input */
    $.fn.dataTable.ext.search.push(
      function( settings, data, dataIndex ) {
          var inputVal = parseInt( elTable.find('.row-filter input[type="range"]').val(), 10 );
          var colVal = parseFloat( data[2] ) || 0; // index 2 for Visits column

          if(colVal <= inputVal) return true;
          return false;
      }
    );

    elTable.find('.row-filter input[type="range"]').on('input', function() {
      dtTable.draw();
    });
    
    // datatable column with reorder extension
    $('#datatable-column-reorder').DataTable({
      pageLength: 5,
      lengthChange: true,
      pagingType: "full_numbers",
      sDom: "RC"+
        "t"+
        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
      colReorder: true,
    });
  },

  $.DynamicTable = new DynamicTable, $.DynamicTable.Constructor =  DynamicTable
}(window.jQuery),

function ($) {
  "use strict";

  $.DynamicTable.init();
}(window.jQuery);