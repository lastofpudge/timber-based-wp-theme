<?php

    if (defined('WP_DEBUG') && true === WP_DEBUG) {
        @ini_set('display_errors', 1);
    }

    if (!file_exists(__DIR__.'/core/vendor/autoload.php')) {
        wp_die('No "autoload.php" file');
    }

    add_action('after_setup_theme', function () {
        \Carbon_Fields\Carbon_Fields::boot();
    });

    require_once __DIR__.'/core/vendor/autoload.php';
    require_once __DIR__.'/core/Autoload.php';

    add_filter('timber/twig', function (\Twig_Environment $twig) {
        $twig->addGlobal('_post', $_POST);
        $twig->addGlobal('_get', $_GET);

        return $twig;
    });

    new \Timber\Timber();
