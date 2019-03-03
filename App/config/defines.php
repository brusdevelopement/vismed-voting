<?php
/**
 * Created by PhpStorm.
 * User: Maxim.Brusilovskiy
 * Date: 02.03.2019
 * Time: 2:21
 *
 * @author Maxim Brusilovskiy <brys@starlink.ru>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

$currentDir = dirname(__FILE__);

if (!defined('_ROOT_DIR_')) {
    define('_ROOT_DIR_', realpath($currentDir.'/..'));
}
if (!defined('_CORE_DIR_')) {
    define('_CORE_DIR_', realpath($currentDir.'/../Core'));
}