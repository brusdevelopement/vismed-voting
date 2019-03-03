<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 2:02
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

abstract class Controller
{
    /**
     * @var Model name
     */
    protected $model;
    /**
     * @var View name
     */
    protected $view;

    /**
     * Controller constructor.
     */
    abstract function __construct();
}