jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About appointment page -> Actions required tab */
    var appointment_nr_actions_required = appointmentLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof appointment_nr_actions_required !== 'undefined') && (appointment_nr_actions_required != '0') ) {
        jQuery('li.appointment-w-red-tab a').append('<span class="appointment-actions-count">' + appointment_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".appointment-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'appointment_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : appointmentLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.appointment-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + appointmentLiteWelcomeScreenObject.template_directory + '/inc/appointment-info/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var appointment_lite_actions_count = jQuery('.appointment-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof appointment_lite_actions_count !== 'undefined' ) {
                    if( appointment_lite_actions_count == '1' ) {
                        jQuery('.appointment-actions-count').remove();
                        jQuery('.appointment-tab-pane#actions_required').append('<p>' + appointmentLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.appointment-actions-count').text(parseInt(appointment_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function appointment_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".appointment-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var appointment_actions_anchor = location.hash;

	if( (typeof appointment_actions_anchor !== 'undefined') && (appointment_actions_anchor != '') ) {
		appointment_welcome_page_tabs('a[href="'+ appointment_actions_anchor +'"]');
	}

    jQuery(".appointment-nav-tabs a").click(function(event) {
        event.preventDefault();
		appointment_welcome_page_tabs(this);
    });

		/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.appointment-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
