<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uts extends CI_Controller {

	public function index()
	{
        $data['pegawai'] = $this->M_uts->selectDataPegawai()->result();
		$this->load->view('v_uts', $data);
	}

    public function input()
    {
        $this->form_validation->set_rules('nip','NIP','required', [
            'required' => 'NIP Harus Diisi'
        ]);

        $this->form_validation->set_rules('nama','Nama Pegawai','required', [
            'required' => 'Nama Pegawai Harus Diisi'
        ]);

        $this->form_validation->set_rules('status','Status','required', [
            'required' => 'Status Pernikahan Harus Diisi'
        ]);

        $this->form_validation->set_rules('jabatan','Jabatan','required', [
            'required' => 'Jabatan Harus Diisi'
        ]);

        $this->form_validation->set_rules('gaji','Gaji','required', [
            'required' => 'Gaji Harus Diisi'
        ]);

        $this->form_validation->set_rules('tunjangan','Tunjangan','required', [
            'required' => 'Tunjangan Harus Diisi'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('v_uts');
        }else{

            $upload_image = $_FILES['foto']['name'];

            // var_dump($upload_image);
            // die;

            if($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path'] = './assets/foto/';

                $this->load->library('upload',$config);

                if($this->upload->do_upload('foto')){
                    $image = $this->upload->data('file_name');
                    $data['foto'] = $image;
                    $this->M_uts->saveDataPegawai($data);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status'),
                'jabatan' => $this->input->post('jabatan'),
                'gaji' => $this->input->post('gaji'),
                'tunjangan' => $this->input->post('tunjangan'),
            ];

            // var_dump($data);
            // die;

            $this->M_uts->saveDataPegawai($data);
            redirect('uts');
        }
    }

    public function hapus($nip)
    {
        $this->M_uts->deleteDataPegawai($nip);
        redirect('uts');
    }

    public function edit($nip)
    {

        $pegawai = $this->M_uts->getWhereDataPegawai($nip)->row_array();

        // var_dump($pegawai['nama']);
        // die;
        $data = [
            'pegawai' => $pegawai
        ];
        
        $this->load->view('v_uts_edit',$data);
    }

    public function update()
    {
        $this->form_validation->set_rules('nip','NIP','required', [
        'required' => 'NIP Harus Diisi'
        ]);

        $this->form_validation->set_rules('nama','Nama Pegawai','required', [
        'required' => 'Nama Pegawai Harus Diisi'
        ]);

        $this->form_validation->set_rules('status','Status','required', [
        'required' => 'Status Pernikahan Harus Diisi'
        ]);

        $this->form_validation->set_rules('jabatan','Jabatan','required', [
        'required' => 'Jabatan Harus Diisi'
        ]);

        $this->form_validation->set_rules('gaji','Gaji','required', [
        'required' => 'Gaji Harus Diisi'
        ]);

        $this->form_validation->set_rules('tunjangan','Tunjangan','required', [
        'required' => 'Tunjangan Harus Diisi'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('v_uts');
        }else{
            $nip = $this->input->post('nip');

            $upload_image = $_FILES['foto']['name'];

            // var_dump($upload_image);
            // die;

            if($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path'] = './assets/foto/';

                $this->load->library('upload',$config);

                if($this->upload->do_upload('foto')){
                    $image = $this->upload->data('file_name');
                    $data['foto'] = $image;
                    $this->M_uts->updateDataPegawai($data,$nip);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status'),
                'jabatan' => $this->input->post('jabatan'),
                'gaji' => $this->input->post('gaji'),
                'tunjangan' => $this->input->post('tunjangan'),
            ];

            // var_dump($data);
            // die;

            $this->M_uts->updateDataPegawai($data,$nip);
            redirect('uts');
        }
        
    }
}
