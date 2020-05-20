window.addEventListener('DOMContentLoaded', function() {

    let menuBtn = document.querySelector('.menu-btn'),
        mobileMenu = document.querySelector('.mobile-menu'),
        mobileMenuLinks = document.getElementsByClassName('mobile-menu__link'),
        header = document.querySelector('.header'),
        headerLogo = document.querySelector('.header-logo');

    menuBtn.addEventListener('click', function(event) {
      event.preventDefault();
      this.classList.toggle('menu-btn_active');
      mobileMenu.classList.toggle('df');
      header.classList.toggle('transparent');
      headerLogo.classList.toggle('dn');
      if(this.classList.contains('menu-btn_active')){
        document.getElementsByTagName('body')[0].style.overflowY = "hidden";
        document.getElementsByTagName('html')[0].style.overflowY = "hidden";
      }
      else{
        document.getElementsByTagName('body')[0].style.overflowY = "scroll";
        document.getElementsByTagName('html')[0].style.overflowY = "scroll";
      }
    });

    for (var i = 0; i < mobileMenuLinks.length; i++) {
      mobileMenuLinks[i].addEventListener('click', function(event) {
        menuBtn.classList.toggle('menu-btn_active');
        mobileMenu.classList.toggle('df');
        header.classList.toggle('transparent');
        headerLogo.classList.toggle('dn');
        document.getElementsByTagName('body')[0].style.overflowY = "scroll";
        document.getElementsByTagName('html')[0].style.overflowY = "scroll";
      });
    }

  // ЯКОРЯ
  $('.header-nav__link, .mobile-menu__link, .mobile-menu__btn, .header-btn, .app__link, .mvp__link, .web__link').on('click', function(event) {
    event.preventDefault();
    var id = $(this).attr('href'),
    top = $(id).offset().top - $('.header').height();
    $('body,html').animate({scrollTop: top}, 1000);
  });

  SmoothScroll({ stepSize: 40 });


});
