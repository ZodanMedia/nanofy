/*
* Style File - jQuery plugin for styling file input elements
*  
* Copyright (c) 2007-2009 Mika Tuupola
*
* Licensed under the MIT license:
*   http://www.opensource.org/licenses/mit-license.php
*
* Based on work by Shaun Inman
*   http://www.shauninman.com/archive/2007/09/10/styling_file_inputs_with_css_and_the_dom
* 
* Modified by Robert Pieśnikowski to allow developer use only CSS to beautify input="file"
*/

(function ($) {

    $.fn.filestylecss = function (options) {

        /* TODO: This should not override CSS. */
        var settings = {
            FileUploadClass: "",
            UploadText: "Upload",
            InputTextClass: "",
            FileUploadHideClass: ""
        };

        if (options) {
            $.extend(settings, options);
        };

        return this.each(function () {
            var self = this;
            var wrapper = $("<div>").addClass(settings.FileUploadClass);

            var filename = $('<input class="file">')
                             .addClass(settings.InputTextClass).
                                click(function (e) {
                                    //Fake trigger for input:file
                                    $(self).trigger('click');
                                });
            $(self).before(filename);
            $(self).wrap(wrapper);
            $(self).addClass(settings.FileUploadHideClass);
            $(self).before($("<span>").html(settings.UploadText).click(function () { $(self).trigger('click'); }));

            $(self).bind("change", function () {
                filename.val($(self).val().replace("C:\\fakepath\\", ""));
            });
            $(settings.FileUploadClass).click(function () { $(self).trigger('click'); });
        });
    };

})(jQuery);
