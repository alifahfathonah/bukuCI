<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    public function getBuku()
    {
        //$query_str = "SELECT * FROM buku ";
        //$query = $this->db->query($query_str)->result_array();

        $query = $this->db->get('buku')->result_array();
        return $query;
    }


    public function tambah_data($data) 
    {
        
        $this->db->insert('buku', $data);
        
    }

    public function edit_form($where)
    {
        
        $query = $this->db->get_where('buku', $where)->row_array();
        return $query;
        
    }

    public function edit_data($where, $data) //where adalah kondisi
    {
        
        $this->db->where($where);
        $this->db->update('buku', $data); //dalam tanda petik adalah nama tabel, $data karena butuh data untuk disimpan
        
        
    }

    public function hapus_data($where)
    {
        
        $this->db->where($where);
        $this->db->delete('buku');
          
    }

    public function search($keyword)
    {
        //$query = $this->db->query('SELECT * FROM buku WHERE judul LIKE "%'. $keyword . '%"' . 
                                                       //'OR penulis LIKE "%'. $keyword . '%"' . 
                                                       //'OR tahun_terbit LIKE "%'. $keyword . '%"'
                                                       //)->result_array();
        $this->db->like('judul', $keyword);
        $this->db->or_like('penulis', $keyword);
        $this->db->or_like('tahun_terbit', $keyword);
        
        $query = $this->db->get('buku')->result_array();
        return $query;
    }
    public function getBukuById($where)
    {
        $this->db->join('genre', 'buku.id_genre = genre.id_genre', 'left');

        $query = $this->db->get_where('buku', $where)->row_array();
        return $query;
    }
    public function getGenre()
    {
        
        $query = $this->db->get('genre')->result_array();
        return $query;
        
    }
}

/* End of file Buku_model.php */
//get untuk mengambil semua data
//get_where untuk mengambil 1 baris data


?>