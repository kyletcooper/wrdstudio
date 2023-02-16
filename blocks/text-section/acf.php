<?php
/**
 * Creates the fields for the acf/text-section block.
 *
 * @since 1.0.0
 *
 * @package wrdstudio
 */

acf_add_local_field_group(
	array(
		'key'                   => 'group_63cfd0aab2d9e',
		'title'                 => 'Block - acf/text-section',
		'fields'                => array(
			array(
				'key'               => 'field_63cfd0abef6a0',
				'label'             => 'Title',
				'name'              => 'title',
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
			array(
				'key'               => 'field_63cfd0b8ef6a1',
				'label'             => 'Body',
				'name'              => 'body',
				'aria-label'        => '',
				'type'              => 'wysiwyg',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'default_value'     => '',
				'tabs'              => 'all',
				'toolbar'           => 'full',
				'media_upload'      => 1,
				'delay'             => 0,
			),
			array(
				'key'               => 'field_63cfd0bcef6a2',
				'label'             => 'CTA',
				'name'              => 'cta',
				'aria-label'        => '',
				'type'              => 'link',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'return_format'     => 'array',
			),
			array(
				'key'               => 'field_63cfd0bcef6aa3',
				'label'             => 'Show Divider?',
				'name'              => 'show_divider',
				'aria-label'        => '',
				'type'              => 'true_false',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'default_value'     => 1,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'wrd/text-section',
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
