!function ($) {
  "use strict";

  var PanelFeatures = function () { };

  // Init demo and examples
  PanelFeatures.prototype.init = function () {
    // panel remove
    $('.card .btn-remove').click(function(e){

      e.preventDefault();
      $(this).parents('.card').fadeOut(300, function(){
        $(this).remove();
      });
    });

    // panel collapse/expand
    var affectedElement = $('.card-body');
    $('.card .btn-toggle-collapse').clickToggle(
      function(e) {
        e.preventDefault();

        // if has scroll
        if( $(this).parents('.card').find('.slimScrollDiv').length > 0 ) {
          affectedElement = $('.slimScrollDiv');
        }

        $(this).parents('.card').find(affectedElement).slideUp(300);
        $(this).find('i').toggleClass('fa-minus fa-plus');
      },
      function(e) {
        e.preventDefault();

        // if has scroll
        if( $(this).parents('.card').find('.slimScrollDiv').length > 0 ) {
          affectedElement = $('.slimScrollDiv');
        }

        $(this).parents('.card').find(affectedElement).slideDown(300);
        $(this).find('i').toggleClass('fa-minus fa-plus');
      }
    );

    // panel quick note
    $('.quick-note-create textarea, .quick-note-create input').on( 'focusin', function() {
      $(this).attr('rows', 7);
      $('.card-quick-note').find('.card-footer').css('display', 'flex');
    });

    // panel quick note create and edit
    $('.quick-note-create').on( 'focusout', function() {
      $(this).find('textarea').attr('rows', 1);
      $(this).find('.card-footer').hide();
    });

    $('.quick-note').on( 'click', function() {
      var noteModal = $('.quick-note-modal');
      noteModal.modal()
      .on('shown.bs.modal', function() {
        $(this).find('.btn-save').on('click', function() {
          noteModal.modal('toggle');
        });
        
      });
    });

    // panel upload
    Dropzone.autoDiscover = false;
    
    $('#panel-upload').dropzone({
      url: "#",
      addRemoveLinks : true,
      maxFilesize: 0.5,
      maxFiles: 5,
      acceptedFiles: 'image/*, application/pdf, .txt',
      dictResponseError: 'File Upload Error.'
    });
    
    // panel refresh
    $('.btn-panel-refresh').on('click', function() {
      $('.overlay-refresh').fadeIn(300);

      setTimeout( function() {
        $('.overlay-refresh').fadeOut(300);
      }, 1500);
    });
  },

  $.PanelFeatures = new PanelFeatures, $.PanelFeatures.Constructor =  PanelFeatures

  // toggle function
  $.fn.clickToggle = function( f1, f2 ) {
    return this.each( function() {
      var clicked = false;
      $(this).bind('click', function() {
        if(clicked) {
          clicked = false;
          return f2.apply(this, arguments);
        }

        clicked = true;
        return f1.apply(this, arguments);
      });
    });
  };
  
}(window.jQuery),

function ($) {
  "use strict";

  $.PanelFeatures.init();
}(window.jQuery);