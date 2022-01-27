!function ($) {
  "use strict";

  var DragDropPanel = function () { };

  // Init plugin demo and examples
  DragDropPanel.prototype.init = function () {
    $('.sortable-grid .sortable-item').sortable({
      connectWith: '.sortable-grid .sortable-item',
      handle: '.card-header',
      forcePlaceholderSize: true,
    }).disableSelection();
  },

  $.DragDropPanel = new DragDropPanel, $.DragDropPanel.Constructor =  DragDropPanel
}(window.jQuery),

function ($) {
  "use strict";

  $.DragDropPanel.init();
}(window.jQuery);