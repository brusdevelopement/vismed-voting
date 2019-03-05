<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 18:59
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace App\Core;

class DbPdo
{

    /**
     * @var PDO
     */
    public $pdo;


    /**
     * DbPdo constructor.
     * Returns new PDO
     *
     * @return PDO
     */
    public function __construct()
    {
        $settings = $this->getPDOSettings();
        return $this->pdo = new \PDO($settings['dsn'], $settings['user'], $settings['pass'], array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ));

    }

    /**
     * Gets db connection settings
     *
     * @return mixed
     */
    protected function getPDOSettings()
    {
        $config = include _ROOT_DIR_ . '/config/settings.php';
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;
    }

    /**
     * Executes an SQL statement, returning a result set as a PDOStatement object
     *
     * @param $query
     * @param array|null $params
     *
     * @return array
     */
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

    /**
     * Execute an SQL statement and return the number of affected rows
     *
     * @param $query
     *
     * @return int
     */
    public function exec($query){
        return $stmt = $this->pdo->exec($query);
    }
}