<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 1:42
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Route
{
    /**
     *
     */
    static function start(){
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        //$routes = explode('/', $_SERVER['REQUEST_URI']);
        $routes = parse_url($_SERVER['REQUEST_URI']);

        switch ($routes['path']){
            case ('/index.php'):
                $routes['path'] = 'Main';
                break;
            case(''):
                $routes['path'] = 'Main';
                break;
            default:
                $routes['path'] = explode('/', $routes['path']);
                break;
        }

        // получаем имя контроллера
        if ( !empty($routes['path'][1]) )
        {
            $controller_name = ucfirst($routes['path'][1]);
        }

        // получаем имя экшена
        if ( !empty($routes['path'][2]) )
        {
            $action_name = $routes['path'][2];
            //print_r($action_name);
        }

        // добавляем префиксы
        $model_name = 'Model'.$controller_name;
        $controller_name = 'Controller'.$controller_name;
        $action_name = 'action_'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = $model_name.'.php';
        $model_path = _CORE_DIR_.'/Models/'.$model_file;
        if(file_exists($model_path))
        {
            include _CORE_DIR_.'/Models/'.$model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name.'.php';
        $controller_path = _CORE_DIR_.'/Controllers/'.$controller_file;
        if(file_exists($controller_path))
        {
            include _CORE_DIR_.'/Controllers/'.$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action();
        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }

    }

    /**
     *
     */
    function ErrorPage404()
        {
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:'.$host.'404');
            exit();
        }
}