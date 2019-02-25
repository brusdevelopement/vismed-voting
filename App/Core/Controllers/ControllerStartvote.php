<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 24.02.2019
 * Time: 22:08
 */

class ControllerStartvote extends Controller
{
    function __construct()
    {
        $this->model = new ModelStartVote();
        $this->view = new View();
    }

    function action_index()
    {
        $status=$this->model->StartVoteStatus();
        $this->view->generate('startvote_view.php', 'template_view.php', $status);
    }

    function action_submit()
    {
        $this->model->StatusChange();
        $status=$this->model->StartVoteStatus();
        $this->view->generate('startvote_view.php', 'template_view.php', $status);
    }
}