<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 2:06
 */

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


        include 'App/Core/Views/'.$template_view;
    }
}