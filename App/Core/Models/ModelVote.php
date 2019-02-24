<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 16:29
 */

class ModelVote extends Model
{
    /*
     * Get storytellers
     * */
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
    public function get_referal(...$link)
    {
        if($link){
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

    public function get_region($ref){
        $query = "SELECT region_id FROM ref_links WHERE ref_id=".$ref." LIMIT 1";
        $db = new DbPdo();
        $res = $db->execute($query);
        if(empty($res)){
            return 100;
        }
        return $res[0]['region_id'];
    }

    public function submit_poll(){
        $ref_id = $this->get_referal('true');
        $arr = $_POST;
        $query = "INSERT INTO poll_results (ref_id, author_name, story_id, score) VALUES ";
        foreach($arr as $story => $score){
            $name = $this->get_storyteller($story);
            $query .= "('{$ref_id}', '{$name}', '{$story}', '{$score}'), ";
        }
        $query = substr($query, 0, -2).';';
        //$db = new PDO('mysql:host=localhost;dbname=vismed_poll;charset=utf8', 'vismeddbadmin', '$1dwa2sK7&', array(
        //    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        //));
        $db = new DbPdo();
        $db->exec($query);
    }

    public function get_storyteller($ref){
        $query = "SELECT ref_name FROM ref_links WHERE ref_id=".$ref." LIMIT 1";
        $db = new DbPdo();
        $res = $db->execute($query);
        if(empty($res)){
            return '';
        }
        return $res[0]['ref_name'];
    }

    public function check_double_poll(){
        $ref_id = $this->get_referal('true');
        $query = "SELECT ref_id FROM poll_results WHERE ref_id=".$ref_id." LIMIT 1";
        $db = new DbPdo();
        return $res = $db->execute($query);
    }
}