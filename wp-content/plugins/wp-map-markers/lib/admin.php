<?php
/* ------------------------------------------------------------------------ *
 * Setting Registration
 * ------------------------------------------------------------------------ */

/**
 * Initializes the plugin options page by registering the Sections,
 * Fields, and Settings.
 *
 * This function is registered with the 'admin_init' hook.
 */
add_action( 'admin_init', 'wpmm_initialize_plugin_options' );

function wpmm_initialize_plugin_options() {


	// First, we register a section. This is necessary since all future options must belong to one.
	add_settings_section(
			'general_settings_section', // ID used to identify this section and with which to register options
			__( 'WP Map Markers Options', 'wpmm-map-markers' ), // Title to be displayed on the administration page
			'wpmm_general_options_callback', // Callback used to render the description of the section
			'wpmm_plugin_map_options' // Page on which to add this section of options
	);

	// Next, we will introduce the fields
	add_settings_field(
			'default_mapcenter', // ID used to identify the field throughout the plugin
			__( 'Default map center', 'wpmm-map-markers' ), // The label to the left of the option interface element
			'wpmm_default_mapcenter_callback', // The name of the function responsible for rendering the option interface
			'wpmm_plugin_map_options', // The page on which this option will be displayed
			'general_settings_section', // The name of the section to which this field belongs
			array( // The array of arguments to pass to the callback. In this case, just a description.
		__( 'Enter the default map center.', 'wpmm-map-markers' )
			)
	);
	add_settings_field(
			'default_latitude', // ID used to identify the field throughout the plugin
			__( 'Default latitude', 'wpmm-map-markers' ), // The label to the left of the option interface element
			'wpmm_default_latitude_callback', // The name of the function responsible for rendering the option interface
			'wpmm_plugin_map_options', // The page on which this option will be displayed
			'general_settings_section', // The name of the section to which this field belongs
			array( // The array of arguments to pass to the callback. In this case, just a description.
		__( 'Define the default latitude.', 'wpmm-map-markers' )
			)
	);

	add_settings_field(
			'default_longitude', __( 'Default longitude', 'wpmm-map-markers' ), 'wpmm_default_longitude_callback', 'wpmm_plugin_map_options', 'general_settings_section', array(
		__( 'Define the default longitude.', 'wpmm-map-markers' )
			)
	);

	add_settings_field(
			'default_zoom', __( 'Default zoom', 'wpmm-map-markers' ), 'wpmm_default_zoom_callback', 'wpmm_plugin_map_options', 'general_settings_section', array(
		__( 'Define the default zoom.', 'wpmm-map-markers' )
			)
	);

	add_settings_field(
			'map_type', __( 'Map Type', 'wpmm-map-markers' ), 'wpmm_map_type_callback', 'wpmm_plugin_map_options', 'general_settings_section', array(
		__( 'Choose the map type.', 'wpmm-map-markers' )
			)
	);

	add_settings_field(
			'wpmm_map_width', // ID used to identify the field throughout the plugin
			__( 'Map width', 'wpmm-map-markers' ), // The label to the left of the option interface element
			'wpmm_map_width_callback', // The name of the function responsible for rendering the option interface
			'wpmm_plugin_map_options', // The page on which this option will be displayed
			'general_settings_section', // The name of the section to which this field belongs
			array( // The array of arguments to pass to the callback. In this case, just a description.
		__( 'Define the map width (ex: 500px or 100%).', 'wpmm-map-markers' )
			)
	);

	add_settings_field(
			'wpmm_map_height', // ID used to identify the field throughout the plugin
			__( 'Map height', 'wpmm-map-markers' ), // The label to the left of the option interface element
			'wpmm_map_height_callback', // The name of the function responsible for rendering the option interface
			'wpmm_plugin_map_options', // The page on which this option will be displayed
			'general_settings_section', // The name of the section to which this field belongs
			array( // The array of arguments to pass to the callback. In this case, just a description.
		__( 'Define the map height (ex: 500px or 100%).', 'wpmm-map-markers' )
			)
	);
	
		add_settings_field(
			'wpmm_panel_width', // ID used to identify the field throughout the plugin
			__( 'Panel width', 'wpmm-map-markers' ), // The label to the left of the option interface element
			'wpmm_panel_width_callback', // The name of the function responsible for rendering the option interface
			'wpmm_plugin_map_options', // The page on which this option will be displayed
			'general_settings_section', // The name of the section to which this field belongs
			array( // The array of arguments to pass to the callback. In this case, just a description.
		__( 'Define the panel width (ex: 500px or 100%).', 'wpmm-map-markers' )
			)
	);

	add_settings_field(
			'wpmm_panel_height', // ID used to identify the field throughout the plugin
			__( 'Panel height', 'wpmm-map-markers' ), // The label to the left of the option interface element
			'wpmm_panel_height_callback', // The name of the function responsible for rendering the option interface
			'wpmm_plugin_map_options', // The page on which this option will be displayed
			'general_settings_section', // The name of the section to which this field belongs
			array( // The array of arguments to pass to the callback. In this case, just a description.
		__( 'Define the panel height (ex: 500px or 100%).', 'wpmm-map-markers' )
			)
	);

	// Finally, we register the fields with WordPress
	register_setting(
			'wpmm_plugin_map_options', 'wpmm_plugin_map_options', 'wpmm_plugin_validate_input'
	);
}

