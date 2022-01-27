!function ($) {
  "use strict";

  var Wizard = function () { };

  // Init plugin demo and examples
  Wizard.prototype.init = function () {
    $('#demo-wizard').wizard()
    .on('actionclicked.fu.wizard', function(e, data) {
      //validation
      if( $('#form'+data.step).length ) {
        var parsleyForm = $('#form'+data.step).parsley();
        parsleyForm.validate();

        if( !parsleyForm.isValid() )
          return false;
      }
      
      var btnNext = $(this).find('.btn-next');

      if(data.step === 3 && data.direction == 'next') {
        btnNext.text(' Create My Account')
        .prepend('<i class="fa fa-check-circle"></i>')
        .removeClass('btn-primary').addClass('btn-success');
      }else{
        btnNext.text('Next ')
        .append('<i class="fa fa-arrow-right"></i>')
        .removeClass('btn-success').addClass('btn-primary');
      }
    }).on('finished.fu.wizard', function(){
      Swal.fire({
        title: 'Awesome!',
        text: 'Your account has been created',
        type: 'success'
      });
    });
  },

  $.Wizard = new Wizard, $.Wizard.Constructor =  Wizard
}(window.jQuery),

function ($) {
  "use strict";

  $.Wizard.init();
}(window.jQuery);