$(document).ready(function () {
  $(".button.twitter").click(function (event) {
    var element = $(this);
    var width = 575,
      height = 400,
      left = ($(window).width() - width) / 2,
      top = ($(window).height() - height) / 2,
      url = "https://twitter.com/intent/tweet?url=" + element.attr('url'),
      options = 'status=1' +
                 ',width='  + width  +
                 ',height=' + height +
                 ',top='    + top    +
                 ',left='   + left;

      window.open(url, "twitter", options);
  });
});
