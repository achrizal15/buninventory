!function ($) {
  "use strict";

  var InputPickers = function () { };

  // Init plugin demo and examples
  InputPickers.prototype.init = function () {
    // inline picker
    $('.inline-datepicker').datepicker({
      todayHighlight: true
    });
    
    // colorpicker
    $('#demo-colorpicker1').colorpicker();

    $('#demo-colorpicker2').colorpicker({
      format: 'rgba'
    });

    $('#demo-colorpicker3, #demo-colorpicker32').colorpicker({
      addon: '.input-group-append',
    });

    $('#demo-colorpicker4').colorpicker({
      extensions: [
        {
          name: 'swatches',
          options: {
            colors: {
              'black': '#000000',
              'gray': '#888888',
              'white': '#ffffff',
              'red': 'red',
              'default': '#777777',
              'primary': '#337ab7',
              'success': '#5cb85c',
              'info': '#5bc0de',
              'warning': '#f0ad4e',
              'danger': '#d9534f'
            },
            namesAsValues: true
          }
        }
      ]
    });

    $('#colorpicker-inline').colorpicker({
      color: '#41B314',
      container: true,
      inline: true
    });

    // clockpicker
    $('.basic-clockpicker').clockpicker({
      donetext: 'DONE',
    });

    var input = $('#single-input').clockpicker({
      placement: 'top',
      autoclose: true,
      'default': 'now'
    });

    $('#check-minutes').click(function(e){
      // Have to stop propagation here
      e.stopPropagation();
      input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
  },

  $.InputPickers = new InputPickers, $.InputPickers.Constructor =  InputPickers
}(window.jQuery),

function ($) {
  "use strict";

  $.InputPickers.init();
}(window.jQuery);