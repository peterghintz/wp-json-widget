<?php 
function angulartheme_enqueue_scripts() {
  // register AngularJS and modules
  wp_register_script('angular-core', get_bloginfo('template_directory') . '/js/angular.1.2.21.min.js', array(), '1.2.21', false);
  wp_register_script('angular-sanitize', get_bloginfo('template_directory') . '/js/angular-sanitize.1.0.3.min.js', array(), '1.0.3', false);
  wp_register_script('jquery', get_bloginfo('template_directory') . '/js/jquery-2.1.1.min.js', array(), '2.1.1', false);

  // register our app.js, which has a dependency on angular-core
  wp_register_script('angular-app', get_bloginfo('template_directory').'/app.js', array('angular-core'), null, false);

  // enqueue all scripts
  wp_enqueue_script('angular-core');
  wp_enqueue_script('angular-sanitize');
  wp_enqueue_script('jquery');
  wp_enqueue_script('angular-app');
}

function angulartheme_enqueue_styles() {
  // add a default stylesheet
  wp_register_style( 'style', get_bloginfo('template_directory') . '/style.css', array(), '1.0', false );

  // enqueue stylesheet
  wp_enqueue_style('style');
}

// enqueue everything
add_action('wp_enqueue_scripts', 'angulartheme_enqueue_scripts');
add_action('wp_enqueue_scripts', 'angulartheme_enqueue_styles');
?>