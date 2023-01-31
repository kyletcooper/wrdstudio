<?php

if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_63d8d9b3c4b28',
			'title'                 => 'Page - Theme',
			'fields'                => array(
				array(
					'key'               => 'field_63d8d9b457ffd',
					'label'             => 'Page Theme',
					'name'              => 'page_theme',
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
					'default_value'     => 'blue',
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
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'page',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'side',
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
