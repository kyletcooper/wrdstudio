<?php
/**
 * Creates the options page and adds it's fields.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

namespace wrd;

/**
 * Adds the theme option page.
 *
 * @since 1.0.0
 */
function add_theme_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {

		acf_add_options_sub_page(
			array(
				'page_title'  => __( 'Contact Information', 'wrd' ),
				'menu_title'  => __( 'Contact Information', 'wrd' ),
				'parent_slug' => 'options-general.php',
			)
		);

	}

	if ( function_exists( 'acf_add_local_field_group' ) ) :

		acf_add_local_field_group(
			array(
				'key'                   => 'group_63cff9f325ec5',
				'title'                 => 'Options - Theme Options',
				'fields'                => array(
					array(
						'key'               => 'field_63cff9f3ee9cb',
						'label'             => 'Contact Email Address',
						'name'              => 'contact_email_address',
						'aria-label'        => '',
						'type'              => 'email',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
					array(
						'key'               => 'field_63cffa1aee9cc',
						'label'             => 'Contact Telephone Number',
						'name'              => 'contact_telephone_number',
						'aria-label'        => '',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'acf-options-contact-information',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 0,
			)
		);

	endif;
}
add_action( 'init', __NAMESPACE__ . '\\add_theme_options_page' );
