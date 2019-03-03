<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 1:36
 * @author Maxim Brusilovskiy <brys@starlink.ru>
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

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
