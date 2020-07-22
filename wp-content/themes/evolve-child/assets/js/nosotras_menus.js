
"use strict";

jQuery(document).ready(function($) {
  var displayMenu = function() {
    $('body').addClass('menu-open');
    $('.nav-menu').addClass('d-md-block');
    $('.side-menu').addClass('active');
  };

  var closeMenu = function() {
    $('body').removeClass('menu-open');
    $('.nav-menu').removeClass('d-md-block');
    $('.side-menu').removeClass('active');
  };

  var addMenuActions = function () {
    $('.ham-icon').click(function () {
      displayMenu();
    });
    $('.menu-close-icon').click(function() {
      closeMenu();
    });
  };

  addMenuActions();

  // Move sticky header alongside admin dashboard
  $(window).scroll(function(e) {
    var dashboardHeight = $('#wpadminbar').height();
    var headerTop = $(window).scrollTop() < dashboardHeight ?
      dashboardHeight - $(window).scrollTop() : 0;
    $('.admin-bar .header-v2').css('top', headerTop + 'px');
  });
});
