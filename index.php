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

/**
 * Class To Hold All Setting
 */
$z->settings = new BaseClass($z);

/**
 * Include all the settings
 */
include SITE_PATH . '/settings.php';

/**
 * Include All Plugins
 */
include SITE_PATH . '/plugins.php';

/**
 * Connect to the DB.
 */
$z->RunHook('zBeforeDBConnect');
$z->db = new mysqli($z->settings->mysqli_host,
                    $z->settings->mysqli_username,
                    $z->settings->mysqli_password,
                    $z->settings->mysqli_dbname
                    );
$z->RunHook('zAfterDBConnect');


$z->RunHook('zBeforeDBClose');
$z->db->close();
$z->RunHook('zAfterDBClose');