<?php
/**
 * @package Multiple uploads for Heilz
 * @author Bogdanov Andrey (swarzone2100@yandex.ru)
 */
namespace wppt\Admin;
use wppt\DB\DataBase;

class SettingsPage
{
  private $database;
  private $metadata;

  public function __construct()
  {
      // $this->database = new Database;
      // $this->metadata = $this->database->tables['metadata']->GetAll();

      // add_action('admin_menu', function()
      // {
      //     add_menu_page(
      //         'Тесты',
      //         'Тесты',
      //         'administrator',
      //         'settings_wppt',
      //         array($this, 'wppt_settings_callback'),
      //         'dashicons-admin-generic',
      //         20
      //     );
      // });
      //
      // $this->saveSettings();
  }

  function wppt_settings_callback()
  {
      require_once( __DIR__ . '/Templates/SettingsView.php' );
  }

  public function getMeta($key)
  {
      foreach ($this->metadata as $row)
      {
          if( $key == $row['meta_key'] )
          {
              return $row['meta_value'];
              break;
          }
      }

      return '';
  }

  private function saveSettings()
  {
      add_action( 'plugins_loaded', function()
      {
            if( isset( $_POST[ 'wppt_settings_admin_nonce' ] ) )
            {
                 if( wp_verify_nonce( $_POST[ 'wppt_settings_admin_nonce' ], 'wppt_settings_admin_nonce' ) )
                 {
                      //$this->database->tables['metadata']->Update( 'author-payment-max', $_POST['author-payment-max']);
                      //$this->metadata = $this->database->tables['metadata']->GetAll();
                 }
            }
      } );
  }
}
