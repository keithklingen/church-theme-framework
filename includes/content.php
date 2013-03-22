<?php
/**
 * Content Functions
 */

/*********************************
 * CONTENT TYPES
 *********************************

/**
 * Content types
 *
 * Theme should filter ctc_content_types to add page_templates since they are theme-specific.
 * The filter can also be used to add other content types.
 */

function ctc_content_types() {

	$content_types = array(

		'sermon' => array(
			'post_types'		=> 'ccm_sermon',
			'taxonomies'		=> array( 'ccm_sermon_category', 'ccm_sermon_tag', 'ccm_sermon_speaker' ),
			'page_templates'	=> array(), // should be populated via ctc_content_types filter in theme
			'conditions'		=> array(),
		),

		'event' => array(
			'post_types'		=> array( 'ccm_event' ),
			'taxonomies'		=> array(),
			'page_templates'	=> array(), // should be populated via ctc_content_types filter in theme
			'conditions'		=> array(),
		),

		'gallery' => array(
			'post_types'		=> array( 'ccm_gallery_item' ),
			'taxonomies'		=> array( 'ccm_gallery_album' ),
			'page_templates'	=> array(), // should be populated via ctc_content_types filter in theme
			'conditions'		=> array(),
		),

		'people' => array(
			'post_types'		=> array( 'ccm_person' ),
			'taxonomies'		=> array( 'ccm_person_group' ),
			'page_templates'	=> array(), // should be populated via ctc_content_types filter in theme
			'conditions'		=> array(),
		),

		'location' => array(
			'post_types'		=> array( 'ccm_location' ),
			'taxonomies'		=> array( 'ccm_location' ),
			'page_templates'	=> array(), // should be populated via ctc_content_types filter in theme
			'conditions'		=> array(),
		),

		'contact' => array(
			'post_types'		=> array(),
			'taxonomies'		=> array(),
			'page_templates'	=> array(), // should be populated via ctc_content_types filter in theme
			'conditions'		=> array(),
		),

		'blog' => array(
			'post_types'		=> array( 'post' ),
			'taxonomies'		=> array( 'category', 'tag' ),
			'page_templates'	=> array(), // should be populated via ctc_content_types filter in theme
			'conditions'		=> array( 'is_author', 'is_archive', 'is_home' ), // is_home() is "Your latest posts" on homepage or "Posts page" when static front page used
		),

		'page' => array(
			'post_types'		=> array( 'page' ),
			'taxonomies'		=> array(),
			'page_templates'	=> array(), // should be populated via ctc_content_types filter in theme
			'conditions'		=> array(),
		),

		'search' => array(
			'post_types'		=> array(),
			'taxonomies'		=> array(),
			'page_templates'	=> array(), // should be populated via ctc_content_types filter in theme
			'conditions'		=> array( 'is_search' ),
		),

	);

	// Allow filtering
	$content_types = apply_filters( 'ctc_content_types', $content_types );

	// Sanitize types (particularly for filtered in data)
	$data_keys = array( 'post_types', 'taxonomies', 'page_templates', 'conditions' );
	foreach ( $content_types as $content_type => $content_type_data ) {
		foreach ( $data_keys as $data_key ) {
			$content_types[$content_type][$data_key] = isset( $content_type_data[$data_key] ) ? (array) $content_type_data[$data_key] : array(); // array if string, empty array if null
		}
	}

	// Return
	return $content_types;

}

/**
 * Detect type of content being shown
 *
 * Useful for showing content-specific elements (breadcrumbs, sidebars, header images).
 * The returned values should correspond to sidebar names in includes/sidebars.php.
 */

function ctc_current_content_type() {

	global $post;

	$current_type = false;

	$content_types = ctc_content_types();

	// Get content type based on post type, taxonomy or template
	foreach ( $content_types as $type => $type_data ) {

		// Check attachment parent post type
		if ( is_attachment() && ! empty( $post->post_parent ) && ! empty( $type_data['post_types'] ) && in_array( get_post_type( $post->post_parent ), $type_data['post_types'] ) ) {
			$current_type = $type;
			break;
		}

		// Check post type
		if ( ! empty( $type_data['post_types'] ) && is_singular( $type_data['post_types'] ) || is_post_type_archive( $type_data['post_types'] ) ) {
			$current_type = $type;
			break;
		}

		// Check taxonomy
		foreach ( $type_data['taxonomies'] as $taxonomy ) {
			if ( is_tax( $taxonomy ) ) {
				$current_type = $type;
				break 2;
			}
		}

		// Check page template
		foreach ( $type_data['page_templates'] as $page_template ) {
			if ( is_page_template( CTC_PAGE_TPL_DIR . '/' . $page_template ) ) {
				$current_type = $type;
				break 2;
			}
		}

		// Check conditions
		foreach ( $type_data['conditions'] as $condition ) {
			if ( function_exists( $condition ) && call_user_func( $condition ) ) {
				$current_type = $type;
				break 2;
			}
		}

	}

	// Return filterable
	return apply_filters( 'ctc_current_content_type', $current_type );

}

/**
 * Get data for a specific content type
 *
 * Specify a key, such as "page_templates"; otherwise, all data is retrieved.
 */

function ctc_current_content_type_data( $key = false ) {

	$data = false;

	$current_type = ctc_current_content_type();

	if ( $current_type ) {

		$type_data = ctc_content_types();

		if ( ! empty( $type_data[$current_type] ) ) {

			if ( ! empty( $key ) ) {
				if ( ! empty( $type_data[$current_type][$key] ) ) { // check for data
					$data = $type_data[$current_type][$key];
				}
			} else { // no key given, return all
				$data = $type_data[$current_type];
			}

		}

	}

	return apply_filters( 'ctc_current_content_type_data', $data, $key );

}
