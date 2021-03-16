<?php
function autoloader($class_name)
{
    require('classes/'.$class_name.'.php');
}

spl_autoload_register('autoloader');
