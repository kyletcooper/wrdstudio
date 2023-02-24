<?php
/**
 * Creates the fields for the acf/list block.
 *
 * @since 1.0.0
 *
 * @package wrdstudio
 */

acf_add_local_field_group(
	array(
		'key'                   => 'group_63f78e93297ab',
		'title'                 => 'Block - wrd/list',
		'fields'                => array(
			array(
				'key'               => 'field_63f78e6fd3111',
				'label'             => 'List',
				'name'              => 'list',
				'aria-label'        => '',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'layout'            => 'block',
				'pagination'        => 0,
				'min'               => 0,
				'max'               => 0,
				'collapsed'         => '',
				'button_label'      => 'Add Row',
				'rows_per_page'     => 20,
				'sub_fields'        => array(
					array(
						'key'               => 'field_63f78e7cd3112',
						'label'             => 'Text',
						'name'              => 'text',
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
						'parent_repeater'   => 'field_63f78e6fd3111',
					),
				),
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'wrd/list',
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
