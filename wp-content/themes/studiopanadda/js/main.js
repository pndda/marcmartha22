jQuery(document).ready(function ($) {

    // Slick slider
    if ($('.b-slider-wrap').length > 0) {
      $('.b-slider-wrap').slick();
    }
  
    // Venobox loaded

  
    // Open mobile menu
    $('.c-hamburger').click(function () {
      $(this).toggleClass('is-open');
      $('body').toggleClass('is-open-sidebar');
    });


     // Open menu
     $('.c-menu-btn').click(function () {
      $(this).toggleClass('is-open');
      $('body').toggleClass('is-open-menu');
    });

    
  
    // Calculate headerheight
    var headerHeight = $('.c-header').outerHeight();
    $('.headerHeight').css('height', headerHeight);
  
    $(window).scroll(function () {
      if ($(window).scrollTop() >= headerHeight) {
        $('.c-header').addClass('is-fixed');
      } else {
        $('.c-header').removeClass('is-fixed');
      }
    });
  
    // Default filter
    $('#filter').on("change", function (){
      var data = $('#filter').serialize();
      var url = '?' + data;
  
      history.pushState(false, false, url);
      window.location.reload()
    });
  
    // Default Cookiebanner
    const cookieName = 'cookieconsent';
    const cookieValue = 'dismissed';
  
    function dismiss() {
      const date = new Date();
      date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
      document.cookie = `${cookieName}=${cookieValue};expires=${date.toUTCString()};path=/`;
  
      document.querySelector('.js-cookie-banner').remove();
    }
  
    const buttonElement = document.querySelector('.js-cookie-dismiss');
    if (buttonElement) {
      buttonElement.addEventListener('click', dismiss);
    }

    const scroll = new LocomotiveScroll({
      el: document.querySelector('[data-scroll-container]'),
      smooth: true
  });

  });
  


  
  