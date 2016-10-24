/**
 * Created by jacob on 16/7/13.
 */
;(function () {
    var current = $('a[href="' + this.location.href + '"]');
    current.parent('li').addClass('active');
    current.parents('.collapse').collapse('show').prev('a').addClass('has-active-item');
    //hello world
})(jQuery, window);