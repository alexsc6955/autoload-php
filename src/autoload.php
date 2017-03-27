<?php
namespace Vbt;

use Exception;

class Autoload
{
	private $_namespace;
	private $_includePath;
	public function __construct($namespace = null, $includePath = null)
	{
		$this->_namespace = $namespace;
		$this->_includePath = $includePath;
		$this->register();
	}
	private function register(){
		spl_autoload_register(array($this, 'loadClass'));
	}
	private function loadClass($className)
	{
		$len = strlen($this->_namespace);

		if (strncmp($this->_namespace, $className, $len) != 0) {
			// negative, move to the next registered autoloader
			throw new Exception('Class ' . $className . ' use not defined in ' . $this->_namespace, 1);
			return;
		}
		// get the relative class name
		$relativeClass = substr($className, $len);

		// replace the namespace prefix with the base directory, replace namespace
		// separators with directory separators in the relative class name, append
		// with .php

		$file = $this->_includePath . str_replace('\\', '/', strtolower($relativeClass)) . '.php';

		// if the file exists, require it
		var_dump(substr($className, $len));
		if (file_exists($file))
			require $file;
		else
			 throw new Exception('The class ' . $className . ' does not exists.', 1);
	}
}
?>