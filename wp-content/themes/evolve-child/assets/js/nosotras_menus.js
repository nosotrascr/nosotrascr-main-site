
"use strict";

jQuery(document).ready(function($) {
  var displayMenu = function(event) {
    $('body').addClass('menu-open');
    $('.side-menu').addClass('active');
    event.stopPropagation();
  };

  var closeMenu = function() {
    $('body').removeClass('menu-open');
    $('.side-menu').removeClass('active');
  };

  var addMenuActions = function () {
    $('.ham-icon').click(function (event) {
      if ($('body').hasClass('menu-open')) {
        closeMenu();
      } else {
        displayMenu(event);
      }
    });
    $('.menu-close-icon').click(function() {
      closeMenu();
    });
  };

  addMenuActions();

  // Close menu when clicking outside of it
  $(document).click(function(event) {
    var sideMenu = $('.side-menu').get(0);
    var isMenuOpen = $('body').hasClass('menu-open');

    if (isMenuOpen && !sideMenu.contains(event.target)) {
      closeMenu();
    }
  }); 

  // Move sticky header alongside admin dashboard
  $(window).scroll(function(e) {
    var dashboardHeight = $('#wpadminbar').height();
    var headerTop = $(window).scrollTop() < dashboardHeight ?
      dashboardHeight - $(window).scrollTop() : 0;
    $('.admin-bar .header-v2').css('top', headerTop + 'px');
  });
});
