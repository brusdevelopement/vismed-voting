<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 24.02.2019
 * Time: 2:55
 */

require_once 'DbPdo.php';
$db = new DbPdo('SpecArg');
//$query = "SELECT author_name, sum(score) as score FROM poll_results GROUP BY author_name;";
    $query = "SELECT a.ref_name as author_name, b.score as score FROM stories AS a
              LEFT JOIN (SELECT story_id, sum(score) as score FROM poll_results GROUP BY story_id) AS b ON a.ref_id=b.story_id
              WHERE 1";
$res = $db->execute($query);
$table = array();
$table['cols'] = array(
    //Labels for the chart, these represent the column titles
    array('id' => '', 'label' => 'FIO', 'type' => 'string'),
    array('id' => '', 'label' => 'Score', 'type' => 'number')
);
$rows = array();
foreach ($res as $row) {
    $temp = array();
    //Values
    $r = explode(' ', $row['author_name']);
    $row['author_name'] = $r[0].' '.$r[1];
    if($row['score']=null){
        $row['score'] = 10;
    }
    $temp[] = array('v' => $row['author_name']);
    $temp[] = array('v' => $row['score']);
    $rows[] = array('c' => $temp);
}
$table['rows'] = $rows;
$jsonTable = json_encode($table, true);
//var_dump($jsonTable);
echo $jsonTable;
