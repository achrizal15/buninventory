!function ($) {
  "use strict";

  var FormsValidations = function () { };

  // Form validation init
  FormsValidations.prototype.init = function () {
    
    // Validation by Bootstrap
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);

    // Validation by Parsleyjs, initialized after multiselect
    $('#food').multiselect({
      buttonClass: 'btn btn-outline-light',
      buttonContainer : '<div class="dropdown" />',
      templates: {
        li: '<li class="dropdown-item"><a><label></label></a></li>',
        ul: '<ul class="multiselect-container dropdown-menu p-1 m-0"></ul>',
        filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></span><input class="form-control multiselect-search" type="text"></div></li>',
        filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="fa fa-times"></i></button></span>',
      }
    });
    $('#basic-form').parsley();
  },

  $.FormsValidations = new FormsValidations, $.FormsValidations.Constructor =  FormsValidations
}(window.jQuery),

function ($) {
  "use strict";

  $.FormsValidations.init();
}(window.jQuery);