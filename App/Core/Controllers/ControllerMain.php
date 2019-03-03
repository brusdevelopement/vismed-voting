<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 1:57
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class ControllerMain extends Controller
{
    /**
     * ControllerMain constructor.
     *
     * @return void
     */
    function __construct()
    {
        $this->model = new ModelMain();
        $this->view = new View();
    }

    /**
     * Generates page view
     *
     * @return void
     */
    function action_index()
    {
        $vote_cnt = $this->model->get_data();
        $this->view->generate('main_view.php', 'template_view.php', $data=null, $vote_cnt);
    }
}