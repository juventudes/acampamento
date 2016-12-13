var $ = window.jQuery = require("../../../node_modules/jquery/dist/jquery");
require("../../../node_modules/jquery.maskedinput/src/jquery.maskedinput.js");

var analytics = require("./analytics");

$(function() {
  analytics.setup();

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
