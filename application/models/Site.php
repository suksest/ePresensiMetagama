<?php
    class Site extends CI_Model
    {
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        public function auth($data) {
            $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . md5($data['password']) . "'";
            $this->db->select('*');
            $this->db->from('userLogin');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        public function getInfo($username) {
            $condition = "username =" . "'" . $username . "'";
            $this->db->select('*');
            $this->db->from('userLogin');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return $query->result();
            } else {
                return FALSE;
            }

        }
    }
?>
