!function ($) {
  "use strict";

  var DragDropUpload = function () { };

  // Init plugin demo and examples
  DragDropUpload.prototype.init = function () {
    // basic
    $('.dropify').dropify();

    // with event
    var drEvent = $('#dropify-event').dropify();
		drEvent.on('dropify.beforeClear', function(event, element) {
			return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
		});

		drEvent.on('dropify.afterClear', function(event, element) {
			alert('File deleted');
		});

    // custom message
		$('.dropify-fr').dropify({
			messages: {
				default: 'Glissez-déposez un fichier ici ou cliquez',
				replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
				remove:  'Supprimer',
				error:   'Désolé, le fichier trop volumineux'
			}
    });
    
  },

  $.DragDropUpload = new DragDropUpload, $.DragDropUpload.Constructor =  DragDropUpload
}(window.jQuery),

function ($) {
  "use strict";

  $.DragDropUpload.init();
}(window.jQuery);