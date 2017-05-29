<?php
    class ScannerModel extends CI_Model
    {
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function get_mentee($id){
            $query = $this->db->get_where('mentee', array('nim' => $id));
            if($query->num_rows()==1){
                return $query->row();
            }
        }

        function set_kehadiran(){
            $id = $this->input->post('nim');
            $mentee = $this->get_mentee($id);
            date_default_timezone_set("Asia/Jakarta");
            if ($mentee == NULL) {
                $data['status'] = "false";
                $data['title'] = "Scan | ePresensi Metagama POLBAN";
                //$data['query'] = $this->db->query("SELECT * FROM kehadiran,mentee WHERE kehadiran.nim = mentee.nim ORDER BY kehadiran.waktuDatang DESC LIMIT 1")->row(); //query ini hanya untuk handle tampilan awal agar tidak ada error di vscanner
                $this->load->view('Scanner', $data);
            }else{
                $kehadiran = array(
                    'nim' => $mentee->nim,
                    'idKegiatan' => 2,
                    'waktuDatang' => date("Y-m-d H:i:s"),
                    // 'waktuPulang' => NULL,
                    'keterangan' => 'H'
                );
                $check = $this->db->get_where('kehadiran', array('nim' => $kehadiran['nim'], 'idKegiatan' => $kehadiran['idKegiatan']))->num_rows();
                if ($check==0) {
                    $data['status'] = "true";
                    $this->db->insert('kehadiran', $kehadiran);
                    $data['query'] = $this->get_last_kehadiran();
                } else {
                    $data['status'] = "already";
                    $condition = "kehadiran.nim =" . "'" . $kehadiran['nim'] . "' AND kehadiran.nim = mentee.nim AND kehadiran.idKegiatan = 2";
                    $this->db->select('*');
                    $this->db->from('kehadiran,mentee');
                    $this->db->where($condition);
                    $this->db->limit(1);
                    $q = $this->db->get();
                    $data['query'] = $q->result();
                }
                $data['title'] = "Scan | ePresensi Metagama POLBAN";
                $this->load->view('Scanner', $data);
            }
        }

        function get_last_kehadiran(){
            $query = $this->db->query("SELECT * FROM kehadiran,mentee WHERE kehadiran.nim = mentee.nim ORDER BY kehadiran.waktuDatang DESC LIMIT 1");
            // print_r($query);
            return $query->result();
        }
    }
?>
