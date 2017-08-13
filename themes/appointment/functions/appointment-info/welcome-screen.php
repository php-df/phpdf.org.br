<?php
/**
 * Welcome Screen Class
 */
class appointment_screen {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'appointment_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'appointment_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'appointment_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'appointment_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'appointment_info_screen', array( $this, 'appointment_getting_started' ), 	    10 );
		add_action( 'appointment_info_screen', array( $this, 'appointment_action_required' ), 	    20 );
		add_action( 'appointment_info_screen', array( $this, 'appointment_child_themes' ), 		    30 );
		add_action( 'appointment_info_screen', array( $this, 'appointment_github' ), 		            40 );
		add_action( 'appointment_info_screen', array( $this, 'appointment_welcome_free_pro' ), 				50 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_appointment_dismiss_required_action', array( $this, 'appointment_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_appointment_dismiss_required_action', array($this, 'appointment_dismiss_required_action_callback') );

	}

	public function appointment_register_menu() {
		add_theme_page( 'About Appointment Theme', 'About Appointment Theme', 'activate_plugins', 'appointment-info', array( $this, 'appointment_welcome_screen' ) );
	}

	public function appointment_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'appointment_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function appointment_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Appointment Lite! To take full advantage of the best our theme can offer, please make sure you visit our %swelcome page%s.', 'appointment' ), '<a href="' . esc_url( admin_url( 'themes.php?page=appointment-info' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=appointment-info' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Appointment Lite', 'appointment' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @sfunctionse  1.8.2.4
	 */
	public function appointment_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_appointment-info' == $hook_suffix ) {
			
			
			wp_enqueue_style( 'appointment-info-css', get_template_directory_uri() . '/functions/appointment-info/css/bootstrap.css' );
			
			wp_enqueue_style( 'appointment-info-screen-css', get_template_directory_uri() . '/functions/appointment-info/css/welcome.css' );

			wp_enqueue_script( 'appointment-info-screen-js', get_template_directory_uri() . '/functions/appointment-info/js/welcome.js', array('jquery') );

			global $appointment_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('appointment_show_required_actions') ):
				$appointment_show_required_actions = get_option('appointment_show_required_actions');
			else:
				$appointment_show_required_actions = array();
			endif;

			if( !empty($appointment_required_actions) ):
				foreach( $appointment_required_actions as $appointment_required_action_value ):
					if(( !isset( $appointment_required_action_value['check'] ) || ( isset( $appointment_required_action_value['check'] ) && ( $appointment_required_action_value['check'] == false ) ) ) && ((isset($appointment_show_required_actions[$appointment_required_action_value['id']]) && ($appointment_show_required_actions[$appointment_required_action_value['id']] == true)) || !isset($appointment_show_required_actions[$appointment_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'appointment-info-screen-js', 'appointmentLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','appointment' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @sfunctionse  1.8.2.4
	 */
	public function appointment_scripts_for_customizer() {

		wp_enqueue_style( 'appointment-info-screen-customizer-css', get_template_directory_uri() . '/functions/appointment-info/css/welcome_customizer.css' );
		wp_enqueue_script( 'appointment-info-screen-customizer-js', get_template_directory_uri() . '/functions/appointment-info/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $appointment_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('appointment_show_required_actions') ):
			$appointment_show_required_actions = get_option('appointment_show_required_actions');
		else:
			$appointment_show_required_actions = array();
		endif;

		if( !empty($appointment_required_actions) ):
			foreach( $appointment_required_actions as $appointment_required_action_value ):
				if(( !isset( $appointment_required_action_value['check'] ) || ( isset( $appointment_required_action_value['check'] ) && ( $appointment_required_action_value['check'] == false ) ) ) && ((isset($appointment_show_required_actions[$appointment_required_action_value['id']]) && ($appointment_show_required_actions[$appointment_required_action_value['id']] == true)) || !isset($appointment_show_required_actions[$appointment_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'appointment-info-screen-customizer-js', 'appointmentLiteWelcomeScreenObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=appointment-info#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','appointment'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @sfunctionse 1.8.2.4
	 */
	public function appointment_dismiss_required_action_callback() {

		global $appointment_required_actions;

		$appointment_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $appointment_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($appointment_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('appointment_show_required_actions') ):

				$appointment_show_required_actions = get_option('appointment_show_required_actions');

				$appointment_show_required_actions[$appointment_dismiss_id] = false;

				update_option( 'appointment_show_required_actions',$appointment_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$appointment_show_required_actions_new = array();

				if( !empty($appointment_required_actions) ):

					foreach( $appointment_required_actions as $appointment_required_action ):

						if( $appointment_required_action['id'] == $appointment_dismiss_id ):
							$appointment_show_required_actions_new[$appointment_required_action['id']] = false;
						else:
							$appointment_show_required_actions_new[$appointment_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'appointment_show_required_actions', $appointment_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @sfunctionse 1.8.2.4
	 */
	public function appointment_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>
		<div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
		<ul class="appointment-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting Started','appointment'); ?></a></li>
			<li role="presentation"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions Required','appointment'); ?></a></li>
			<li role="presentation"><a href="#github" aria-controls="github" role="tab" data-toggle="tab"><?php esc_html_e( 'Why Upgrade to Pro?','appointment'); ?></a></li>
			<li role="presentation"><a href="#free_pro" aria-controls="free_pro" role="tab" data-toggle="tab"><?php esc_html_e( 'Free vs PRO','appointment'); ?></a></li>
			<li role="presentation"><a href="#child_themes" aria-controls="child_themes" role="tab" data-toggle="tab"><?php esc_html_e( 'Child Themes','appointment'); ?></a></li>
			
		</ul>
		</div>
		</div>
		</div>

		<div class="appointment-tab-content">

			<?php do_action( 'appointment_info_screen' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 *
	 */
	public function appointment_getting_started() {
		require_once( get_template_directory() . '/functions/appointment-info/sections/getting-started.php' );
	}

	
	/**
	 * Action Requerd
	 *
	 */
	public function appointment_action_required() {
		require_once( get_template_directory() . '/functions/appointment-info/sections/actions-required.php' );
	}
	
	/**
	 * Child themes
	 *
	 */
	public function appointment_child_themes() {
		require_once( get_template_directory() . '/functions/appointment-info/sections/child-themes.php' );
	}

	/**
	 * Contribute
	 *
	 */
	public function appointment_github() {
		require_once( get_template_directory() . '/functions/appointment-info/sections/github.php' );
	}


	/**
	 * Free vs PRO
	 * 
	 */
	public function appointment_welcome_free_pro() {
		require_once( get_template_directory() . '/functions/appointment-info/sections/free_pro.php' );
	}
}

$GLOBALS['appointment_screen'] = new appointment_screen();