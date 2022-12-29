<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_model extends CI_Model
{
    public function status()
    {
        return $this->db->get('lit_status_proposal')->result();
    }

    public function savestatus()
    {
        $this->status_desc   = $this->input->post('status');
        $this->status_update = date('Y-m-d H:i:s');

        return $this->db->insert('lit_status_proposal', $this);
    }

    public function updatestatus()
    {
        $id = $this->input->post('id_status');
        $status = $this->input->post('status');
        $date = date('Y-m-d H:i:s');

        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `lit_status_proposal` SET `status_desc` = '$status', `status_update` = '$date' WHERE `status_id` = '$ids'");
    }

    public function deletestatus($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lit_status_proposal', array("status_id" => $ids));
    }
}
