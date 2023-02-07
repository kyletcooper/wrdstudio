<?php
/**
 * Creates the fields for the acf/featured-post block.
 *
 * @since 1.0.0
 *
 * @package wrdstudio
 */

acf_add_local_field_group(
	array(
		'key'                   => 'group_63e26e29606c5',
		'title'                 => 'Block - wrd/featured-post',
		'fields'                => array(
			array(
				'key'               => 'field_63e26e2953dd9',
				'label'             => 'Post',
				'name'              => 'post',
				'aria-label'        => '',
				'type'              => 'post_object',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'post_type'         => array(
					0 => 'post',
				),
				'taxonomy'          => '',
				'return_format'     => 'object',
				'multiple'          => 0,
				'allow_null'        => 0,
				'ui'                => 1,
			),
			array(
				'key'               => 'field_63e26fc6ece8f',
				'label'             => 'Theme',
				'name'              => 'theme',
				'aria-label'        => '',
				'type'              => 'select',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'choices'           => get_theme_slugs(),
				'default_value'     => false,
				'return_format'     => 'value',
				'multiple'          => 0,
				'allow_null'        => 0,
				'ui'                => 0,
				'ajax'              => 0,
				'placeholder'       => '',
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'wrd/featured-post',
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
