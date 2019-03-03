<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 24.02.2019
 * Time: 2:55
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


require_once dirname(__FILE__).'/../config/defines.php';
require_once 'DbPdo.php';
$db = new DbPdo();
$query = "SELECT author_name, sum(score) as score FROM poll_results GROUP BY author_name ORDER BY score DESC;";
    /*$query = "SELECT a.ref_name as author_name, b.score as score FROM stories AS a
              LEFT JOIN (SELECT story_id, sum(score) as score FROM poll_results GROUP BY story_id) AS b ON a.ref_id=b.story_id
              WHERE 1";*/
$res = $db->execute($query);
$table = array();
$table['cols'] = array(
    //Labels for the chart, these represent the column titles
    array('id' => '', 'label' => 'Ф.И.О.', 'type' => 'string'),
    array('id' => '', 'label' => 'Баллов', 'type' => 'number'),
    array('role' => 'annotation', 'type' => 'number')
);
$rows = array();
foreach ($res as $row) {
    $temp = array();
    //Values
    $r = explode(' ', $row['author_name']);
    $row['author_name'] = $r[0].' '.$r[1];
    $temp[] = array('v' => $row['author_name']);
    $temp[] = array('v' => $row['score']);
    $temp[] = array('v' => $row['score']);
    $rows[] = array('c' => $temp);
}
$table['rows'] = $rows;
$jsonTable = json_encode($table, true);
echo $jsonTable;
