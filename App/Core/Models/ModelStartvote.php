<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 24.02.2019
 * Time: 22:08
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace App\Core\Models;
use App\Core\DbPdo as DbPdo;

class ModelStartvote implements Model
{

    /**
     * Gets and returns start-vote status 0 or 1
     *
     * @return mixed
     */
    public function get_data()
    {
        try{
            $db = new DbPdo();
            $startvote = $db->execute("SELECT start_id FROM start_vote WHERE 1 LIMIT 1;");
        }catch(PDOException $pe){
            echo $pe->getMessage();
        }

        return $startvote[0][0];
    }

    /**
     * Changes start-vote status
     */
    public function StatusChange(){
        $status = $this->get_data();
        if($status == 0){
            $status = 1;
        } else {
            $status = 0;
        }
        try{
            $db = new DbPdo();
            $db->exec("UPDATE start_vote SET start_id = ".$status." WHERE res_id = 1;");
        }catch(PDOException $pe){
            echo $pe->getMessage();
        }
        return;
    }
}