<?php
namespace Svbk\WP\Shortcakes\Content;

use Svbk\WP\Shortcakes\Shortcake;

class Section extends Shortcake {

	public $shortcode_id = 'section';
	public $icon = 'dashicons-align-center';
	public static $defaults = array(
		'id' => 0,
		'classes' => '',
	);

	public function title() {
		return __( 'Section Tag', 'svbk-shortcakes' );
	}

	public function fields() {
		return array(
				array(
					'label'  => esc_html__( 'HTML ID', 'svbk-shortcakes' ),
					'attr'   => 'id',
					'type'   => 'text',
					'encode' => false,
					'description' => esc_html__( 'The HTML id attribute value ', 'svbk-shortcakes' ),
					'meta'   => array(
						'placeholder' => esc_html__( 'section1', 'svbk-shortcakes' ),
					),
				),
				array(
					'label'    => esc_html__( 'Classes', 'svbk-shortcakes' ),
					'attr'     => 'classes',
					'type'     => 'text',
				),
			);
	}

	public function ui_args() {

		$args = parent::ui_args();

		unset( $args['inner_content'] );

		return $args;

	}

	public function output( $attr, $content, $shortcode_tag ) {

		$attr = $this->shortcode_atts( self::$defaults, $attr, $shortcode_tag );

		return '<section id="' . esc_attr( $attr['id'] ) . '" class="' . esc_attr( $attr['classes'] ) . '">' . $content . '</section>';

	}

}
