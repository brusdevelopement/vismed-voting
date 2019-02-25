<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 1:57
 */

class ControllerMain extends Controller
{
    function __construct()
    {
        $this->model = new ModelMain();
        $this->view = new View();
    }

    function action_index()
    {
        $vote_cnt = $this->model->countVotes();
        $this->view->generate('main_view.php', 'template_view.php', $data=null, $vote_cnt);
    }
}