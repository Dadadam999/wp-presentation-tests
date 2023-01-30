<?php
/**
 * @package wp-presentation-tests
 * @author Bogdanov Andrey (swarzone2100@yandex.ru)
 */
namespace wppt\DB\Interfaces;

interface ITable
{
  public function __construct();
  public function Create();
  public function Drop();
}
