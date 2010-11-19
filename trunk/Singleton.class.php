<?php

/**
 * Abstract singletone class
 * 
 * Example:
 * <code>
 * <?php
 * class DatabaseConnection extends Singleton {
 *
 * &nbsp;  protected $connection;
 *
 * &nbsp;  protected function __construct() {
 * &nbsp;      // @todo Connect to the database
 * &nbsp;  }
 *
 * &nbsp;  public function __destruct() {
 * &nbsp;      // @todo Drop the connection to the database
 * &nbsp;  }
 * }
 *
 * $oDbConn = DatabaseConnection::getInstance();  // Returns single instance
 * </code>
 */
abstract class Singleton {

	private static $aoInstance = array();

	protected function __construct() {
	}

	final public static function getInstance() {
		$calledClassName = get_called_class();

		if (!isset(self::$aoInstance[$calledClassName])) {
			self::$aoInstance[$calledClassName] = new $calledClassName();
		}

		return self::$aoInstance[$calledClassName];
	}

	final private function __clone() {
	}
}
