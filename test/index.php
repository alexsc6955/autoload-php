<?php
require_once dirname(__DIR__) . '/src/autoload.php';

use Vbt\Autoload;
use App\Hello;

try {
	new Autoload('App', __DIR__ . '/app');
	$hello = new Hello();
} catch (Exception $e) {
	echo $e->getMessage();
}
?>