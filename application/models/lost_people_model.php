<?php

/**
 * Description of user_model
 *
 * @author david bwire
 */
class lost_people_model extends CI_Model{
    
    const TABLE = 'lost_people';
    /*
     * @param array $data
     */
    public function createUser($data = array()){
        if(count($data)){
            $count  = $this->db->insert(self::TABLE, $data);
            if($count){
                return TRUE;
            } else {
                return FALSE;
            }
            
        }
        
    }
    /*
     * @param int $id
     * @param array $data
     */
    public function updateUser($id,$data = array()){
        
        if(count($data)){
            $this->db->where('id', $id);
           $count = $this->db->update(self::TABLE, $data);
           
           if($count){
               return TRUE;
           }  else {
               return FALSE;
           }
            
        }
        
                
        
    }
    /*
     * @param int $id
     * @return array 
     */
    public function getUser($id){
        $q = $this->db->select('*')
                ->from(self::TABLE)
                ->where('id',$id)
                ->get();
        if($q->num_rows()>0){
             return $q->result();
        }
        
        
        
    }
    /*
     * @return array
     */
    public function getAll(){
        $q = $this->db->select('*')
                ->from(self::TABLE)
                ->get();
        
        if($q->num_rows()>0){
             return $q->result();
        }
    }
 
    
}

?>
