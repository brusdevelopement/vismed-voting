<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 24.02.2019
 * Time: 22:08
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace App\Core\Controllers;
use App\Core\Models\ModelStartvote as ModelStartvote;
use App\Core\Views\View as View;

class ControllerStartvote extends Controller
{
    function __construct()
    {
        $this->model = new ModelStartVote();
        $this->view = new View();
    }

    function action_index()
    {
        $status=$this->model->get_data();
        $this->view->generate('startvote_view.php', 'template_view.php', $status);
    }

    function action_submit()
    {
        $this->model->StatusChange();
        $status=$this->model->get_data();
        $this->view->generate('startvote_view.php', 'template_view.php', $status);
    }
}