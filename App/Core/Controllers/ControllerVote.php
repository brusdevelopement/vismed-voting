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
        $status = $this->model->StartVoteStatus();
        if($status == 1){
            $data = $this->model->get_data();
            return $this->view->generate('vote_view.php', 'template_view.php', $data, $referal);
        } else {
            $data = '<div class="row">
                        <div class="col submit1 text-center"><h3>Голосование ещё не стартовало. Дождитесь начала.</h3></div>
                    </div>
                    <div class="row">
                        <div class="col submit2 text-center">
                            <a class="btn btn-primary" href="/" role="button">Перейти к результатам</a>
                        </div>
                    </div>';
            return $this->view->generate('main_view.php', 'template_view.php', $data);
        }
    }

    function action_submit(){
        $double = $this->model->check_double_poll();
        if($double){
            $data = '<div class="row">
                    <div class="col submit1 text-center"><h3>К сожалению, голосовать можно только один раз.</h3></div>
                    </div>
                    <div class="row">
                    <div class="col submit2 text-center">
        <a class="btn btn-primary" href="/" role="button">Перейти к результатам</a>
    </div>
</div>';
        } else {
            $this->model->submit_poll();
            $data = '<div class="row">
                    <div class="col submit1 text-center"><h3>Спасибо! Ваши голоса приняты.</h3></div>
                    </div>
                    <div class="row">
                    <div class="col submit2 text-center">
        <a class="btn btn-primary" href="/" role="button">Перейти к результатам</a>
    </div>
</div>';
        }

        return $this->view->generate('main_view.php', 'template_view.php', $data);
    }

}