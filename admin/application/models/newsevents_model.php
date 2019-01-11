<?php
/**
 * distance_model
 * 
 * @package distance_model
 * @subpackage Model
 * @author  Saniya Memon //user
 * @link URL
 */
class Newsevents_model  extends CI_Model{
     public $table = 'newsevents';
     /** 
 * query to get single or multiple rows based on parameter
 * @access public 
 * @param Integer
 * @return Array
 */    
    public function get($id=0){
        
        if($id !== 0) $query = $this->db->where('id',$id)->get($this->table);
        else $query = $this->db->get($this->table);
           
        return $query->result_array();
    }
/** 
 * Insert in to table query
 * @access public 
 * @param Array
 * @return Boolean
 */
    public function add($insertData){
        if($this->db->insert($this->table, $insertData))
                return TRUE;
    }
/** 
 * Update table query
 * @access public 
 * @param Integer,Array
 * @return Boolean
 */    
    public function update($id,$updateData){
        if($this->db->update($this->table,$updateData,array('id'=>$id)))
                //echo $this->db->last_query(); die;
            return TRUE;
        
    }
/** 
 * delete row query
 * @access public 
 * @param Integer
 * @return Boolean
 */    
    public function delete($id){
        if($this->db->where('id',$id)->delete($this->table))
        return TRUE;
        else 
            return FALSE;
    }
    
}
