<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'C:'.DS.'wamp64'.DS.'www'.DS.'Gallery_System');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'admin'.DS.'includes');




require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("session.php");
require_once("comment.php");
require_once("paginate.php");
require_once("photo_library_modal.php");
