<?php
  /**
   *
   */
  class EventModel extends CI_Model
  {
    function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    // function get_mhs($id = FALSE)
    // {
    //   if ($id === FALSE) {
    //     $query = $this->db->get('mhs');
    //     return $query->result();
    //   }else{
    //     $query = $this->db->get_where('mhs', array('nim' => $id ));
    //     return $query->row_array();
    //   }
    // }

    function get_event()
    {
        $query = $this->db->get('kegiatan');
        return $query->result();
    }

    function get_event_by_id($id){
      $query = $this->db->get_where('kegiatan', array('idKegiatan' => $id));

      if ($query->num_rows()==1) {
        return $query->result();
      }
    }

    // function create_event(){
    //     $data = array(
    //         'namaKegiatan' => $this->input->post('namaKegiatan'),
    //         'nickKegiatan' => $this->input->post('nickKegiatan'),
    //         'tanggalKegiatan' => $this->input->post('tanggalKegiatan'),
    //         'waktuMulai' => $this->input->post('waktuMulai'),
    //         'waktuSelesai' => $this->input->post('waktuSelesai')
    //     );
    //     $result = $this->db->insert('kegiatan', $data);
    //     if ($result) {
    //         # code...
    //         redirect('event');
    //     } else {
    //         # code...
    //         $data['msg'] = "Error euy";
    //         $this->load->view('EditEvent',$data);
    //     }
    //
    // }
    //
    // function edit_event($id){
    //     $data = array(
    //       'namaKegiatan' => $this->input->post('namaKegiatan'),
    //       'nickKegiatan' => $this->input->post('nickKegiatan'),
    //       'tanggalKegiatan' => $this->input->post('tanggalKegiatan'),
    //       'waktuMulai' => $this->input->post('waktuMulai'),
    //       'waktuSelesai' => $this->input->post('waktuSelesai')
    //     );
    //     $this->db->where('idKegiatan', $id);
    //     $this->db->update('kegiatan', $data);
    //     return TRUE;
    // }

    function set_event($action,$id){
        $data = array(
          'namaKegiatan' => $this->input->post('namaKegiatan'),
          'nickKegiatan' => $this->input->post('nickKegiatan'),
          'tanggalKegiatan' => $this->input->post('tanggalKegiatan'),
          'waktuMulai' => $this->input->post('waktuMulai'),
          'waktuSelesai' => $this->input->post('waktuSelesai')
        );
        if ($action == "create") {
          return $this->db->insert('kegiatan', $data);
        }elseif($action == "edit"){
          $this->db->where('idKegiatan',$id);
          $query = $this->db->update('kegiatan', $data);
          return $query;
        }
    }

    function del_event($id){
      $this->db->delete('kegiatan', array('idKegiatan' => $id));
      if ($this->db->affected_rows()==1) {
          return true;
      }else {
          return false;
      }
    }
  }

 ?>
