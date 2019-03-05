<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 1:36
 * @author Maxim Brusilovskiy <brys@starlink.ru>
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

use App\Core\Route as Route;
/* correct Apache charset (except if it's too late */
if (!headers_sent()) {
    header('Content-Type: text/html; charset=utf-8');
}
require_once 'defines.php';
require_once _CORE_DIR_.'/Controllers/Controller.php';
require_once _CORE_DIR_.'/Models/Model.php';
require_once _CORE_DIR_.'/Views/View.php';
require_once _CORE_DIR_.'/Route.php';
require_once _CORE_DIR_.'/DbPdo.php';
Route::start();

/**
 * If an error "Class not found" occurs function tries to autoload a class
 *
 * @param $class classname
 */
spl_autoload_register(
    function ($class) {
        $class = explode('\\', $class);
        krsort($class);
        $k = array_keys($class)[0];
    include _ROOT_DIR_.'/Classes/' . $class[$k] . '.php';
});

// include composer autoload
require_once 'vendor/autoload.php';
