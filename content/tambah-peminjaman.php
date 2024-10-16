<?php
if (isset($_POST['tambah'])) {
    $nama_buku = $_POST['nama_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $pengarang = $_POST['pengarang'];
    $id_kategori = $_POST['id_kategori'];

    // sql = struktur query languages / DML = data manipulation language
    // select, insert, update, delete
    $insert = mysqli_query($koneksi, "INSERT INTO buku (id_kategori, nama_buku, penerbit, tahun_terbit, pengarang) VALUES ('$id_kategori','$nama_buku','$penerbit','$tahun_terbit','$pengarang')");
    header("location:?pg=buku&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editUser = mysqli_query($koneksi, "SELECT * FROM buku WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($editUser);


if (isset($_POST['edit'])) {
    $nama_buku = $_POST['nama_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $pengarang = $_POST['pengarang'];
    $id_kategori = $_POST['id_kategori'];

    // ubah user kolom apa yang mau diubah (SET), yang mau diubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE buku SET nama_buku='$nama_buku', penerbit='$penerbit', tahun_terbit='$tahun_terbit', pengarang='$pengarang', id_kategori='$id_kategori' WHERE id='$id'");
    header("location:?pg=buku&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");
    header("location:?pg=buku&hapus=berhasil");
}

$queryBuku = mysqli_query($koneksi, "SELECT * FROM buku");


?>
<div class="container mt-4 mb-3">
    <fieldset class="border rounded-1 p-5 border border border-4 border border-dark">
        <div class="d-flex justify-content-start mb-3">
        </div>

        <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Buku</legend>
        <form action="" method="post">
            <div class="mb-3 row">
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="">No Peminjaman</label>
                        <input type="text" class="form-control" name="no_peminjaman" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="tgl_peminjaman" value="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Buku</label>
                        <select name="" id="id_buku" class="form-control">
                            <option value="">Pilih Buku</option>
                            <!-- ambil data buku dari table buku -->
                             <?php while ($rowBuku = mysqli_fetch_assoc($queryBuku)): ?>
                                <option value="<?php echo $rowBuku['id'] ?>">
                                   <?php echo $rowBuku['nama_buku']; ?> 
                                </option>
                                <?php endwhile ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                <div class="mb-3">
                        <label for="" class="form-label">Nama Anggota</label>
                        <select name="id_anggota" id="" class="form-control">
                            <option value="">Pilih Anggota</option>
                            <!-- ini ngambil data dari tabel anggota -->
                             <option value=""></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="tgl_peminjaman" value="">
                    </div>
                </div>
            </div>
            <div align="right" class="mb-3">
                <button type="button" id="add-row" class="btn btn-primary">Tambah Row</button>
            </div>
            <table id="table" class="table table-bordered">
                 <thead>
                    <tr>
                        <th>Nama Buku</th>
                        <th>Aksi</th>
                    </tr>
                 </thead>
                 <tbody class="table-row">

                 </tbody>      
            </table>
        </form>
    </fieldset>
</div>