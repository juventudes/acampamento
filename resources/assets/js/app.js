var $ = window.jQuery = require("../../../node_modules/jquery/dist/jquery");
require("../../../node_modules/jquery.maskedinput/src/jquery.maskedinput.js");

var analytics = require("./analytics");
var async = require("./async");

$(function() {
  var locale = $("html").attr("lang");
  if (locale === "pt") {
    locale = "pt_BR";
  } else if (locale === "en") {
    locale = "en_US";
  } else if (locale === "es") {
    locale = "es_LA";
  }

  // Google Analytics
  analytics.setup();

  // Twitter
  async.include("twitter-wjs", "//platform.twitter.com/widgets.js");

  // Facebook
  async.include("facebook-jssdk", "//connect.facebook.net/" + locale + "/sdk.js#xfbml=1&version=v2.8&appId=264384016913484");

  // Phone mask
  $("input[class='phone']").focusout(function() {
    $(this).unmask();
    var value = $(this).val().replace(/\D/g, "");
    if (value.length > 10) {
      $(this).mask("(99) 99999-999?9");
    } else {
      $(this).mask("(99) 9999-9999?9");
    }
  }).trigger("focusout");
});
