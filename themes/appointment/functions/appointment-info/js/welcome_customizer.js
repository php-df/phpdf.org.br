jQuery(document).ready(function() {
    var appointment_aboutpage = appointmentLiteWelcomeScreenObject.aboutpage;
    var appointment_nr_actions_required = appointmentLiteWelcomeScreenObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof appointment_aboutpage !== 'undefined') && (typeof appointment_nr_actions_required !== 'undefined') && (appointment_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + appointment_aboutpage + '"><span class="appointment-actions-count">' + appointment_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".appointment-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section appointment-upsells">');
    }
    if (typeof appointment_aboutpage !== 'undefined') {
        jQuery('.appointment-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + appointment_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', appointmentLiteWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".appointment-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});