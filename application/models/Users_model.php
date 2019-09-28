<?php
class Users_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_user($user_id){
            $query = $this->db->get_where('users', array('id' => $user_id));
            return $query->row_array();
        }

        public function register_user($user){
            $this->db->insert('users', $user);
        }   

        public function login_user($user){
                $this->db->where('username', $user['username']);
                $this->db->where('password', $user['password']);
                $query = $this->db->get('users'); 

                if ($query->num_rows() == 1)  
                {  
                    return $query->result_array();  
                } else {  
                    return false;  
                }  
        }
        public function profile($user){
                $this->db->where('username', $user);
                $query = $this->db->get('users'); 
                if ($query->num_rows() == 1)  
                    {  
                        return $query->result_array();  
                    } else {  
                        return false;  
                    }  
        }  
}

?>