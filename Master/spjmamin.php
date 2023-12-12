<?php

namespace Master;

use Config\Query_builder;

class spjmamin
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('spjmamin')->get()->resultArray();
        $res = ' <a href="?target=spjmamin&act=tambah_spjmamin" class="btn btn-info btn-sm">Tambah spjmamin</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>NO</th>
                    <th>AGENDA</th>
                    <th>PELAKSANA</th>
                    <th>PAJAK</th>
                    <th>JUMLAH</th>
                    <th>ACT</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                     <td width="10">' . $no . '</td>
            <td width="150">' . $r['agenda'] . '</td>
            <td width="200">' . $r['pelaksana'] . '</td>
            <td width="150">' . $r['pajak'] . '</td>
            <td width="200">' . $r['jumlah'] . '</td>
            <td width="200">
                        <a href="?target=spjmamin&act=edit_spjmamin&id=' . $r['agenda'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=spjmamin&act=delete_spjmamin&id=' . $r['agenda'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=spjmamin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=spjmamin&act=simpan_spjmamin" method="post">
                    <div class="mb-3">
                        <label for="agenda" class="form-label">Agenda</label>
                        <input type="text" class="form-control" id="agenda" name="agenda">
                    </div>
                    <div class="mb-3">
                        <label for="pelaksana" class="form-label">pelaksana</label>
                        <input type="text" class="form-control" id="pelaksana" name="pelaksana">
                    </div>
                    <div class="mb-3">
                        <label for="pajak" class="form-label">Pajak</label>
                        <input type="text" class="form-control" id="pajak" name="pajak">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $agenda = $_POST['agenda'];
        $pelaksana = $_POST['pelaksana'];
        $pajak = $_POST['pajak'];
        $jumlah = $_POST['jumlah'];

        $data = array(
            'agenda' => $agenda,
            'pelaksana' => $pelaksana,
            'pajak' => $pajak,
            'jumlah' => $jumlah
        );
        return $this->db->table('spjmamin')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('spjmamin')->where("agenda='$id'")->get()->rowArray();

        $res = '<a href="?target=spjmamin" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=spjmamin&act=update_spjmamin" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['agenda'] . '">
                    <div class="mb-3">
                        <label for="agenda" class="form-label">agenda</label>
                        <input type="text" class="form-control" id="agenda" name="agenda" value="' . $r['agenda'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="pelaksana" class="form-label">pelaksana</label>
                        <input type="text" class="form-control" id="pelaksana" name="pelaksana" value="' . $r['pelaksana'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="pajak" class="form-label">pajak</label>
                        <input type="text" class="form-control" id="pajak" name="pajak" value="' . $r['pajak'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="' . $r['jumlah'] . '">
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
        $agenda = $_POST['agenda'];
        $pelaksana = $_POST['pelaksana'];
        $pajak = $_POST['pajak'];
        $jumlah = $_POST['jumlah'];

        $data = array(
            'agenda' => $agenda,
            'pelaksana' => $pelaksana,
            'pajak' => $pajak,
            'jumlah' => $jumlah,
        );

        return $this->db->table('spjmamin')->where("agenda='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('spjmamin')->where("agenda='$id'")->delete();
    }
}
