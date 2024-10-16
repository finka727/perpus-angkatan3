<?php
$peminjaman = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota ORDER BY id DESC");
?>
<div class="container mt-4 mb-3">
    <fieldset class="border rounded-1 p-5 border border border-4 border border-dark">
        <div class="d-flex justify-content-start mb-3">
        </div>

        <legend class="float-none w-auto px-3">Data Peminjaman</legend>
        <div align="right">
            <a href="?pg=tambah-peminjaman" class="btn btn-primary">Tambah</a>
        </div>
        <table class="table table-bordered border border-dark mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>No Peminjaman</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($peminjaman)) :
                ?>

                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_anggota'] ?></td>
                        <td><?php echo $row['no_peminjaman'] ?></td>
                        <td><?php echo $row['tgl_peminjaman'] ?></td>
                        <td><?php echo $row['tgl_pengembalian'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><a href="?pg=tambah-peminjaman&edit=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Edit
                            </a>
                            <a href="?pg=tambah-peminjaman&delete=<?php echo $row['id'] ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah anda yakin akan menghapus data ini??')">Delete</a>

                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </fieldset>
</div>