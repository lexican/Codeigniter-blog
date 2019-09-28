<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function get_news($slug = FALSE){
        if ($slug === FALSE)
        {
            $this->db->order_by('created_at', 'DESC');
            $query = $this->db->get('news');
            return $query->result_array();
        }
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }
    public function get_post($id){
        $query = $this->db->get_where('news', array('id' => $id));
        return $query->row_array();
    }
    public function delete_post($slug){
        return $this->db->delete('news', array('slug' => $slug));
    }

    public function isLiked($user_id, $post_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('post_id', $post_id);
        $query = $this->db->get('likes'); 
        if ($query->num_rows() == 1)  
            {  
                return $query->result_array();  
            } else {  
                return false;  
            }  
}

    public function add_like($user_id, $post_id){
        $data = array(
            'user_id' => $user_id,
            'post_id' => $post_id
            );
        $query = $this->db->get_where('likes', $data);
        if ($query->num_rows() == 1)  
        {  
            $query = $this->db->get_where('news', array('id' => $post_id));
            $result = $query->row_array();
            $n = $result['likes'];
            return $n;  
        } else {  
            $query = $this->db->get_where('news', array('id' => $post_id));
            $result = $query->row_array();
            $n = $result['likes'];
            $this->db->set('likes', $n+1);
            $this->db->where('id', $post_id);
            $this->db->update('news');
            $data = array(
                'user_id' => $user_id,
                'post_id' => $post_id
        );
        $this->db->insert('likes', $data);
        return $n+1; 
        }  
    }

    public function remove_like($user_id, $post_id){
        $data = array(
            'user_id' => $user_id,
            'post_id' => $post_id
            );
        $query = $this->db->get_where('likes', $data);
        if ($query->num_rows() == 1)  
        {  
            $query = $this->db->get_where('news', array('id' => $post_id));
            $result = $query->row_array();
            $n = $result['likes'];
            $this->db->set('likes', $n-1);
            $this->db->where('id', $post_id);
            $this->db->update('news');
            $data = array(
                'user_id' => $user_id,
                'post_id' => $post_id
        );
        $this->db->delete('likes', $data);
        return $n-1;   
        }else{
            $query = $this->db->get_where('news', array('id' => $post_id));
            $result = $query->row_array();
            $n = $result['likes'];
            return $n;
        }

        $query = $this->db->get_where('news', array('id' => $post_id));
        $result = $query->row_array();
        $n = $result['likes'];
        $this->db->set('likes', $n-1);
        $this->db->where('id', $post_id);
        $this->db->update('news');
        $data = array(
            'user_id' => $user_id,
            'post_id' => $post_id
    );
    $this->db->delete('likes', $data); 
    return $n-1;
    }
        public function test($slug){
            $this->db->select('*');
            $this->db->from('news');
            $this->db->join('users', 'users.id = news.user_id', 'inner');
            $query = $this->db->get();
            return $query->result_array();
        }


        public function add_post($data){
            $this->db->insert('news', $data);
        }
        public function update_post($post_id, $data){
            $this->db->where('id', $post_id);
            $this->db->update('news', $data);
        }
        public function add_comment($data){
            $this->db->insert('comment', $data);  
        } 
        public function update_comment( $data ){
            $this->db->set('comment_body', $data['comment_body']);
            $this->db->set('edited_at', date('Y-m-d H:i:s'));
            $this->db->where('id', $data['comment_id'] );
            $this->db->update('comment');
        }  
        public function get_post_comment($comment_id, $post_id){
            $data = array(
                'id' => $comment_id,
                'post_id' => $post_id,
                'comment_username' => $_SESSION['user']
            );
            $query = $this->db->get_where('comment', $data);
            if ($query->num_rows() == 1){
                return $query->row_array();
            }else{
                return false;
            }
            
        }
        public function get_post_comments($post_id){
            $query = $this->db->get_where('comment', array('post_id' => $post_id));
            return $query->result_array();
        }
        public function total_comments($post_id){
            $this->db->like('post_id', $post_id);
            $this->db->from('comment');
            return $this->db->count_all_results();
        }
}
?>