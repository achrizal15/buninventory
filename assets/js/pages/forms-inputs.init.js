!function ($) {
  "use strict";

  var FormsInputs = function () { };

  // Init plugin demo and examples
  FormsInputs.prototype.init = function () {
    // autocomplete
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];

    $("#input-autocomplete" ).autocomplete({
      source: availableTags
    });

    // password toggle and strength
    $('#password-showhide').hideShowPassword({
      innerToggle: true
    });

    $('#password-showhide2').hideShowPassword({
      innerToggle: true,
      toggle: {
        className: 'hideShowPassword-toggle toggle-eye'
      },
      states: {
        shown: {
          toggle: {
            content: '<i class="fa fa-eye-slash">'
          }
        },
        hidden: {
          toggle: {
            content: '<i class="fa fa-eye">'
          }
        }
      }
    });

    $('#password-strength').pwstrength({
      ui: {
        container: '#password-strength-container',
        showVerdictsInsideProgressBar: true,
        viewports: {
          verdict: ".pwstrength_viewport_verdict"
        }
      }
    });

    $('#password-strength2').pwstrength({
      ui: {
        showStatus: true,
        showProgressBar: false,
      }
    });

    // masked input
    $('#phone').mask('(999) 999-9999');
    $('#phone-ex').mask('(999) 999-9999? x99999');
    $('#tax-id').mask('99-9999999');
    $('#ssn').mask('999-99-9999');
    $('#product-key').mask('a*-999-a999');

    // switchery
    var switchOptions = {},
      switchColors = {
        'orange': '#F89B03',
        'purple': '#AB7DF6',
        'yellow': '#F3BB23',
        'red': '#ff4402',
        'blue': '#45AEEF'
      }
    $('.js-switch').each(function() {
      if($(this).data("size")) switchOptions.size = $(this).data("size");

      var color = $(this).data("color");
      if(switchColors[color] !== undefined) {
        switchOptions.color = switchColors[color];
      } else {
        switchOptions.color = color;
      }

      var switchery = new Switchery($(this)[0], switchOptions);
      switchOptions = {};
    });

    $('#btn-check-click').on('click', function() {
      alert($('#switch-check-click').prop('checked'));
    });

    $('#label-check-change').text($('#switch-check-change').prop('checked'));

    $('#switch-check-change').on('change', function() {
      $('#label-check-change').text($(this).prop('checked'));
    });
    
  },

  $.FormsInputs = new FormsInputs, $.FormsInputs.Constructor =  FormsInputs
}(window.jQuery),

function ($) {
  "use strict";

  $.FormsInputs.init();
}(window.jQuery);