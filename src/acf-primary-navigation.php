<?php

if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_63d257829a09c',
			'title'                 => 'Menu Items - Primary Navigation',
			'fields'                => array(
				array(
					'key'               => 'field_63d25783eaf6d',
					'label'             => 'More Items Title',
					'name'              => 'more_title',
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
					'default_value'     => 'Learn More',
					'maxlength'         => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
				),
				array(
					'key'               => 'field_63d25d477fb84',
					'label'             => 'Is Subtle',
					'name'              => 'is_subtle',
					'aria-label'        => '',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => '',
					'default_value'     => 0,
					'ui'                => 0,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				),
				array(
					'key'               => 'field_63d25e2f821ad',
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
						'param'    => 'nav_menu_item',
						'operator' => '==',
						'value'    => 'location/navigation',
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
