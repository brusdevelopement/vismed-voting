<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 16:29
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class ModelVote implements Model
{

    /**
     * Get storytellers
     *
     * @return array
     */
    public function get_data()
    {
        try{
            $db = new DbPdo();
            $query = "SELECT * FROM stories WHERE 1;";
            $res = $db->execute($query);
        }catch(PDOException $pe){
            echo $pe->getMessage();
        }
        $referal = $this->get_referal();
        $region = $this->get_region($referal);
        $stories = [];
        foreach ($res as $v){
            if($referal != $v['ref_id'] && $region != $v['region_id']) {
                $stories[$v['ref_id']] = $v['ref_name'];
            }
        }
        return $stories;
    }

    /**
     * @return bool
     */
    public function is_referal(){
        $ref = $this->get_referal();
        $query = "SELECT * FROM ref_links WHERE ref_id=".$ref." LIMIT 1";
        $db = new DbPdo();
        $res = $db->execute($query);
        if(!empty($res)){
            $is_ref = true;
        } else {
            $is_ref = false;
        }
        return $is_ref;
    }

    /**
     * @param mixed ...$link
     *
     * @return int
     */
    public function get_referal(...$link)
    {
        if($link && key_exists('HTTP_REFERER', $_SERVER)){
            $array = parse_url($_SERVER['HTTP_REFERER']);
            if(key_exists('query', $array) ) {
                $arr = explode('=', $array['query']);
                $ref = $arr[1];
            }
            return $ref;
        }
        $ref = 1;
        $array = parse_url($_SERVER['REQUEST_URI']);
        if(key_exists('query', $array) ) {
            $arr = explode('=', $array['query']);
            $ref = $arr[1];
        }
        return $ref;
    }

    /**
     * @param $ref
     *
     * @return int
     */
    public function get_region($ref){
        $query = "SELECT region_id FROM ref_links WHERE ref_id=".$ref." LIMIT 1";
        $db = new DbPdo();
        $res = $db->execute($query);
        if(empty($res)){
            return 100;
        }
        return $res[0]['region_id'];
    }

    /**
     * Submitting poll results to DB
     *
     * @return void
     */
    public function submit_poll(){
        $ref_id = $this->get_referal('true');
        $arr = $_POST;
        $query = "INSERT INTO poll_results (ref_id, author_name, story_id, score) VALUES ";
        foreach($arr as $story => $score){
            $name = $this->get_storyteller($story);
            $query .= "('{$ref_id}', '{$name}', '{$story}', '{$score}'), ";
        }
        $query = substr($query, 0, -2).';';
        $db = new DbPdo();
        $db->exec($query);
    }

    /**
     * @param $ref
     *
     * @return string
     */
    public function get_storyteller($ref){
        $query = "SELECT ref_name FROM ref_links WHERE ref_id=".$ref." LIMIT 1";
        $db = new DbPdo();
        $res = $db->execute($query);
        if(empty($res)){
            return '';
        }
        return $res[0]['ref_name'];
    }

    /**
     * @return array|bool
     */
    public function check_double_poll(){
        if(key_exists('HTTP_REFERER', $_SERVER)){
            $ref_id = $this->get_referal('true');
            $query = "SELECT ref_id FROM poll_results WHERE ref_id=".$ref_id." LIMIT 1";
            $db = new DbPdo();
            return $res = $db->execute($query);
        }
        return false;
    }
}