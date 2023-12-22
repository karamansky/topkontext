<?php namespace TOP\Display;

if( !defined( 'ABSPATH' ) ) exit;

class GutenbergBlocks {

	public function __construct() {
		$this->initHooks();
	}

	public function initHooks() {
		add_filter( 'block_categories_all', [ $this, 'addBlocksCategory' ] );
		add_action( 'acf/init', [ $this, 'addBlocks' ] );
	}

	public function addBlocksCategory( $categories ) {
		$new_category = [
			'slug'  => 'top-blocks',
			'title' => 'TOP Blocks'
		];

		array_unshift( $categories, $new_category );

		return $categories;
	}

	public static function checkForPreview( $block ) {
		if( empty( $_POST['query']['preview'] ) ) return false;

		echo '<hr>'.$block['title'];
		/* Render screenshot if it's exist for example */

		if(
			!empty( $block['example']['attributes']['data']['image'] ) &&
			file_exists( get_template_directory().'/assets/img/modules/'.
				$block['example']['attributes']['data']['image'] )
		) {
			echo '<img src="'.get_template_directory_uri().'/assets/img/modules/'.
				$block['example']['attributes']['data']['image'].
				'" style="display: block; margin: 0 auto; width: 100%; object-fit: contain;">';
		}

		echo '<hr>';

		return true;
	}

	public function addBlocks() {
		if( !function_exists( 'acf_register_block_type' ) ) return;

		$blocks = $this->returnListOfBlocks();
		foreach( $blocks as $block ) {
			if( empty( $block['name'] ) ) continue;

			acf_register_block_type(
				[
					'name'            => $block['name'],
					'title'           => __( !empty( $block['title'] ) ? $block['title'] : $block['name'] ),
					'description'     => !empty( $block['description'] ) ? __( $block['description'] ) : '',
					'render_template' => 'template-parts/blocks/'.$block['name'].'.php',
					'category'        => !empty( $block['category'] ) ? $block['category'] : '',
					'icon'            => !empty( $block['icon'] ) ? $block['icon'] : [ 'background' => '#000133', 'src' => 'desktop' ],
					'keywords'        => !empty( $block['keywords'] ) ? $block['keywords'] : [],
					'example'         => !empty( $block['example'] ) ? $block['example'] : [],
				]
			);
		}
	}

	public function returnListOfBlocks() {
		return [
			[
				'name'        => 'delimiter',
				'title'       => 'Delimiter',
				'category'    => 'top-blocks',
				'description' => '',
				'icon'        => [ 'background' => '#0b1d64', 'src' => 'image-flip-vertical' ],
				'keywords'    => [ 'delimiter', 'line' ]
			],
			[
				'name'        => 'hero',
				'title'       => 'Hero block',
				'category'    => 'top-blocks',
				'description' => '',
				'icon'        => [ 'background' => '#0b1d64', 'src' => 'admin-home' ],
				'keywords'    => [ 'hero', 'page', 'top', 'block' ],
				'example'     => [
					'attributes' => [
						'mode' => 'preview',
						'data' => [
							'image' => 'hero-block.png',
						]
					]
				]
			],
			[
				'name'        => 'text_block',
				'title'       => 'Text dark blue block',
				'category'    => 'top-blocks',
				'description' => '',
				'icon'        => [ 'background' => '#0b1d64', 'src' => 'media-spreadsheet' ],
				'keywords'    => [ 'text', 'page', 'block' ],
				'example'     => [
					'attributes' => [
						'mode' => 'preview',
						'data' => [
							'image' => 'text-dark-blue-block.png',
						]
					]
				]
			],
			[
				'name'        => 'text_with_image_right',
				'title'       => 'Text with image right block',
				'category'    => 'top-blocks',
				'description' => '',
				'icon'        => [ 'background' => '#0b1d64', 'src' => 'media-document' ],
				'keywords'    => [ 'text', 'image', 'block' ],
				'example'     => [
					'attributes' => [
						'mode' => 'preview',
						'data' => [
							'image' => 'text-with-image-right-block.png',
						]
					]
				]
			],
			[
				'name'        => 'reviews_slider',
				'title'       => 'Reviews slider block',
				'category'    => 'top-blocks',
				'description' => '',
				'icon'        => [ 'background' => '#0b1d64', 'src' => 'images-alt' ],
				'keywords'    => [ 'reviews', 'slider', 'block' ],
				'example'     => [
					'attributes' => [
						'mode' => 'preview',
						'data' => [
							'image' => 'reviews-slider-block.png',
						]
					]
				]
			],
			[
				'name'        => 'how_we_do',
				'title'       => 'How we do block',
				'category'    => 'top-blocks',
				'description' => '',
				'icon'        => [ 'background' => '#0b1d64', 'src' => 'grid-view' ],
				'keywords'    => [ 'how we do', 'grid', 'block' ],
				'example'     => [
					'attributes' => [
						'mode' => 'preview',
						'data' => [
							'image' => 'how-we-do-block.png',
						]
					]
				]
			],
			[
				'name'        => 'cta',
				'title'       => 'Call to action block',
				'category'    => 'top-blocks',
				'description' => '',
				'icon'        => [ 'background' => '#0b1d64', 'src' => 'button' ],
				'keywords'    => [ 'cta', 'call to action', 'block' ],
				'example'     => [
					'attributes' => [
						'mode' => 'preview',
						'data' => [
							'image' => 'call-to-action-block.png',
						]
					]
				]
			],
			[
				'name'        => 'faq',
				'title'       => 'FAQ block',
				'category'    => 'top-blocks',
				'description' => '',
				'icon'        => [ 'background' => '#0b1d64', 'src' => 'editor-justify' ],
				'keywords'    => [ 'faq', 'block' ],
				'example'     => [
					'attributes' => [
						'mode' => 'preview',
						'data' => [
							'image' => 'faq-block.png',
						]
					]
				]
			],
			[
				'name'        => 'contacts',
				'title'       => 'Contacts block',
				'category'    => 'top-blocks',
				'description' => '',
				'icon'        => [ 'background' => '#0b1d64', 'src' => 'email' ],
				'keywords'    => [ 'contacts', 'block' ],
				'example'     => [
					'attributes' => [
						'mode' => 'preview',
						'data' => [
							'image' => 'contacts-block.png',
						]
					]
				]
			],
		];
	}

}

new GutenbergBlocks();

class_alias( 'TOP\Display\GutenbergBlocks', 'GutenbergBlocks' );