// end wpmm_initialize_plugin_options

/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */

/**
 * This function provides a simple description for the General Options page.
 *
 * It is called from the 'wpmm_initialize_plugin_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function wpmm_general_options_callback() {
	echo '<p>' . __( 'Set the Google maps defaults.', 'wpmm-map-markers' ) . '</p>';
}

// end wpmm_general_options_callback

/* ------------------------------------------------------------------------ *
 * Field Callbacks
 * ------------------------------------------------------------------------ */

/**
 * This function renders the interface elements
 *
 * It accepts an array of arguments and expects the first element in the array to be the description
 * to be displayed next to the checkbox.
 */
function wpmm_default_mapcenter_callback( $args ) {

	// Read the options collection
	$options = get_option( 'wpmm_plugin_map_options' );

	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<input type="text" id="wpmm_plugin_map_options[default_mapcenter]" name="wpmm_plugin_map_options[default_mapcenter]" value="' . $options['default_mapcenter'] . '" />';

	// Here, we will take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="wpmm_plugin_map_options[default_mapcenter]"> ' . $args[0] . '</label>';
	$html .='<form id="wpmm-form-settings" action="" method="POST"><div><input id="wpmm_geocode_button" class="button" type="button" value="Geocode map center" /><img src="' . admin_url( '/images/wpspin_light.gif' ) . '" class="waiting" id="wpmm_loading" style="display:none;"/></div></form><div style="width: 60%;height:300px;"><div id="map_canvas" style="width:100%; height:100%"></div></div>';
	echo $html;
}

function wpmm_default_latitude_callback( $args ) {

	// Read the options collection
	$options = get_option( 'wpmm_plugin_map_options' );

	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<input type="text" id="wpmm_plugin_map_options[default_latitude]" name="wpmm_plugin_map_options[default_latitude]" value="' . $options['default_latitude'] . '" readonly="readonly" />';

	// Here, we will take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="wpmm_plugin_map_options[default_latitude]"> ' . $args[0] . '</label>';

	echo $html;
}

// end wpmm_default_latitude_callback

function wpmm_default_longitude_callback( $args ) {

	// Read the options collection
	$options = get_option( 'wpmm_plugin_map_options' );

	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<input type="text" id="wpmm_plugin_map_options[default_longitude]" name="wpmm_plugin_map_options[default_longitude]" value="' . $options['default_longitude'] . '" readonly="readonly" />';

	// Here, we will take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="wpmm_plugin_map_options[default_longitude]"> ' . $args[0] . '</label>';

	echo $html;
}

// end wpmm_default_longitude_callback

function wpmm_default_zoom_callback( $args ) {

	// Read the options collection
	$options = get_option( 'wpmm_plugin_map_options' );

	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<input type="text" id="wpmm_plugin_map_options[default_zoom]" name="wpmm_plugin_map_options[default_zoom]" value="' . $options['default_zoom'] . '" />';

	// Here, we will take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="wpmm_plugin_map_options[default_zoom]"> ' . $args[0] . '</label>';

	echo $html;
}

// end wpmm_default_zoom_callback

function wpmm_map_type_callback( $args ) {

	$options = get_option( 'wpmm_plugin_map_options' );

	$html = '<select id="map_type" name="wpmm_plugin_map_options[map_type]">';
	$html .= '<option value="default">Select a map type...</option>';
	$html .= '<option value="google.maps.MapTypeId.ROADMAP"' . selected( $options['map_type'], 'google.maps.MapTypeId.ROADMAP', false ) . '>Roadmap</option>';
	$html .= '<option value="google.maps.MapTypeId.SATELLITE"' . selected( $options['map_type'], 'google.maps.MapTypeId.SATELLITE', false ) . '>Satellite</option>';
	$html .= '<option value="google.maps.MapTypeId.HYBRID"' . selected( $options['map_type'], 'google.maps.MapTypeId.HYBRID', false ) . '>Hybrid</option>';
	$html .= '<option value="google.maps.MapTypeId.TERRAIN"' . selected( $options['map_type'], 'google.maps.MapTypeId.TERRAIN', false ) . '>Terrain</option>';
	$html .= '</select>';

	echo $html;
}

