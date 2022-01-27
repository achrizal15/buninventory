/*
Template Name: Klorofil Pro - Bootstrap 4 Admin Dashboard Template
Author: The Develovers
Version: 2.0.0
Website: https://themeineed.com/
Contact: support@themeineed.com
*/

!function ($) {
  "user strict";

  var Components = function () { };

  /**
  Initialize tooltip
  */
  Components.prototype.initBootstrapTooltip = function () {
    $.fn.tooltip && $('[data-toggle="tooltip"]').tooltip()
  },

  /**
  Initialize Popover
  */
  Components.prototype.initBootstrapPopover = function () {
    $.fn.popover && $('[data-toggle="popover"]').popover()
  },

  /**
  Initialize Content Menu
  */

  Components.prototype.initContentMenu = function () {
    $('.btn-open-content-menu').on('click', function() {
			$('.content-menu-left').css('left', 0);
		});

		$('.btn-close-content-menu').on('click', function() {
			$('.content-menu-left').css('left', -300);
		});

		$('.inbox-list-message > li').on('click', function() {
			$('.content-right').show('medium');
		});

		$('.btn-close-content-right').on('click', function() {
			$('.content-right').hide('medium');
		});
  }

  /**
  Initialize all
  */
  Components.prototype.init = function () {
    var $this = this;
    this.initBootstrapTooltip();
    this.initBootstrapPopover();
    this.initContentMenu();
  },

  $.Components = new Components, $.Components.Constructor = Components

}(window.jQuery),

function ($) {
  "use strict";

  var App = function () {
    this.body = $('body'),
    this.window = $('window')
  };

  /**
  Initialize sidebar
  */

  App.prototype.initSidebar = function () {
    var $this = this;

    $('.btn-toggle-minified').on('click', function() {
      $this.body.toggleClass('sidebar-minified');
  
      // toggle collapse functionality
      if($('body').hasClass('sidebar-minified')) {
        $('.sidebar a[data-toggle]').attr('data-toggle', "");
      } else {
        $('.sidebar a[data-toggle]').attr('data-toggle', "collapse");
      }
    });
  },

  /**
  Initialize layout functions
  */

  App.prototype.initLayoutFunctions = function () {
    // toggle fullwidth
    $('.btn-toggle-fullwidth').on('click', function() {
      if(!$('body').hasClass('layout-fullwidth')) {
        $('body').addClass('layout-default');
        $('body').addClass('layout-fullwidth');
      } else {
        $('body').removeClass('layout-fullwidth');
        $('body').removeClass('layout-default');
      }

      if($(window).innerWidth() < 1025) {
        if(!$('body').hasClass('offcanvas-active')) {
          $('body').addClass('offcanvas-active');
        } else {
          $('body').removeClass('offcanvas-active');
        }
      }
    });

    var defaultLayout = '', navbarHeight, footerHeight;
  
    // check if layout origin/default is minified
    if($('body').hasClass('sidebar-minified')) {
      defaultLayout = 'minified';
      $('.sidebar a[data-toggle="collapse"]').attr('data-toggle', "");
    }

    $(window).on('load', function() {
      // adjust right sidebar top position
      $('.right-sidebar').css('top', $('.navbar').innerHeight());
  
      // if page has content-menu, set top padding of main-content
      if($('.has-content-menu').length > 0) {
        $('.navbar + .main-content').css('padding-top', $('.navbar').innerHeight());
      }
  
      // for shorter main content
      if($('.main').innerHeight() < $('#sidebar-nav').innerHeight()) {
        $('.main').css('min-height', $('#sidebar-nav').innerHeight());
        navbarHeight = $('.navbar').innerHeight();
        $('.main-content').css('height', 'calc(100vh - ' + navbarHeight + 'px)');
        $('footer').css('position', 'absolute');
      }
  
      // make full height for layout top navigation
      if($('body').hasClass('layout-topnav')) {
        footerHeight = $('footer').innerHeight();
        $('.main').css('min-height', 'calc(100vh - ' + footerHeight + 'px)');
      }
    });

    $(window).on('load resize', function() {
      if($(this).innerWidth() < 1025) {
        if(defaultLayout === 'minified'){
          // remove minified sidebar mode
          $('body').removeClass('sidebar-minified'); 
          $('.brand img.logo').attr('src', 'assets/images/logo-white.png');
          $('.sidebar a[data-toggle=""]').attr('data-toggle', "collapse");
        }
      } else if(!$('body').hasClass('layout-default')){
        $('body').removeClass('layout-fullwidth');
  
        if(defaultLayout === 'minified') {
          // set back to minified sidebar mode
          $('body').addClass('sidebar-minified');
          $('.sidebar a[data-toggle="collapse"]').attr('data-toggle', "");
        }
      }
  
      // handle navbar dropdown submenu on mobile view
      $('.navbar-nav .dropdown-sub [data-toggle="dropdown"]').on('click', function(e) {
        $(this).parent().toggleClass('open');
        e.preventDefault();
        e.stopPropagation();
      });
    });

    // search form
    $('.search-form input[type="text"]')
    .on('focus', function() {
      $(this).animate({
        width: '+=50px'
      }, 300);
    })
    .on('focusout', function() {
      $(this).animate({
        width: '-=50px'
      }, 300);
    });

  },


  /**
  Initialize right sidebar toggle
  */
 
  App.prototype.initRightSidebarToggle = function () {
    $('.btn-toggle-rightsidebar').on('click', function() {
      if(!$('.right-sidebar').hasClass('active')) {
        $('.right-sidebar').addClass('active');
      } else {
        $('.right-sidebar').removeClass('active');
      }
    });
  },

  App.prototype.init = function () {
    var $this = this;
    this.initSidebar();
    this.initLayoutFunctions();
    this.initRightSidebarToggle();
    $.Components.init();
  },

  $.App = new App, 
  $.App.Constructor = App

}(window.jQuery),


// init main app module
function ($) {
  "use strict";
  $.App.init();
}(window.jQuery);