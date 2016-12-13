var $ = window.jQuery = require("../../../node_modules/jquery/dist/jquery");

var analytics = require("./analytics");

$(function() {
  analytics.setup();
});
