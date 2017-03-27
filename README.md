# autoload-php

Autoload class with namespace support

## Usage

You just need the autoload file. Save it into your vendor directory and include it into your file.

Declare the use of the ``Vbt\Autoload`` class and any other class you are going to use and call them inside a ``try`` to catch exceptions if there's any.

``Vbt\Autoloa`` requires two params: ``$namespace`` is a string with the namespace you are using and ``$filePath`` a string with the path to your classes dir.

```php
require_once __DIR__ . '/vendor/autoload.php';

use Vendor\Vbt\Autoload,
    Exception;
    
try {
    new Autoload('App', __DIR__ .'/app');
    $myApp = new Init();
} catch (Exception $e) {
    echo $e->getMessage();
}
```