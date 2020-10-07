<?php
/**
 * Plugin Name: Gutenberg RichText
 * Version: 1.0.0
 * Description: A Gutenberg Rick Text Block
 * Author: Shubham Chitransh
 *
 * @package richtext_block
 */

 function richtext_block() {
	 wp_register_script(
		 "richtext_block_script",
		 plugins_url("build/index.js", __FILE__),
		 array("wp-blocks", "wp-element", "wp-block-editor"),
		 filemtime(plugin_dir_path(__FILE__) . "build/index.js")
	 );

	 wp_register_style(
		 "richtext_block_style",
		 plugins_url("src/style.css", __FILE__ ),
		 array(),
		 filemtime(plugin_dir_path(__FILE__) . "src/style.css")
	 );

	 wp_register_style(
		 "richtext_block_editor_style",
		 plugins_url("src/editor.css", __FILE__),
		 array("wp-edit-blocks"),
		 filemtime(plugin_dir_path(__FILE__) . "src/editor.css")
	 );

	 register_block_type("custom-block/richtext", array(
		 "editor_script" => "richtext_block_script",
		 "style" => "richtext_block_style",
		 "editor_style" => "richtext_block_editor_style"
	 ));
 }

 add_action("init", "richtext_block");