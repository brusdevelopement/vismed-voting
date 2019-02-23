<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 1:42
 */

class Route
{
        static function start(){
            // контроллер и действие по умолчанию
            $controller_name = 'Main';
            $action_name = 'index';

            $routes = explode('/', $_SERVER['REQUEST_URI']);

            switch ($routes[1]){
                case ('index.php'):
                    $routes[1] = 'Main';
                    break;
                case(''):
                    $routes[1] = 'Main';
                    break;
                default:
                    break;
            }

            // получаем имя контроллера
            if ( !empty($routes[1]) )
            {
                $controller_name = ucfirst($routes[1]);
            }

            // получаем имя экшена
            if ( !empty($routes[2]) )
            {
                $action_name = $routes[2];
            }

            // добавляем префиксы
            $model_name = 'Model'.$controller_name;
            $controller_name = 'Controller'.$controller_name;
            $action_name = 'action_'.$action_name;

            // подцепляем файл с классом модели (файла модели может и не быть)

            $model_file = $model_name.'.php';
            $model_path = 'App/Core/Models/'.$model_file;
            if(file_exists($model_path))
            {
                include 'App/Core/Models/'.$model_file;
            }

            // подцепляем файл с классом контроллера
            $controller_file = $controller_name.'.php';
            $controller_path = 'App/Core/Controllers/'.$controller_file;
            if(file_exists($controller_path))
            {
                include 'App/Core/Controllers/'.$controller_file;
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

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}