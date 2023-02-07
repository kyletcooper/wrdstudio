<?php
/**
 * Creates the fields for the acf/cards block.
 *
 * @since 1.0.0
 *
 * @package wrdstudio
 */

acf_add_local_field_group(
	array(
		'key'                   => 'group_63d7c8ec0ec31',
		'title'                 => 'Block - wrd/cards',
		'fields'                => array(
			array(
				'key'               => 'field_63d7c8ec2aa04',
				'label'             => 'Cards',
				'name'              => 'cards',
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
						'key'               => 'field_63d7c9232aa08',
						'label'             => 'Image',
						'name'              => 'image',
						'aria-label'        => '',
						'type'              => 'image',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'return_format'     => 'id',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
						'preview_size'      => 'medium',
						'parent_repeater'   => 'field_63d7c8ec2aa04',
					),
					array(
						'key'               => 'field_63d7c9052aa05',
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
						'parent_repeater'   => 'field_63d7c8ec2aa04',
					),
					array(
						'key'               => 'field_63d7c90b2aa06',
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
						'parent_repeater'   => 'field_63d7c8ec2aa04',
					),
					array(
						'key'               => 'field_63d7c9112aa07',
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
						'parent_repeater'   => 'field_63d7c8ec2aa04',
					),
				),
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'wrd/cards',
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
