<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_model extends CI_Model
{
    public function status()
    {
        return $this->db->get('lemlit_status')->result();
    }

    public function savestatus()
    {
        $this->status_desc   = $this->input->post('status');
        $this->status_update = date('Y-m-d H:i:s');

        return $this->db->insert('lemlit_status', $this);
    }

    public function updatestatus()
    {
        $id = $this->input->post('id_status');
        $status = $this->input->post('status');
        $date = date('Y-m-d H:i:s');

        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `lemlit_status` SET `status_desc` = '$status', `status_update` = '$date' WHERE `status_id` = '$ids'");
    }

    public function deletestatus($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lemlit_status', array("status_id" => $ids));
    }
}
