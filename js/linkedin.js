$(document).ready(function () {
  $(".linkedin").click(function (event) {
    var element = $(this);
    var width = 575,
      height = 400,
      left = ($(window).width() - width) / 2,
      top = ($(window).height() - height) / 2,
      url = "https://www.linkedin.com/shareArticle?url=" + window.location.href + "&mini=true",
      options = 'status=1' +
                 ',width='  + width  +
                 ',height=' + height +
                 ',top='    + top    +
                 ',left='   + left;

      window.open(url, "twitter", options);
  });
});
