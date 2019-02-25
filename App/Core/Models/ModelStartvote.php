<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 24.02.2019
 * Time: 22:08
 */

class ModelStartvote extends Model
{
    public function StartVoteStatus(){
        try{
            $db = new DbPdo();
            $query = "SELECT start_id FROM start_vote WHERE 1 LIMIT 1;";
            $res = $db->execute($query);
        }catch(PDOException $pe){
            echo $pe->getMessage();
        }

        return $res[0][0];
    }

    public function StatusChange(){
        $status = $this->StartVoteStatus();
        if($status == 0){
            $status = 1;
        } else {
            $status = 0;
        }
        try{
            $db = new DbPdo();
            $query = "UPDATE start_vote SET start_id = ".$status." WHERE res_id = 1;";
            $db->exec($query);
        }catch(PDOException $pe){
            echo $pe->getMessage();
        }
        return;
    }
}