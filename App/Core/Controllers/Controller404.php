<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 2:12
 */

class Controller404 extends Controller
{
    function action_index()
    {
        $this->view->generate('404_view.php', 'template_view.php');
    }
}