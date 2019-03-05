<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 2:12
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace App\Core\Controllers;

class Controller404 extends Controller
{
    /**
     * Controller404 constructor.
     *
     * @return void
     */
    function __construct()
    {
        $this->view = new View();
    }

    /**
     * @return void
     */
    function action_index()
    {
        $this->view->generate('404_view.php', 'template_view.php');
    }
}