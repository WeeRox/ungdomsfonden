$(document).ready(function(){
  $('a[href^="#"]:not([href="#"])').on('click', function (event) {

    $('html, body').animate({
      scrollTop: $('[id="'+ event.target.hash.substr(1) + '"]').offset().top
    }, 800);

    event.preventDefault();
  });
});
