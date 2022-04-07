<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_login();
    }



function validasi_username()
{
    $v_username = $this->input->post('username');
    $v_id = $this->input->post('user_id');

    if (!$v_id) {
        if ($this->M_read->cek_username_aja($v_username)) {
            $this->session->set_flashdata('error', 'Username telah tersedia!');
            return FALSE;   
        }
        return TRUE;
    }else {
        if ($this->M_read->cek_username($v_username,$v_id)) {
            $this->session->set_flashdata('error', 'Username telah tersedia!');
            return FALSE;   
        }
        return TRUE;    
    }
}


    //BERANDA
    public function index(){

        $v_data['is_aktif'] = 'beranda';
        $total_siswa = $this->M_read->get_total_siswa_by_guru($this->session->userdata('id_user'))->row_array();
        $v_data['isi_konten'] = '

            <div class="row">         
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Siswa</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> '.$total_siswa['total'].' </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        ';
        $this->load->view('templates/header',$v_data);
        $this->load->view('templates/sidebar_guru',$v_data);
        $this->load->view('templates/topbar_guru',$v_data);
        $this->load->view('beranda/beranda',$v_data);
        $this->load->view('templates/footer_guru');            
    }



    //PENGATURAN
    public function pengaturan(){
        
        $v_id = $this->session->userdata('id_user');

        $v_data['data'] = $this->M_read->get_akun($v_id);

        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validasi_username', [
            'required' => 'Kolom harus diisi!',
        ]);
        

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar_guru',$v_data);
            $this->load->view('templates/topbar_guru',$v_data);
            $this->load->view('profile/pengaturan',$v_data);
            $this->load->view('templates/footer_guru');       
        }
        else{
            $v_username = $this->input->post('username');
            $v_password = $this->input->post('password');

            $v_data = [
                'username' => $v_username,
                'password' => $v_password
            ];
            
            $this->M_update->edit_profile($v_data,$v_id);
            $this->session->set_flashdata('pesan', 'Profile berhasil diubah!');
            redirect('guru/pengaturan');       
        }             
    }


    public function profile(){

        $v_id = $this->session->userdata('id_user');
        $v_data['judul_daftar'] = 'Edit Data Guru';

        $v_data['data'] = $this->M_read->get_guru_by_id($v_id)->row_array();
            
        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validasi_username', [
            'required' => 'Kolom harus diisi!',
        ]);

        $this->form_validation->set_rules('nip_guru', 'Nip_guru', 'required|trim|callback_validasi_nip', [
            'required' => 'Kolom harus diisi!',
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar_guru',$v_data);
            $this->load->view('templates/topbar_guru',$v_data);
            $this->load->view('profile/profile_guru',$v_data);
            $this->load->view('templates/footer_guru');    
        }
        else{

            $v_username = $this->input->post('username');
            $v_password = $this->input->post('password');
            $v_nip_guru = $this->input->post('nip_guru');
            $v_nama_guru = $this->input->post('nama_guru');
            $v_jenis_kelamin = $this->input->post('jenis_kelamin');
            $v_tgl_lahir = $this->input->post('tgl_lahir');
            $v_nomer_telp = $this->input->post('nomer_telp');
            $upload_foto = $_FILES['foto_guru']['name'];

                if($upload_foto){
                    
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '5000';
                    $config['upload_path'] = './assets/penyimpanan_foto/guru/';
                        
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto_guru')){

                        $v_nama_foto = $this->upload->data('file_name');
                        $v_foto_lama = $v_data['data']['foto_guru'];
                        unlink(FCPATH . 'assets/penyimpanan_foto/guru/' . $v_foto_lama);
                        
                        $v_data_informasi = [
                            'nip_guru' => $v_nip_guru,
                            'nama_guru' => $v_nama_guru,
                            'tgl_guru' => $v_tgl_lahir,
                            'jk_guru' => $v_jenis_kelamin,
                            'telp_guru' => $v_nomer_telp,
                            'foto_guru' => $v_nama_foto
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data_informasi = [
                        'nip_guru' => $v_nip_guru,
                        'nama_guru' => $v_nama_guru,
                        'tgl_guru' => $v_tgl_lahir,
                        'jk_guru' => $v_jenis_kelamin,
                        'telp_guru' => $v_nomer_telp
                    ];
                }

                $v_id_akun = $this->M_update->edit_informasi_guru($v_data_informasi,$v_id);

                $v_data_akun_guru = [
                    'username' => $v_username,
                    'password' => $v_password
                ];

                $this->M_update->edit_akun_guru($v_data_akun_guru,$v_id);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect("guru/profile"); 

        }
    }


}   