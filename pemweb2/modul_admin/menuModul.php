<?php
require_once 'databaseModul.php';

if (isset($_POST['tambah'])) {
    $dummy = new menuModul();
    return $dummy->tambah();
}
else if (isset($_POST['update'])) {
    $dummy = new menuModul();
    return $dummy->update();
}
else if (isset($_POST['hapus'])){
    $dummy = new menuModul();
    $dummy->hapus();
    header('Location: ../admin_home.php');
}
else if (isset($_POST['gUpdate'])) {
    $dummy = new menuModul();
    return $dummy->getUpdate();
}

class menuModul
{
    private $table = 'products';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambah()
    {
        if ($this->tambahMenu($_POST) > 0) {
            $_SESSION['msg'] = 'Berhasil Menambahkan Menu';
            header('Location: ../admin_home.php');
            exit;
        } else {
            $_SESSION['msg'] = 'Gagal Menambahkan Menu';
            header('Location: ../admin_home.php');
            exit;
        }
    }

    public function tambahMenu($data)
    {
        $query = 'INSERT INTO ' . $this->table . ' VALUES(:id, :gambar, :nama, :harga, :deskripsi, :kategori)';

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('kategori', $data['kategori']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapus()
    {
        if ($this->hapusMenu($_POST['id']) > 0) {

            $_SESSION['msg'] = 'Berhasil Menghapus Menu';
            exit;
        } else {
            $_SESSION['msg'] = 'Gagal Menghapus Menu';
            
            exit;
        }
    }

    public function hapusMenu($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ProductsId = :id';

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update()
    {
        if ($this->updateMenu($_POST) > 0) {

            $_SESSION['msg'] = 'Berhasil Update Menu';
            header('Location: ../admin_home.php');
            exit;
        } else {
            $_SESSION['msg'] = 'gagal update menu';
            header('Location: ../admin_home.php');
            exit;
        }
    }

    public function updateMenu($data)
    {
        $query = 'UPDATE ' . $this->table . ' 
                    SET Gambar=:gambar, Nama=:nama, Harga=:harga, Deskripsi=:deskripsi, Kategori=:kategori
                    WHERE ProductsId = :id';

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('kategori', $data['kategori']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUpdate()
    {
        echo json_encode($this->getMenuById($_POST['id']));
    }

    public function getMenuById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE ProductsId=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
