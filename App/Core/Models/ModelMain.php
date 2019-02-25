<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 1:58
 */

class ModelMain extends Model
{
    public function countVotes(){
        try{
            $db = new DbPdo();
            $query = "SELECT COUNT(DISTINCT ref_id) as a FROM poll_results;";
            $res = $db->execute($query);
        }catch(PDOException $pe){
            echo $pe->getMessage();
        }
        return $res[0][0];
    }
}