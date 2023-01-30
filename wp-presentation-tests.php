<?php
/**
 * Plugin Name: wp-presentation-tests
 * Plugin URI: 
 * Description: Плагин для опросов по презентации.
 * Version: 1.0.0
 * Author: Bogdanov Andrey
 * Author URI: mailto://swarzone2100@yandex.ru
 *
 * @package wp-presentation-tests
 * @author Bogdanov Andrey (swarzone2100@yandex.ru)
*/
require_once __DIR__.'/wp-presentation-tests-autoload.php';

use wppt\Main;
use wppt\DB\DataBase;

register_activation_hook(__FILE__, 'WpPresentationTestsInstall');
register_deactivation_hook(__FILE__, 'WpPresentationTestsUninstall');

function WpPresentationTestsInstall()
{
    $tables = new DataBase();
    $tables->Install();
}

function WpPresentationTestsUninstall()
{
  $tables = new DataBase();
  $tables->Uninstall();
}

new Main();
