<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 18:59
 */

class DbPdo
{
    public $pdo;

    public function __construct($specArg = null)
    {
        if($specArg!=null){
            $settings = $this->getPDOSettings2();
        } else {
            $settings = $this->getPDOSettings();
        }
        $this->pdo = new \PDO($settings['dsn'], $settings['user'], $settings['pass'], array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ));

    }

    protected function getPDOSettings()
    {
        $config = include 'App/config/db.php';
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;
    }
    protected function getPDOSettings2()
    {
        $config = include '../config/db.php';
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;
    }

    public function execute($query, array $params=null)
    {

        if(is_null($params)){
            $stmt = $this->pdo->query($query);
            return $stmt->fetchAll();
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();

    }

    public function exec($query){
        return $stmt = $this->pdo->exec($query);
    }
}