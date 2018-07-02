(($) => {
  AOS.init();

  $.each($('a[href^="#"]'), (index, anchor) => {
    $(anchor).click(e => {
      e.preventDefault();

      const targetID = $(anchor).attr('href');
      const offsetTop = $(targetID).offset().top;

      window.scrollTo({
        top: offsetTop - 30,
        behavior: "smooth"
      });
    });
  });

  $('.js-hamburger').click(() => {
    $('.js-menu-list').toggleClass('open');
    $('.js-hamburger').toggleClass('is-active');
  });

})(jQuery);
