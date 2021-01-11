<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	
	public function index()
	{
		if ($this->session->userdata('id_user') == "") {
            redirect('app/login');
        } 
		$data = array(
			'konten' => 'v_maps',
            'judul' => 'Kordinat Alamat Siswa',
		);
		$this->load->view('v_index', $data);
	}

	public function lihat_alumni($id)
	{
		
		$data = array(
			'data' => $this->db->query("SELECT * FROM siswa where id_siswa = '$id'")->row(),
			'konten' => 'v_detail_maps',
            'judul' => 'Kordinat Alamat Siswa',
		);
		$this->load->view('v_index', $data);
	}

	public function edit_alumni($id)
	{
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
	    $this->db->where('id_siswa', $id);
	    $this->db->update('siswa', $data);
	    redirect('app/lihat_alumni/'.$id);
		
	}

	

	public function login()
	{

		if ($this->input->post() == NULL) {
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek_siswa = $this->db->query("SELECT * FROM siswa WHERE nis='$username' and password='$password'");
			$cek_user = $this->db->query("SELECT * FROM user WHERE username='$username' and password='$password' and level='admin' ");
			$cek_admin = $this->db->query("SELECT * FROM user WHERE username='$username' and password='$password' and level='hubin' ");
			if ($cek_user->num_rows() == 1) {
				foreach ($cek_user->result() as $row) {
					$sess_data['id_user'] = $row->id_user;
					$sess_data['nama'] = $row->nama;
					$sess_data['username'] = $row->username;
					$sess_data['level'] = $row->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('app');
			}elseif ($cek_admin->num_rows() == 1) {
				foreach ($cek_admin->result() as $row) {
					$sess_data['id_user'] = $row->id_user;
					$sess_data['nama'] = $row->nama;
					$sess_data['username'] = $row->username;
					$sess_data['level'] = $row->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('app');
			}elseif ($cek_siswa->num_rows() == 1) {
				foreach ($cek_siswa->result() as $row) {
					$sess_data['id_user'] = $row->id_siswa;
					$sess_data['nama'] = $row->nama;
					$sess_data['level'] = '';
					$this->session->set_userdata($sess_data);
				}
				redirect('app');
			} else {
				?>
				<script type="text/javascript">
					alert('Username dan password kamu salah !');
					window.location="<?php echo base_url('app/login'); ?>";
				</script>
				<?php
			}

		}
	}

	function laporan_siswa()
	{
		$this->load->view('siswa/lap_siswa');
	}

	function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		session_destroy();
		redirect('app/login');
	}

	

	


}
