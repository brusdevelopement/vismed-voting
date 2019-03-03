<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 16:28
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

include _CORE_DIR_.'/Controllers/ControllerStartvote.php';
include _CORE_DIR_.'/Models/ModelStartvote.php';

class ControllerVote extends ControllerStartvote
{
    /**
     * ControllerVote constructor.
     *
     * @return void
     */
    function __construct()
    {
        parent::__construct();
        $this->model2 = new ModelVote();
    }

    /**
     * @return mixed
     */
    function action_index()
    {
        $referal = $this->model2->is_referal();
        if($referal == false){
            $votes = self::vote_count();
            return $this->view->generate('main_view.php', 'template_view.php', $dat = null, $votes);
        }
        $status = $this->model->get_data();
        if($status == 1){
            $data = $this->model2->get_data();
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

    function vote_count(){
        include_once _CORE_DIR_.'/Models/ModelMain.php';
        $main_obj = new ModelMain();
        return $main_obj->get_data();
    }

    /**
     * @return mixed
     */
    function action_submit(){
        $double = $this->model2->check_double_poll();
        if ($double == FALSE){
            $data = '<div class="row">
                        <div class="col submit2 text-center">
                            <a class="btn btn-primary" href="/" role="button">Перейти к результатам голосования</a>
                        </div>
                    </div>';
            return $this->view->generate('main_view.php', 'template_view.php', $data);
        }
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
            $this->model2->submit_poll();
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