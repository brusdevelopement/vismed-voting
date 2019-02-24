<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 16:28
 */

class ControllerVote extends Controller
{
    function __construct()
    {
        $this->model = new ModelVote();
        $this->view = new View();
    }

    function action_index()
    {
        $referal = $this->model->is_referal();

        if($referal == false){
            return $this->view->generate('main_view.php', 'template_view.php');
        }
        $data = $this->model->get_data();
        return $this->view->generate('vote_view.php', 'template_view.php', $data, $referal);
    }

    function action_submit(){
        $double = $this->model->check_double_poll();
        if($double){
            $data = '<h3>К сожалению, голосовать можно только один раз.</h3>';
        } else {
            $this->model->submit_poll();
            $data = '<h3>Спасибо! Ваши голоса приняты.</h3>';
        }

        return $this->view->generate('main_view.php', 'template_view.php', $data);
    }

}