function wpmm_map_width_callback( $args ) {

	// Read the options collection
	$options = get_option( 'wpmm_plugin_map_options' );

	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<input type="text" id="wpmm_plugin_map_options[wpmm_map_width]" name="wpmm_plugin_map_options[wpmm_map_width]" value="' . $options['wpmm_map_width'] . '" />';

	// Here, we will take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="wpmm_plugin_map_options[wpmm_map_width]"> ' . $args[0] . '</label>';

	echo $html;
}

function wpmm_map_height_callback( $args ) {

	// Read the options collection
	$options = get_option( 'wpmm_plugin_map_options' );

	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<input type="text" id="wpmm_plugin_map_options[wpmm_map_height]" name="wpmm_plugin_map_options[wpmm_map_height]" value="' . $options['wpmm_map_height'] . '" />';

	// Here, we will take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="wpmm_plugin_map_options[wpmm_map_height]"> ' . $args[0] . '</label>';

	echo $html;
}

function wpmm_panel_width_callback( $args ) {

	// Read the options collection
	$options = get_option( 'wpmm_plugin_map_options' );

	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<input type="text" id="wpmm_plugin_map_options[wpmm_panel_width]" name="wpmm_plugin_map_options[wpmm_panel_width]" value="' . $options['wpmm_panel_width'] . '" />';

	// Here, we will take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="wpmm_plugin_map_options[wpmm_panel_width]"> ' . $args[0] . '</label>';

	echo $html;
}

function wpmm_panel_height_callback( $args ) {

	// Read the options collection
	$options = get_option( 'wpmm_plugin_map_options' );

	// Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
	$html = '<input type="text" id="wpmm_plugin_map_options[wpmm_panel_height]" name="wpmm_plugin_map_options[wpmm_panel_height]" value="' . $options['wpmm_panel_height'] . '" />';

	// Here, we will take the first argument of the array and add it to a label next to the checkbox
	$html .= '<label for="wpmm_plugin_map_options[wpmm_panel_height]"> ' . $args[0] . '</label>';

	echo $html;
}

// end sandbox_radio_element_callback

function wpmm_create_menu_page() {
	global $wpmm_settings_page;

	/* If no settings are available, add the default settings to the database. */
	//if ( false === get_option( 'wpmm_plugin_map_options' ) )
	//	add_option( 'wpmm_plugin_map_options', wpmm_get_default_settings(), '', 'yes' );

	$wpmm_settings_page = add_options_page(
			__( 'WP Map Markers Options', 'wpmm-map-markers' ), // The title to be displayed on the corresponding page for this menu
			__( 'WP Map Markers', 'wpmm-map-markers' ), // The text to be displayed for this actual menu item
			'wpmm_unique_capability', // Which type of users can see this menu
			'wpmm-settings', // The unique ID - that is, the slug - for this menu item
			'wpmm_plugin_display', // The name of the function to call when rendering the menu for this page
			''
	);
}

// end wpmm_create_menu_page
add_action( 'admin_menu', 'wpmm_create_menu_page' );

function wpmm_plugin_display() {
	?>
	<!-- Create a header in the default WordPress 'wrap' container -->
	<div class="wrap">

		<!-- Add the icon to the page -->
		<div id="icon-plugins" class="icon32"></div>
		<h2><?php _e( 'Map Markers Options', 'wpmm-map-markers' ); ?></h2>
		<h3><?php _e( 'Getting started', 'wpmm-map-markers' ); ?></h3>
		<div class="updated">

			<p><?php
	$add_map_url = admin_url() . 'edit-tags.php?taxonomy=wpmm_map&post_type=wpmm_location';
	printf( __( 'You should start by adding a map %1$shere%2$s.', 'wpmm-map-markers' ), '<a href="' . $add_map_url . '">', '</a>' );
	?></p>

		</div>
		<!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
	<?php settings_errors(); ?>

		<!-- Create the form that will be used to render our options -->
		<form method="post" action="options.php">
			<?php settings_fields( 'wpmm_plugin_map_options' ); ?>
			<?php do_settings_sections( 'wpmm_plugin_map_options' ); ?>
	<?php submit_button(); ?>
		</form>



	</div><!-- /.wrap -->
	<?php
}

// end wpmm_plugin_display

