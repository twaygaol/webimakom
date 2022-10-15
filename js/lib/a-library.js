$( document ).ready(function() {
  $("#loader").removeClass("loader-visible");
});

$('a[href*="#"]')
.not('[href="#"]')
.not('[href="#0"]')
.click(function(event)
{
if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && 
  location.hostname == this.hostname)
{
  var target = $(this.hash);
  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
  if (target.length)
  {
      event.preventDefault();
      $('html, body').animate({scrollTop: target.offset().top}, 1000, function() {
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) return false;
          else
          {
              $target.attr('tabindex','-1');
              $target.focus();
          };
      });
  }
}
});

$("#mobile-nav,.menu-item").click(function(event) {
  $(this).toggleClass("open");
  $(".menu").toggleClass("open");
});

$(".menu-item").click(function(event) {
  $("#loader").addClass("loader-visible");
})

$(window).scroll(function (event) {
  var pos = $(window).scrollTop();

  if (pos > 150) $('nav').addClass('nav-fixed');
  else $('nav').removeClass('nav-fixed');
});