<?php

namespace Master;

use Config\Query_builder;

class spjperjadin
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('spjperjadin')->get()->resultArray();
        $res = ' <a href="?target=spjperjadin&act=tambah_spjperjadin" class="btn btn-info btn-sm">Tambah SPJ PERJADIN</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>NO</th>
                    <th>kd_SPJ PERJADIN</th>
                    <th>NAMA</th>
                    <th>PERIHAL</th>
                    <th>TUJUAN</th>
                    <th>ACT</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="150">' . $r['kd_spjperjadin'] . '</td>
                    <td width="200">' . $r['nama'] . '</td>
                    <td width="200">' . $r['perihal'] . '</td>
                    <td width="200">' . $r['tujuan'] . '</td>
                    <td width="150">
                        <a href="?target=spjperjadin&act=edit_spjperjadin&id=' . $r['kd_spjperjadin'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=spjperjadin&act=delete_spjperjadin&id=' . $r['kd_spjperjadin'] . '" class="btn btn-danger btn-sm">
                            Hapus
                        </a>
                    </td>
                </tr>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=spjperjadin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=spjperjadin&act=simpan_spjperjadin" method="post">
                    <div class="mb-3">
                        <label for="kd_spjperjadin" class="form-label">kd_spjperjadi </label>
                        <input type="text" class="form-control" id="kd_spjperjadin" name="kd_spjperjadin">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal">
                    </div>
                    <div class="mb-3">
                        <label for="tujuan" class="form-label">tujuan</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $kd_spjperjadin = $_POST['kd_spjperjadin'];
        $nama = $_POST['nama'];
        $perihal = $_POST['perihal'];
        $tujuan = $_POST['tujuan'];

        $data = array(
            'kd_spjperjadin' => $kd_spjperjadin,
            'nama' => $nama,
            'perihal' => $perihal,
            'tujuan' => $tujuan
        );
        return $this->db->table('spjperjadin')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('spjperjadin')->where("kd_spjperjadin='$id'")->get()->rowArray();

        $res = '<a href="?target=spjperjadin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=spjperjadin&act=update_spjperjadin" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['kd_spjperjadin'] . '">
                    <div class="mb-3">
                        <label for="kd_spjperjadin" class="form-label">kd_spjperjadin</label>
                        <input type="text" class="form-control" id="kd_spjperjadin" name="kd_spjperjadin" value="' . $r['kd_spjperjadin'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal" value="' . $r['perihal'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="tujuan" class="form-label">tujuan</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan" value="' . $r['tujuan'] . '">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }

    public function cekRadio($val1, $val2)
    {
        if ($val1 == $val2) {
            return "checked";
        }
        return "";
    }

    public function update()
    {
        $param = $_POST['param'];
        $kd_spjperjadin = $_POST['kd_spjperjadin'];
        $nama = $_POST['nama'];
        $perihal = $_POST['perihal'];
        $tujuan = $_POST['tujuan'];

        $data = array(
            'kd_spjperjadin' => $kd_spjperjadin,
            'nama' => $nama,
            'perihal' => $perihal,
            'tujuan' => $tujuan,
        );

        return $this->db->table('spjperjadin')->where("kd_spjperjadin='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('spjperjadin')->where("kd_spjperjadin='$id'")->delete();
    }
}
