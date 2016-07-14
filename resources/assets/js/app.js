/**
 * Created by jacob on 16/7/9.
 */
window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');
//require('morris.js')

$( document ).ready(function() {
    console.log($.fn.tooltip.Constructor.VERSION);
});