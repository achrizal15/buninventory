!function ($) {
  "use strict";

  var Notifications = function () { };

  // Init plugin demo and examples
  Notifications.prototype.init = function () {
    toastr.options.toastClass = "toastr-plugin"; // must be set to avoid class conflict with Bootstrap
    toastr.options.timeOut = "false";
    toastr.options.closeButton = true;
    toastr['info']('Hi there, this is notification demo with HTML support. So, you can add HTML elements like <a href="#">this link</a>');
    
    // contextual and positions
    $('.btn-toastr').on('click', function() {
      var context = $(this).attr('data-context');
      var message = $(this).data('message');
      var position = $(this).data('position');
      var positionClass;

      if(context === '') {
        context = 'info';
      }

      if(position === '') {
        positionClass = 'toast-left-top';
      } else {
        positionClass = 'toast-' + position;
      }

      toastr.remove();
      toastr[context](message, '' , { positionClass: positionClass });
    });

    // callbacks
    $('#toastr-callback1').on('click', function() {
      var message = $(this).attr('data-message');

      toastr.options = {
        "timeOut": "300",
        "onShown": function() { alert('onShown callback'); },
        "onHidden": function() { alert('onHidden callback'); }
      };

      toastr['info'](message);
    });

    $('#toastr-callback2').on('click', function() {
      var message = $(this).attr('data-message');

      toastr.options = {
        "timeOut": "10000",
        "onclick": function() { alert('onclick callback'); },
      };

      toastr['info'](message);

    });

    $('#toastr-callback3').on('click', function() {
      var message = $(this).attr('data-message');

      toastr.options = {
        "timeOut": "10000",
        "closeButton": true,
        "onCloseClick": function() { alert('onCloseClick callback'); }
      };

      toastr['info'](message);
    });

    
    // Toastr by Bootstrap 
    $('#btn-basic').on('click', function() {
      $('#toastr-bs-basic').toast("show");
    });

    $('#btn-autohide').on('click', function() {
      $('#toastr-bs-autohide').toast("show");
    });

    $('#btn-hasimage').on('click', function() {
      $('#toastr-bs-hasimage').toast("show");
    });
    
  },

  $.Notifications = new Notifications, $.Notifications.Constructor =  Notifications
}(window.jQuery),

function ($) {
  "use strict";

  $.Notifications.init();
}(window.jQuery);