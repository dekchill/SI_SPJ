<?php

namespace Master;

use Config\Query_builder;

class spjnarasumber
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('spjnarasumber')->get()->resultArray();
        $res = ' <a href="?target=spj_narasumber&act=tambah_spjnarasumber" class="btn btn-info btn-sm">Tambah SPJ NARASUMBER</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>JABATAN</th>
                    <th>NIP</th>
                    <th>KEGIATAN</th>
                    <th>ACT</th>
                </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach ($data as $r) {
                $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="150">' . $r['nama'] . '</td>
                    <td width="200">' . $r['jabatan'] . '</td>
                    <td width="200">' . $r['nip'] . '</td>
                    <td width="200">' . $r['kegiatan'] . '</td>
                    <td width="150">
                        <a href="?target=spj_narasumber&act=edit_spjnarasumber&id=' . $r['nama'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=spj_narasumber&act=delete_spjnarasumber&id=' . $r['nama'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=spj_narasumber" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=spj_narasumber&act=simpan_spjnarasumber" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama </label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">nip</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $nama = $_POST['nama'];
        $jabatan= $_POST['jabatan'];
        $nip = $_POST['nip'];
        $kegiatan = $_POST['kegiatan'];

        $data = array(
            'nama' => $nama,
            'jabatan' => $jabatan,
            'nip' => $nip,
            'kegiatan' => $kegiatan
        );
        return $this->db->table('spjnarasumber')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('spjnarasumber')->where("nama='$id'")->get()->rowArray();

        $res = '<a href="?target=spj_narasumber" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=spj_narasumber&act=update_spjnarasumber" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['nama'] . '">
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="' . $r['jabatan'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">nip</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="' . $r['nip'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="' . $r['kegiatan'] . '">
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
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $nip = $_POST['nip'];
        $kegiatan = $_POST['kegiatan'];

        $data = array(
            'nama' => $nama,
            'jabatan' => $jabatan,
            'nip' => $nip,
            'kegiatan' => $kegiatan
        );

        return $this->db->table('spjnarasumber')->where("nama='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('spjnarasumber')->where("nama='$id'")->delete();
    }
}
