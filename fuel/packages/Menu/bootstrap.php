<?php 


// Add namespace, necessary if you want the autoloader to be able to find classes
Autoloader::add_namespace('Menu', __DIR__.'/classes/');



// And add the classes, this is useful for:
// - optimization: no path searching is necessary
// - it's required to be able to use as a core namespace
// - if you want to break the autoloader's path search rules
Autoloader::add_classes(array(
    'Menu\\MenuBuilder' => __DIR__.'/classes/menu.php',

));