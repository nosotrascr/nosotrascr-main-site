
"use strict";

jQuery(document).ready(function($) {
  var displayMenu = function() {
    $('.nav-menu').addClass('d-md-block');
    $('.side-menu').addClass('active');
  };

  var closeMenu = function() {
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
});
