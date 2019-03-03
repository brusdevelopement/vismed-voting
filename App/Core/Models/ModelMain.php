<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 1:58
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class ModelMain implements Model
{
    /**
     * Method counts and returns the sum of votes
     *
     * @return mixed
     */
    public function get_data(){
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