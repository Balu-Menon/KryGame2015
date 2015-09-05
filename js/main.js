var lastScrollTop = 0;
$(window).scroll(function(event){
  var socialOffsetY = $('.page-footer').offset().top;
  if (navLock)
    return false;

  var wt = $(window).height();
  var st = $(this).scrollTop();
  if (st > lastScrollTop){ //if scrolling down
    $("#main-nav").removeClass('scroll-nav');
    $("#main-nav").removeClass('init-nav');
  }
   else if (st < wt/2){ //if at top section
    $("#main-nav").removeClass('scroll-nav');
    $("#main-nav").addClass('init-nav');
  }
   else { //if scrolling up
    $("#main-nav").addClass('scroll-nav');
  }
  lastScrollTop = st;

/*    //social thing a the bottom
    var wt = $(window).height();
    var footMargin = $(document).height() - socialOffsetY;
    var sst = $(this).scrollTop();
    if ((sst + wt) > ($(document).height() - footMargin)){
      $('#social').css({'bottom':((sst + wt) - ($(document).height() - footMargin) + 20) + 'px'});
      $('#social').addClass('no-trans');
    }else{
      $('#social').removeAttr('style');
      $('#social').removeClass('no-trans');
    }*/
  });
$(document).on('click','#nav-ornament',function(){
  if (!navLock){
    $("#main-nav").toggleClass('scroll-nav');
  }
});

/*//HASH FUNCTION - to scroll to section on nav anchor click
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 500);
        closePopdown();
      }
    }
  });
});
*/