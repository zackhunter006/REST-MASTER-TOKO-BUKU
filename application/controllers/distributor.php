<?php
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';
 
class mahasiswa extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
 
    // show data distributor
    function index_get() {
        $iddistributor = $this->get('iddistributor');
        if ($iddistributor == '') {
            $distributor = $this->db->get('distributor')->result();
        } else {
            $this->db->where('iddistributor', $iddistributor);
            $distributor = $this->db->get('distributor')->result();
        }
        $this->response($distributor, 200);
    }
 
    // insert new data to distributor
    function index_post() {
        $data = array(
                'iddistributor'     => $this->post('iddistributor'),
                'namadistributor'   => $this->post('nama'),
                'alamat'    		=> $this->post('alamat'),
                'telepon'        	=> $this->post('telepon'));
        $insert = $this->db->insert('distributor', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // update data distributor
    function index_put() {
        $iddistributor = $this->put('iddistributor');
        $data = array(
                    'iddistributor'     => $this->put('iddistributor'),
                    'namadistributor'   => $this->put('namadistributor'),
                    'alamat'			=> $this->put('alamat'),
                    'telepon'    		=> $this->put('telepon'));
        $this->db->where('iddistributor', $iddistributor);
        $update = $this->db->update('distributor', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // delete distributor
    function index_delete() {
        $nim = $this->delete('iddistributor');
        $this->db->where('iddistributor', $iddistributor);
        $delete = $this->db->delete('distributor');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
}