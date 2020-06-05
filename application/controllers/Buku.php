<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct(){ //construct dieksekusi dulu tanpa perlu direquest
        parent::__construct();
        $this->load->model('Buku_model'); 
        if ($this->session->userdata('status') != 'logged in') 
        {
            redirect('Login/index');
        }
    }

    public function index()
    {
        $data['title'] = 'Index';

        if ($this->input->get('keyword')) 
        {
            $keyword = $this->input->get('keyword');
            $data['buku'] = $this->Buku_model->search($keyword);  //proses mengembaikan array
        } 
        else 
        {
            $data['buku'] = $this->Buku_model->getBuku(); //ini adalah array
        //var_dump($data['buku']);
        }
  
        $this->load->view('templates/header', $data);
        $this->load->view('buku/index_view', $data);
        $this->load->view('templates/footer');
        
    }


    public function tambah()
    {       
        $data['title'] = 'Tambah Data';

        $this->form_validation->set_rules('judul', 'Judul', 'required', array('required' => '%s harus diisi')); // 'rulesnya => ', %s akan mengacu ke judul fieldlabel
        $this->form_validation->set_rules('penulis', 'Penulis', 'required', array('required' => '%s harus diisi'));
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|exact_length[4]', array('required' => '%s harus diisi', 'exact_length' => 'Format %s : YYYY')); //isinya harus sama yaitu 4 dalam[] (exact_length)
        $this->form_validation->set_rules('harga', 'Harga', 'required|min_length[5]', array('required' => '%s harus diisi', 'min_length' => '%s minimal 5 digit angka'));
        
//fieldname adalah nama kolom
//fieldlabel adalah pesan yang keluar tapi secara default diisi dengan bahasa inggris
//trim, required, dll adalah aturan dari ci

        if ($this->form_validation->run() == FALSE) 
        {

            $data['genre'] = $this->Buku_model->getGenre();

            $this->load->view('templates/header', $data);
            $this->load->view('buku/tambah_view', $data);
            $this->load->view('templates/footer');
        } 
        else 
        {
            $judul=$this->input->post('judul');
            $penulis=$this->input->post('penulis');
            $tahun_terbit=$this->input->post('tahun_terbit');
            $harga=$this->input->post('harga');
            $id_genre = $this->input->post('id_genre');
    
            $data = array(
                          'judul' => $judul,
                          'penulis' => $penulis,
                          'tahun_terbit' => $tahun_terbit,
                          'harga' => $harga,
                          'id_genre' => $id_genre
                        );
    
            $this->Buku_model->tambah_data($data);
    
            
            $this->session->set_flashdata('sukses', 'ditambahkan');
            
    
            redirect('Buku/index');
        }

    }

    public function edit($id_buku)
    {
        $data['title'] = 'Edit Data';
        $where = array('id_buku' => $id_buku);

        $this->form_validation->set_rules('judul', 'Judul', 'required', array('required' => '%s harus diisi')); // 'rulesnya => ', %s akan mengacu ke judul fieldlabel
        $this->form_validation->set_rules('penulis', 'Penulis', 'required', array('required' => '%s harus diisi'));
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|exact_length[4]', array('required' => '%s harus diisi', 'exact_length' => 'Format %s : YYYY')); //isinya harus sama yaitu 4 dalam[] (exact_length)
        $this->form_validation->set_rules('harga', 'Harga', 'required|min_length[5]', array('required' => '%s harus diisi', 'min_length' => '%s minimal 5 digit angka'));

        
        if ($this->form_validation->run() == FALSE) 
        {
                
                $data['buku'] = $this->Buku_model->getBukuById($where);
                $data['genre'] = $this->Buku_model->getGenre();

                $this->load->view('templates/header', $data);
                $this->load->view('buku/edit_view', $data);
                $this->load->view('templates/footer');
        } 
        else 
        {
            $judul=$this->input->post('judul');
            $penulis=$this->input->post('penulis');
            $tahun_terbit=$this->input->post('tahun_terbit');
            $harga=$this->input->post('harga');
            $id_genre=$this->input->post('id_genre');
    
            $data = array('judul' => $judul,
                          'penulis' => $penulis,
                          'tahun_terbit' => $tahun_terbit,
                          'harga' => $harga,
                          'id_genre' => $id_genre
                         ); //jika dalam array yang berada dalam tanda petik adalah q dari database
            
    
            $this->Buku_model->edit_data($where, $data);
    
            $this->session->set_flashdata('sukses', 'Berhasil Ubah Data');
    
            redirect('Buku/index');
             
        }
        

        
    }
    
    public function hapus($id_buku) //id_buku adalah parameter, hapus adalah method
    {
        $where = array('id_buku' => $id_buku); //dalam tanda petik adalah yang ada dalam tabel database
        $this->Buku_model->hapus_data($where); 
        
        $this->session->set_flashdata('sukses', 'dihapus');

        redirect('Buku/index');
        
    }
    public function search()
    {
        $keyword = $this->input->get('keyword');
        
        $data['buku'] = $this->Buku_model->search($keyword);  //proses mengembaikan array

         
        $this->load->view('index_view', $data);
         

    }
    public function detail($id_buku)
    {
        $data['title'] = 'Detail Buku';

        $where =  array('id_buku' => $id_buku);
        $data['buku'] = $this->Buku_model->getBukuById($where);

        
        $this->load->view('templates/header', $data);
        $this->load->view('buku/detail_view', $data);
        $this->load->view('templates/footer' );
        
    }

}

/* End of file Buku.php */
//value untuk nama dalam tombol

?>