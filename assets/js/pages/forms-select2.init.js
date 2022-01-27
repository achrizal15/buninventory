!function ($) {
  "use strict";

  var Select2 = function () { };

  // Init plugin demo and examples
  Select2.prototype.init = function () {
    // basic
    $('.select-basic').select2();

    $('.select-multiple-basic').select2();

    // with placeholder
    $('#select-placeholder-single').select2({
      placeholder: 'Select a state',
      allowClear: true
    });
    
    $('#select-placeholder-multiple').select2({
      placeholder: 'Select a state'
    });

    // tagging support
    $('#select-tag').select2({
      tags: true
    });

    $('#select-tag-token').select2({
      tags: true,
      tokenSeparators: [' ']
    });
  },

  $.Select2 = new Select2, $.Select2.Constructor =  Select2
}(window.jQuery),

function ($) {
  "use strict";

  $.Select2.init();
}(window.jQuery);