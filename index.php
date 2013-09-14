<?php

/**
 * Path to root directory.
 *
 * @var string $SitePath
 */
$sitePath = realpath(dirname(__FILE__));

/**
 * @const Path to root directory.
 */
define('SITE_PATH', $sitePath);


/**
 * Automatically Load Class.
 * @param $className
 * @return bool
 */
function __autoload( $className )
{

    if (file_exists(SITE_PATH . '/class/' . $className . '.php')) {

        include_once SITE_PATH . '/class/' . $className . '.php';

        return true;

    }

    return false;

}

/**
 * @var $z z Class
 */
$z = new z();