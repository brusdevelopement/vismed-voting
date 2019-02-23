<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 2:12
 */

class ControllerSearch extends Controller
{
    function action_index()
    {
        $this->view->generate('search_view.php', 'template_view.php');
    }

    function action_search(){

    }
}