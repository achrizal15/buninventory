!function ($) {
  "use strict";

  var AppViewsProjects = function () { };

  AppViewsProjects.prototype.init = function () {
    if($('.progress-chart').length > 0) {
      $('.progress-chart').easyPieChart({
        size: 110,
        barColor: '#45AEEF',
        trackColor: 'rgba(160, 174, 186, .2)',
        scaleColor: false,
        lineWidth: 6,
        lineCap: "round",
        animate: 800
      });
    }
    
    if($('.project-accordion').length > 0) {
      // accordion toggle collapse
      $('.project-accordion [data-toggle="collapse"]').on('click', function() {
        $(this).find('.toggle-icon').toggleClass('fa-minus-circle fa-plus-circle');
      });
    }
  },

  $.AppViewsProjects = new AppViewsProjects, $.AppViewsProjects.Constructor =  AppViewsProjects
}(window.jQuery),

function ($) {
  "use strict";

  $.AppViewsProjects.init();
}(window.jQuery);