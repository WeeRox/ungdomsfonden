$(document).ready(function () {
  $(".google-plus").click(function (event) {
    var element = $(this);
    var width = 600,
      height = 600,
      left = ($(window).width() - width) / 2,
      top = ($(window).height() - height) / 2,
      url = "https://plus.google.com/share?url=" + window.location.href,
      options = 'status=1' +
                 ',width='  + width  +
                 ',height=' + height +
                 ',top='    + top    +
                 ',left='   + left;

      window.open(url, "google-plus", options);
  });
});
