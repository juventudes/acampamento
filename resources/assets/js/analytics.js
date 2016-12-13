var $ = window.jQuery;

var async = require("./async");

var ganalyticsUA = "UA-266727-21";

var setup = function() {
  if (typeof window.ga !== "undefined") {
    return;
  }

  window.GoogleAnalyticsObject = "ga";

  window.ga = function() {
    if (typeof window.ga.q === "undefined") {
      window.ga.q = [];
    }
    window.ga.q.push(arguments);
  };
  window.ga.l = (new Date()).getTime();

  async.include("ganalytics-js", "//www.google-analytics.com/analytics.js");

  window.ga("create", ganalyticsUA, "none");
  window.ga("send", "pageview");
};

module.exports = {
  setup: setup
};
