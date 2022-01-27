!function ($) {
  "use strict";

  var Multiselect = function () { };

  // Init plugin demo and examples
  Multiselect.prototype.init = function () {
    // options to support Bootstrap 4
    var defaultOptions = {
      buttonClass: 'btn btn-outline-light',
      buttonContainer : '<div class="dropdown" />',
      templates: {
        li: '<li class="dropdown-item"><a><label></label></a></li>',
        ul: '<ul class="multiselect-container dropdown-menu p-1 m-0"></ul>',
        filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></span><input class="form-control multiselect-search" type="text"></div></li>',
        filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="fa fa-times"></i></button></span>',
      }
    }
    $('#multiselect1, #multiselect2, #single-selection, #multiselect5, #multiselect6')
    .multiselect(defaultOptions);

    var includeAllOptions = Object.assign({
      includeSelectAllOption: true
    }, defaultOptions);
    $('#multiselect3-all').multiselect(includeAllOptions);

    var enableFilterOptions = Object.assign({
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
      maxHeight: 200
    }, defaultOptions);
    $('#multiselect4-filter').multiselect(enableFilterOptions);

    var defaultOptionsCopy = Object.assign({}, defaultOptions);
    var smallOptions = Object.assign(defaultOptionsCopy, {
      buttonClass: "btn btn-outline-light btn-sm",
    });
    $('#multiselect-size').multiselect(smallOptions);

    //defaultOptionsCopy = 
    var colorOptions = Object.assign(defaultOptionsCopy, {
      buttonClass: "btn btn-primary",
    });
    $('#multiselect-color').multiselect(colorOptions);

    var linkOptions = Object.assign({
      buttonClass: "btn btn-link",
    }, defaultOptions);
    $('#multiselect-link').multiselect(linkOptions);

    var color2Options = Object.assign({
      buttonClass: "btn btn-success",
    }, defaultOptions);
    $('#multiselect-color2').multiselect(color2Options);

  }

  $.Multiselect = new Multiselect, $.Multiselect.Constructor =  Multiselect
}(window.jQuery),

function ($) {
  "use strict";

  $.Multiselect.init();
}(window.jQuery);