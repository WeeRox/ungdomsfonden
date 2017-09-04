$(function() {
  $('img.svg').each(function() {
    var img = $(this);
    var src = img.attr("src");

    $.get(src, function(data) {
      var svg = $(data).find("svg");
      img.replaceWith(svg);
    }, "xml");
  });
});
