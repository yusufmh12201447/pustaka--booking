<?php

class M_uts extends CI_Model{

    public function selectDataPegawai(){
        return $this->db->get('data_pegawai');
    }

    public function saveDataPegawai($data){
        return $this->db->insert('data_pegawai',$data);
    }

    public function deleteDataPegawai($where){
        $this->db->where('nip',$where);
        $this->db->delete('data_pegawai');
    }

    public function getWhereDataPegawai($where){
        return $this->db->get_where('data_pegawai',['nip' => $where]);
    }

    public function updateDataPegawai($data,$where){
        return $this->db->update('data_pegawai',$data,['nip' => $where]);
    }

}

?>
