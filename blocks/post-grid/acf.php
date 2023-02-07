<?php
/**
 * Creates the fields for the acf/post-grid block.
 *
 * @since 1.0.0
 *
 * @package wrdstudio
 */

acf_add_local_field_group(
	array(
		'key'                   => 'group_63e2731226534',
		'title'                 => 'Block - wrd/posts-grid',
		'fields'                => array(
			array(
				'key'               => 'field_63e2731201e5d',
				'label'             => 'Posts',
				'name'              => 'posts',
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
				'post_type'         => '',
				'taxonomy'          => '',
				'return_format'     => 'object',
				'multiple'          => 1,
				'allow_null'        => 0,
				'ui'                => 1,
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'wrd/post-grid',
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
