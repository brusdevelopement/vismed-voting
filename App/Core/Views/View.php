<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 2:06
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace App\Core\Views;

class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    function generate($content_view, $template_view, $data = null, $referal = null)
    {

        /*if(is_array($data)) {
            // преобразуем элементы массива в переменные
            //extract($data);
            //print_r($data);
        }*/


        include _ROOT_DIR_.'/Core/Views/'.$template_view;
    }
}