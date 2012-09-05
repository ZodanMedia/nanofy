// Main Navigation
var DoofPot = {
	init: function() {

        var page_width = (jQuery('#pages').width());
		if(page_width > 480) { page_width -= 40; }

		jQuery('.map').css({ 'width': page_width + 'px', 'height': (page_width*.75)+ 'px' });
		jQuery('#pages dd, #pages p, #pages div.inner').css({ 'width': page_width + 'px' });

		jQuery("a[href*=#]").click(function(e) {
			e.preventDefault();
			if(jQuery(this).attr("href").split("#")[1]) {
				DoofPot.goTo(jQuery(this).attr("href").split("#")[1]);
			}
		});

		this.goTo("home");

		//SyntaxHighlighter.defaults['gutter'] = false;
		//SyntaxHighlighter.all();
		
		setTimeout(function(){ jQuery('.toolbar').hide(); }, 500 );
	},
	goTo: function(page) {
		var next_page = jQuery("#"+page);
		var nav_item = jQuery('nav ul li a[href=#'+page+']');
		jQuery("nav ul li").removeClass("current");
		nav_item.parent().addClass("current");
		DoofPot.resizePage((next_page.height() + 40), true, function() {
			 jQuery(".page").removeClass("current"); next_page.addClass("current");
		});
		jQuery(".page").fadeOut(500);
		next_page.fadeIn(500);

		DoofPot.centerArrow(nav_item);

	},
	centerArrow: function(nav_item, animate) {
		var left_margin = (nav_item.parent().position().left + nav_item.parent().width()) + 24 - (nav_item.parent().width() / 2);
		if(animate != false) {
			jQuery("nav .arrow").animate({
				left: left_margin - 8
			}, 500, function() { jQuery(this).show(); });
		} else {
			jQuery("nav .arrow").css({ left: left_margin - 8 });
		}
	},
	resizePage: function(size, animate, callback) {
		if(size) { var new_size = size; } else { var new_size = jQuery(".page.current").height() + 40; }
		if(!callback) { callback = function(){}; }
		if(animate) {
			jQuery("#pages").animate({ height: new_size }, 400, function() { callback.call(); });
		} else {
			jQuery("#pages").css({ height: new_size });
		}

        var page_width = (jQuery('#pages').width());
		if(page_width > 480) {page_width -= 40;	}

		jQuery('.map').css({ 'width': page_width + 'px', 'height': (page_width*.75)+ 'px' });
		jQuery('#pages dd, #pages p, #pages div.inner').css({ 'width': page_width + 'px' });
	}
};

// Fix page height and nav on browser resize
jQuery(window).resize(function() {
		DoofPot.resizePage();
		DoofPot.centerArrow(jQuery("nav ul li.current a"), false);
});

jQuery(document).ready(function() {

	// Initialize navigation
	DoofPot.init();

	// Enable mobile drop down navigation
	// jQuery("nav ul").mobileMenu();

	// Form hints
	// jQuery("label").inFieldLabels({ fadeOpacity: 0.4 });
	jQuery("nav select").change(function() {
		if(this.options[this.selectedIndex].value != "#") {
			var page = this.options[this.selectedIndex].value.split("#")[1];
	 		DoofPot.goTo(page);
			jQuery("html,body").animate({ scrollTop:jQuery('#'+page).offset().top }, 700);
		}
	});

	// Toggle lists
	jQuery(".toggle_list ul li .title").click(function() {
		var content_container = jQuery(this).parent().find(".content");
		if(content_container.is(":visible")) {
			var page_height = jQuery(".page.current").height() - content_container.height();
			DoofPot.resizePage(page_height, true);
			content_container.slideUp();
			jQuery(this).find("a.toggle_link").text(jQuery(this).find("a.toggle_link").data("open_text"));
		} else {
			var page_height = jQuery(".page.current").height() + content_container.height() + 40;
			DoofPot.resizePage(page_height, true);
			content_container.slideDown();
			jQuery(this).find("a.toggle_link").text(jQuery(this).find("a.toggle_link").data("close_text"));
		}
	});
	jQuery(".toggle_list ul li .title").each(function() {
		jQuery(this).find("a.toggle_link").text(jQuery(this).find("a.toggle_link").data("open_text"));
		if(jQuery(this).parent().hasClass("opened")) {
			jQuery(this).parent().find(".content").show();
		}
	});


	// Beautify form with Style File
	$("input#nanofy-upload").filestylecss({
		FileUploadClass: "beauty input-file-container",
		FileUploadHideClass: "input-file-hidden",
		UploadText: "Browse",
		InputTextClass: "input-file-txt"
	});

	// Upload dynamically
	$('#nanofy-form').submit(function(e) {
		e.preventDefault();		
		var $form = $( this ),
		filedata = $form.find( 'input[name="nanofy-upload"]' ).val(),
		url = $form.attr( 'action' );
		$.post(
			url,
			{'nanofy-upload': filedata},
			function(jsonObj) {
				print_message(jsonObj);
			},
			"json"
		)
		.error(function() { alert("error"); })
	});
});

function print_message(jsonObj) {
	var reply_msg = "";
	var reply_msg_holder = $('#reply_message');
	var file_msg = "";
	var file_msg_holder = $('#file_message');
	
	// reply_msg_holder.addClass('active');
	
	nanofy  = jsonObj.nanofy;
	version = jsonObj.version;
	file    = jsonObj.file;
	status  = jsonObj.status;
	message = jsonObj.message;
	
	if(status == 0) {
		reply_msg = message;
		reply_msg_holder.addClass('error');
	
	} else if(status == 1) {
		reply_msg = message;
		reply_msg_holder.removeClass('error');
		file_msg = '<p><a href="nanofy.php?download&file='+file+'">Download the file here</a>.</p>';
		
				
	} else {
		reply_msg_holder.removeClass('error');
		reply_msg = "";
		
	}
	reply_msg_holder.html(reply_msg);
	file_msg_holder.html(file_msg);
}