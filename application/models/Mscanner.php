<?php
    class Mscanner extends CI_Model
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
                // echo "gak ada nim ".$id;
                $data['status'] = "false";
                $data['query'] = $this->db->query("SELECT * FROM kehadiran,mentee WHERE kehadiran.nim = mentee.nim ORDER BY kehadiran.idKehadiran DESC LIMIT 1")->result(); //query ini hanya untuk handle tampilan awal agar tidak ada error di vscanner
                $this->load->view('vscanner', $data);
            }else{
                $kehadiran = array(
                    'nim' => $mentee->nim,
                    'waktuDatang' => date("Y-m-d H:i:s"),
                    // 'waktuPulang' => NULL,
                    'keterangan' => 'H'
                );
                $this->db->insert('kehadiran', $kehadiran);
                $data['status'] = "true";
                $data['query'] = $this->get_last_kehadiran();
                $this->load->view('vscanner', $data);
            }
            // $result = array_merge($data, $status);
            // print_r($result);
        }

        function get_last_kehadiran(){
            $query = $this->db->query("SELECT * FROM kehadiran,mentee WHERE kehadiran.nim = mentee.nim ORDER BY kehadiran.idKehadiran DESC LIMIT 1");
            // print_r($query);
            return $query->result();
        }
    }
    // if ($mentee==NULL) {
    //     $data = array('nim' => NULL);
    //     echo "gak masuk";
    // }else{
    //     //dibaris ini ganti dengan query retrieve waktu kedatangan
    //     $waktuDatang = date("Y-m-d H:i:s");
    //     if ($waktuDatang ) {
    //         # code...
    //     }
    //     $data = array(
    //         'nim' => $mentee->nim,
    //         'waktuDatang' => date("Y-m-d H:i:s"),
    //         'keterangan' => 'H'
    //     );
    //     $this->db->insert('kehadiran', $data);
    //     $kehadiran = $this->get_last_kehadiran();
    //     $this->load->view('vscanner', $kehadiran);
    // }
?>
