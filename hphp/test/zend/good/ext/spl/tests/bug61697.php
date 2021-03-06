<?php

function f1($class) { echo "f1: [[$class]]\n"; }
function f2($class) { echo "f2: [[$class]]\n"; }

spl_autoload_register('f1');
spl_autoload_register('f2');
spl_autoload_register($class ==> { echo "cf1: [[$class]]\n"; });
spl_autoload_register($class ==> { echo "cf2: [[$class]]\n"; });

foreach (spl_autoload_functions() AS $func)
{
    spl_autoload_unregister($func);
}

print_r(spl_autoload_functions());
?>
