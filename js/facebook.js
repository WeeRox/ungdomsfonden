$(document).ready(function () {
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '142231643044953',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.10'
    });
    FB.AppEvents.logPageView();

    $('.facebook').on('click', function() {
      FB.ui({
        method: 'share',
        href: window.location.href
      }, function(response){});
    });

  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
});
