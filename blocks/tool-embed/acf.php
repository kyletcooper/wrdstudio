<?php
/**
 * Creates the fields for the acf/tool-embed block.
 *
 * @since 1.0.0
 *
 * @package wrdstudio
 */

acf_add_local_field_group(
	array(
		'key'                   => 'group_63e3e01a7dda0',
		'title'                 => 'Block - wrd/tool-embed',
		'fields'                => array(
			array(
				'key'               => 'field_63e3e01a7b6ea',
				'label'             => 'Tool Slug',
				'name'              => 'tool_slug',
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
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'wrd/tool-embed',
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
