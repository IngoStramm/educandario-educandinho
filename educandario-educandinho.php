<?php

/**
 * Plugin Name: Educandário/Educandinho
 * Plugin URI: https://agencialaf.com
 * Description: Descrição do Educandário.
 * Version: 1.0.2
 * Author: Ingo Stramm
 * Text Domain: edu
 * License: GPLv2
 */

defined('ABSPATH') or die('No script kiddies please!');

define('EDU_DIR', plugin_dir_path(__FILE__));
define('EDU_URL', plugin_dir_url(__FILE__));

require_once 'dependencies.php';
require_once 'classes/classes.php';
require_once 'functions.php';
require_once 'scripts.php';
require_once 'shortcodes.php';
require_once 'view.php';

require 'plugin-update-checker-4.10/plugin-update-checker.php';
$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/IngoStramm/educandario-educandinho/master/info.json',
    __FILE__,
    'edu'
);
