<?php
/**
 * The ACF fields for all blocks.
 *
 * @package wrdstudio
 *
 * @since 1.0.0
 */

if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_63cfc584964aa',
			'title'                 => 'Block - Spacing Top/Bottom',
			'fields'                => array(
				array(
					'key'               => 'field_63cfc585614cb',
					'label'             => 'Spacing Top',
					'name'              => 'spacing_top',
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
					'choices'           => array(
						'none' => 'None',
						'xs'   => 'Extra Small',
						'sm'   => 'Small',
						'md'   => 'Medium',
						'lg'   => 'Large',
						'xl'   => 'Extra Large',
					),
					'default_value'     => 'md',
					'return_format'     => 'value',
					'multiple'          => 0,
					'allow_null'        => 0,
					'ui'                => 0,
					'ajax'              => 0,
					'placeholder'       => '',
				),
				array(
					'key'               => 'field_63cfc5c0614cc',
					'label'             => 'Spacing Bottom',
					'name'              => 'spacing_bottom',
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
					'choices'           => array(
						'none' => 'None',
						'xs'   => 'Extra Small',
						'sm'   => 'Small',
						'md'   => 'Medium',
						'lg'   => 'Large',
						'xl'   => 'Extra Large',
					),
					'default_value'     => 'md',
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
						'value'    => 'all',
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
