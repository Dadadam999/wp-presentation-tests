<?php
/**
 * @package wp-presentation-tests
 * @author Bogdanov Andrey (swarzone2100@yandex.ru)
 */
namespace wppt\DB;
use wpdb;
use wppt\DB\Models\TableTests;

class DataBase
{
   private $wpdb;
   public $tables;

   public function __construct()
   {
       global $wpdb;
       $this->wpdb = $wpdb;

       $this->tables =
       [
         'tests' => new TableTests
       ];
   }

   public function Install()
   {
     foreach ($this->tables as $table)
       $table->Create();
   }

   public function Uninstall()
   {
     foreach ($this->tables as $table)
       $table->Drop();
   }
}
?>