function wpmm_plugin_validate_input( $input ) {


	// Create our array for storing the validated options
	$output = array( );

	// Loop through each of the incoming options
	foreach ( $input as $key => $value ) {

		// Check to see if the current option has a value. If so, process it.
		if ( isset( $input[$key] ) ) {

			// Strip all HTML and PHP tags and properly handle quoted strings
			$output[$key] = strip_tags( stripslashes( $input[$key] ) );
		} // end if
	} // end foreach
	// Return the array processing any additional functions filtered by this action
	return apply_filters( 'wpmm_plugin_validate_input', $output, $input );
}

// integrate with Members plugin
if ( function_exists( 'members_plugin_init' ) )
	add_filter( 'wpmm_map_markers_capability', 'wpmm_unique_capability' );

function wpmm_unique_capability( $cap ) {
	return 'edit_my_plugin_settings';
}

function wpmm_get_default_settings() {

	/* Add the database version setting. */
	add_option( 'wpmm_db_version', WPMM_DB_VERSION );

	$map_center = 'rome,italy';
	$lat_lng_def = wpmm_do_geocode_address( 'rome,italy' );
	$map_center_lat = $lat_lng_def['latitude'];
	$map_center_lng = $lat_lng_def['longitude'];

	$wpmm_settings = array(
		'marker_shadow' => WPMM_URL . '/images/marker-shadow.png',
		'default_zoom' => 8,
		'default_mapcenter' => $map_center,
		'default_latitude' => $map_center_lat,
		'default_longitude' => $map_center_lng,
		'map_type' => 'google.maps.MapTypeId.ROADMAP',
		'wpmm_map_height' => '450px',
		'wpmm_map_width' => '68%',
		'wpmm_panel_height' => '450px',
		'wpmm_panel_width' => '28%'		
	);
	return $wpmm_settings;
}

/* Display a notice that can be dismissed */
add_action( 'admin_notices', 'wpmm_admin_notice' );

function wpmm_admin_notice() {
	$settings_page = admin_url() . 'options-general.php?page=wpmm-settings';
	global $current_user;
	$user_id = $current_user->ID;
	if ( current_user_can( 'manage_options' ) ) {
		/* Check that the user hasn't already clicked to ignore the message */
		if ( !get_user_meta( $user_id, 'wpmm_ignore_notice' ) ) {
			echo '<div class="updated"><p>';
			printf( __( 'Plugin activated. Please check the %1$ssettings%2$s. | %3$sDismiss%4$s', 'wpmm-map-markers' ), '<a href="' . $settings_page . '">', '</a>', '<a href="?wpmm_nag_ignore=0">', '</a>' );
			echo "</p></div>";
		}
	}
}

add_action( 'admin_init', 'wpmm_nag_ignore' );

function wpmm_nag_ignore() {
	global $current_user;
	$user_id = $current_user->ID;
	/* If user clicks to ignore the notice, add that to their user meta */
	if ( isset( $_GET['wpmm_nag_ignore'] ) && '0' == $_GET['wpmm_nag_ignore'] ) {
		add_user_meta( $user_id, 'wpmm_ignore_notice', 'true', true );
	}
}

/* Hook your version check to 'init' to run it on every page. You can use 'admin_menu' to just run it in the admin. */
add_action( 'admin_menu', 'wpmm_version_check' );

/* Checks the version number and runs install or update functions if needed. */

function wpmm_version_check() {

	/* Get the old database version. */
	$old_db_version = get_option( 'wpmm_db_version' );

	/* If there is no old database version, run the install. */
	if ( empty( $old_db_version ) ) {
		/* if option exists, this version predates the DB setting, so recreate */
		if ( false !== get_option( 'wpmm_plugin_map_options' ) ) {
			delete_option( 'wpmm_plugin_map_options' );
		}
		add_option( 'wpmm_plugin_map_options', wpmm_get_default_settings(), '', 'yes' );
	}
	/* If the old version is less than the new version, run the update. */ 
	elseif ( intval( $old_db_version ) < intval( WPMM_DB_VERSION ) )
		wpmm_update();
}

/* Function for updating your theme/plugin settings. */

function wpmm_update() {

	/* Update the database version setting. */
	update_option( 'wpmm_db_version', WPMM_DB_VERSION );

	/* Update the user's new theme/plugin settings here if there are new settings. */
	// get_option(); // Get the previous settings.
	$options = get_option( 'wpmm_plugin_map_options' );
	// You'd need to merge the old settings and new settings here.
	// update_option(); // Update the settings.
	// merge new db options with existing
	$shadow = WPMM_URL . '/images/marker-shadow.png';
	$new_options = array('wpmm_map_width' => '68%','wpmm_panel_width' => '28%', 'wpmm_panel_height' => '450px','marker_shadow' =>$shadow);
	$result = array_merge($options, $new_options);
	update_option('wpmm_plugin_map_options', $result);
}