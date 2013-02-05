<?php/** * People Widget */class CTC_Widget_People extends CTC_Widget {	/**	 * Register widget with WordPress	 */	function __construct() {			parent::__construct(			'ctc-people',			_x( 'CT People', 'widget', 'church-theme' ),			array(				'description' => __( 'Shows people according to options', 'church-theme' )			)					);	}	/**	 * Field configuration	 *	 * This is used by CTC_Widget class for automatic field output, filtering, sanitization and saving.	 */	 	function ctc_fields() { // prefix in case WP core adds method with same name		// Fields		$fields = array(			// Example			/*			'field_id' => array(				'name'				=> __( 'Field Name', 'ccm' ),				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> __( 'This is the description below the field.', 'ccm' ),				'type'				=> 'text', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> '', //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> array(), // array of keys/values for radio or select				'default'			=> '', // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> '', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			);			*/			// Title			'title' => array(				'name'				=> _x( 'Title', 'people widget', 'church-theme' ),				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'text', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> '', //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> array(), // array of keys/values for radio or select				'default'			=> '', // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> '', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),						// Order By			'orderby' => array(				'name'				=> _x( 'Order By', 'people widget', 'church-theme' ),				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'select', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> '', //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> array( // array of keys/values for radio or select					'menu_order'		=> _x( 'Custom Order', 'people widget order by', 'church-theme' ),					'title'				=> _x( 'Name', 'people widget order by', 'church-theme' ),				),				'default'			=> 'menu_order', // value to pre-populate option with (before first save or on reset)				'no_empty'			=> true, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> 'ctc-widget-no-bottom-margin', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),						// Order			'order' => array(				'name'				=> '',				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'radio', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> '', // show text after checkbox				'radio_inline'		=> true, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> array( // array of keys/values for radio or select					'asc'	=> _x( 'Low to High', 'people widget order', 'church-theme' ),					'desc'	=> _x( 'High to Low', 'people widget order', 'church-theme' ),				),				'default'			=> 'asc', // value to pre-populate option with (before first save or on reset)				'no_empty'			=> true, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> '', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),						// Limit			'limit' => array(				'name'				=> _x( 'Limit', 'people widget', 'church-theme' ),				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'number', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> '', //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '1', // lowest possible value for number type				'number_max'		=> '50', // highest possible value for number type				'options'			=> array(), // array of keys/values for radio or select				'default'			=> '5', // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> '', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),						// Image			'show_image' => array(				'name'				=> '',				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'checkbox', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> _x( 'Show photo', 'people widget', 'church-theme' ), //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> array(), // array of keys/values for radio or select				'default'			=> true, // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> 'ctc-widget-no-bottom-margin', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),						// Position			'show_position' => array(				'name'				=> '',				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'checkbox', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> _x( 'Show position', 'people widget', 'church-theme' ), //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> array(), // array of keys/values for radio or select				'default'			=> true, // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> 'ctc-widget-no-bottom-margin', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),						// Linked			'linked' => array(				'name'				=> '',				'after_name'		=> '', // (Optional), (Required), etc.				'desc'				=> '',				'type'				=> 'checkbox', // text, textarea, checkbox, radio, select, number, url, image				'checkbox_label'	=> _x( 'Link to details', 'people widget', 'church-theme' ), //show text after checkbox				'radio_inline'		=> false, // show radio inputs inline or on top of each other				'number_min'		=> '', // lowest possible value for number type				'number_max'		=> '', // highest possible value for number type				'options'			=> array(), // array of keys/values for radio or select				'default'			=> true, // value to pre-populate option with (before first save or on reset)				'no_empty'			=> false, // if user empties value, force default to be saved instead				'allow_html'		=> false, // allow HTML to be used in the value (text, textarea)				'attributes'		=> array(), // attributes to add to input element				'class'				=> '', // class(es) to add to input				'field_attributes'	=> array(), // attr => value array for field container				'field_class'		=> '', // class(es) to add to field container				'custom_sanitize'	=> '', // function to do additional sanitization (or array( &$this, 'method' ))				'custom_field'		=> '', // function for custom display of field input (or array( &$this, 'method' ))				'taxonomies'		=> array(), // hide field if taxonomies are not supported			),		);				// Return config		return $fields;		}	/**	 * Get posts	 *	 * This can optionally be used by the template.	 * $this->instance is sanitized before being made available here.	 */	 	function ctc_get_posts() {		// Get posts		$posts = get_posts( array(			'post_type'       => 'ccm_person',			'orderby'         => $this->ctc_instance['orderby'],			'order'           => $this->ctc_instance['order'],			'numberposts'     => $this->ctc_instance['limit'],		) );					// Return filtered		return apply_filters( 'ctc_people_widget_get_posts', $posts );			}}	