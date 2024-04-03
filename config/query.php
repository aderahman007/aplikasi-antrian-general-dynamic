<?php 
namespace config;
require_once 'database.php';

class query extends database{
    private $tanggal;

    public function __construct()
    {
        parent::__construct();
        $this->tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);
    }

    public function getSetting(){
        $query = mysqli_query($this->mysqli, "SELECT * FROM queue_setting ORDER BY id DESC LIMIT 1") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($this->mysqli));
        return $query;
    }

    public function saveSetting($id = '', $nama_instansi, $logo, $alamat, $telpon, $email, $running_text, $youtube_id, $list_loket, $list_type_antrian, $warna_primary, $warna_secondary, $warna_accent, $warna_background, $warna_text, $printer){
        if ($id == '') {
            $save = mysqli_query($this->mysqli, "INSERT INTO queue_setting VALUES('', '$nama_instansi', '$logo', '$alamat', '$telpon', '$email', '$running_text', '$youtube_id', '$list_loket', '$list_type_antrian', '$warna_primary', '$warna_secondary', '$warna_accent', '$warna_background', '$warna_text', '$printer')") or die('Ada kesalahan pada query save : ' . mysqli_error($this->mysqli));
            return $save;
        }else {
            $save = mysqli_query($this->mysqli, "UPDATE queue_setting SET nama_instansi=\"$nama_instansi\", logo=\"$logo\", alamat=\"$alamat\", telpon=\"$telpon\", email=\"$email\", running_text=\"$running_text\", youtube_id=\"$youtube_id\", list_loket='$list_loket', list_type_antrian='$list_type_antrian', warna_primary=\"$warna_primary\", warna_secondary=\"$warna_secondary\", warna_accent=\"$warna_accent\", warna_background=\"$warna_background\", warna_text=\"$warna_text\", printer='$printer' WHERE id=\"$id\"") or die('Ada kesalahan pada query save : ' . mysqli_error($this->mysqli));
            return $save;
        }
    }

    public function getAntrian(){
        $query = mysqli_query($this->mysqli, "SELECT code_antrian, max(no_antrian) as no_antrian FROM queue_antrian_admisi WHERE tanggal='$this->tanggal' GROUP BY code_antrian") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($this->mysqli));
        return $query;
    }

    public function getLastAntrianByType($code_antrian){
        $query = mysqli_query($this->mysqli, "SELECT MAX(no_antrian) as no_antrian FROM queue_antrian_admisi WHERE tanggal='$this->tanggal' AND code_antrian='$code_antrian'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($this->mysqli));
        return $query;
    }

    public function getListAntrianByType($code_antrian){
        $query = mysqli_query($this->mysqli, "SELECT id, no_antrian, code_antrian, status, status FROM queue_antrian_admisi WHERE tanggal='$this->tanggal' AND code_antrian='$code_antrian'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($this->mysqli));
        return $query;
    }

    public function createAntrian($no_antrian, $code_antrian){
        $query = mysqli_query($this->mysqli, "INSERT INTO queue_antrian_admisi(tanggal, no_antrian, code_antrian) VALUES('$this->tanggal', '$no_antrian', '$code_antrian')") or die('Ada kesalahan pada query insert: ' . mysqli_error($this->mysqli));
        return $query;
    }

    public function updateAntrian($id){
        $updated_date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);
        $query = mysqli_query($this->mysqli, "UPDATE queue_antrian_admisi SET status='1', updated_date='$updated_date' WHERE id='$id'") or die('Ada kesalahan pada query update : ' . mysqli_error($this->mysqli));
        return $query;
    }

    public function getJumlahAntrian(){
        $query = mysqli_query($this->mysqli, "SELECT code_antrian, count(id) as jumlah FROM queue_antrian_admisi WHERE tanggal='$this->tanggal' GROUP BY code_antrian") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($this->mysqli));
        return $query;
    }

    public function getAntrianSekarang(){
        $query = mysqli_query($this->mysqli, "SELECT code_antrian, no_antrian FROM queue_antrian_admisi  WHERE tanggal='$this->tanggal' AND status='1' ORDER BY updated_date") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($this->mysqli));
        return $query;
    }

    public function getAntrianSelanjutnya(){
        $query = mysqli_query($this->mysqli, "SELECT no_antrian, code_antrian FROM queue_antrian_admisi WHERE tanggal='$this->tanggal' AND status='0' GROUP BY code_antrian ORDER BY no_antrian ASC") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($this->mysqli));
        return $query;
    }

    public function getSisaAntrian(){
        $query = mysqli_query($this->mysqli, "SELECT code_antrian, count(id) as jumlah FROM queue_antrian_admisi WHERE tanggal='$this->tanggal' AND status='0' GROUP BY code_antrian") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($this->mysqli));
        return $query;
    }
}
?>