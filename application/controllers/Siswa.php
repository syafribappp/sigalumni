<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'siswa/index.html';
            $config['first_url'] = base_url() . 'siswa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Siswa_model->total_rows($q);
        $siswa = $this->Siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'siswa_data' => $siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'siswa/siswa_list',
            'judul' => 'Data Siswa',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_siswa' => $row->id_siswa,
		'nis' => $row->nis,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'nohp' => $row->nohp,
		'wali' => $row->wali,
		'latittude' => $row->latittude,
		'longitude' => $row->longitude,
	    );
            $this->load->view('siswa/siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('siswa/create_action'),
	    'id_siswa' => set_value('id_siswa'),
	    'nis' => set_value('nis'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'nohp' => set_value('nohp'),
	    'wali' => set_value('wali'),
	    'latittude' => set_value('latittude'),
	    'longitude' => set_value('longitude'),
        'password' => set_value('password'),
        'kode_jurusan' => set_value('kode_jurusan'),
        'konten' => 'siswa/siswa_form',
            'judul' => 'Data Siswa',
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nis' => $this->input->post('nis',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nohp' => $this->input->post('nohp',TRUE),
		'wali' => $this->input->post('wali',TRUE),
		'latittude' => $this->input->post('latittude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
        'password' => $this->input->post('password',TRUE),
        'kode_jurusan' => $this->input->post('kode_jurusan',TRUE),
	    );

            $this->Siswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('siswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('siswa/update_action'),
		'id_siswa' => set_value('id_siswa', $row->id_siswa),
		'nis' => set_value('nis', $row->nis),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'nohp' => set_value('nohp', $row->nohp),
		'wali' => set_value('wali', $row->wali),
		'latittude' => set_value('latittude', $row->latittude),
		'longitude' => set_value('longitude', $row->longitude),
        'password' => set_value('password', $row->password),
        'kode_jurusan' => set_value('kode_jurusan', $row->kode_jurusan),
        'konten' => 'siswa/siswa_form',
            'judul' => 'Data Siswa',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_siswa', TRUE));
        } else {
            $data = array(
		'nis' => $this->input->post('nis',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nohp' => $this->input->post('nohp',TRUE),
		'wali' => $this->input->post('wali',TRUE),
		'latittude' => $this->input->post('latittude',TRUE),
		'longitude' => $this->input->post('longitude',TRUE),
        'password' => $this->input->post('password',TRUE),
        'kode_jurusan' => $this->input->post('kode_jurusan',TRUE),
	    );

            $this->Siswa_model->update($this->input->post('id_siswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('siswa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nis', 'nis', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('nohp', 'nohp', 'trim|required');
	$this->form_validation->set_rules('wali', 'wali', 'trim|required');
	$this->form_validation->set_rules('latittude', 'latittude', 'trim|required');
	$this->form_validation->set_rules('longitude', 'longitude', 'trim|required');

	$this->form_validation->set_rules('id_siswa', 'id_siswa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

