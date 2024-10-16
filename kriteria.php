<!-- navbar -->
<?php include 'template/header.php' ?>
<!-- Begin Page Content -->

<?php

include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $ukuran_memori = $_POST['ukuran_memori'];
    $tipe_memori = $_POST['tipe_memori'];
    $bus_memori = $_POST['bus_memori'];
    $bandwidth = $_POST['bandwidth'];
    $harga = $_POST['harga'];

    $query = $conn->query("SELECT * FROM kriteria");

    if ($query->num_rows > 0) {
        echo
        "<script>
            alert('bobot hanya boleh satu');
            window.location.href = 'kriteria.php';
            </script>";
    } else {
        $query = $conn->query("INSERT INTO kriteria(ukuran_memori,tipe_memori,bus_memori,bandwidth,harga) VALUES('$ukuran_memori','$tipe_memori','$bus_memori','$bandwidth','$harga')");

        if (!$query) {
            echo "<script>
            alert('data gagal disimpan');
            window.location.href = 'kriteria.php';
            </script>";
        } else {
            echo "<script>
            alert('data berhasil disimpan');
            window.location.href = 'kriteria.php';
            </script>";
        }
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Bobot</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Ukuran Memori</label>
                            <div class="col-sm-8">
                                <!-- <input type="text" class="form-control" name="ukuran_memori" placeholder="ukuran_memori" required> -->
                                <select class="form-control" name="ukuran_memori" required>
                                    <option selected>-- Pilih Ukuran Memori --</option>
                                    <option value="1">2 GB</option>
                                    <option value="2">4 GB</option>
                                    <option value="3">6 GB</option>
                                    <option value="4">8 GB</option>
                                    <option value="5">10 GB</option>
                                    <option value="6">12 GB</option>
                                    <option value="7">24 GB</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Tipe Memori</label>
                            <div class="col-sm-8">
                                <!-- <input type="text" class="form-control" name="tipe_memori" placeholder="tipe_memori" required> -->
                                <select class="form-control" name="tipe_memori" required>
                                    <option selected>-- Pilih Tipe Memori --</option>
                                    <option value="1">GDDR4</option>
                                    <option value="2">GDDR5</option>
                                    <option value="3">GDDR5X</option>
                                    <option value="4">GDDR6</option>
                                    <option value="5">GDDR6X</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Bus Memori</label>
                            <div class="col-sm-8">
                                <!-- <input type="text" class="form-control" name="bus_memori" placeholder="bus_memori" required> -->
                                <select class="form-control" name="bus_memori" required>
                                    <option selected>-- Pilih Bus Memori --</option>
                                    <option value="1">64-bit</option>
                                    <option value="2">128-bit</option>
                                    <option value="3">192-bit</option>
                                    <option value="4">256-bit</option>
                                    <option value="5">320-bit</option>
                                    <option value="6">384-bit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Bandwidth</label>
                            <div class="col-sm-8">
                                <!-- <input type="text" class="form-control" name="bandwidth" placeholder="bandwidth" required> -->
                                <select class="form-control" name="bandwidth" required>
                                    <option selected>-- Pilih Bandwidth --</option>
                                    <option value="1">128 GB/s</option>
                                    <option value="2">288 GB/s</option>
                                    <option value="3">360 GB/s</option>
                                    <option value="4">760 GB/s</option>
                                    <option value="5">936 GB/s</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                            <select class="form-control" name="harga" required>
                                    <option selected>-- Pilih Harga --</option>
                                    <option value="1">2-3jt</option>
                                    <option value="2">3-4jt</option>
                                    <option value="3">4-5jt</option>
                                    <option value="4">5-6jt</option>
                                    <option value="5">6-7jt</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Ukuran Memori</th>
                                <th scope="col">Tipe Memori</th>
                                <th scope="col">Bus Memori</th>
                                <th scope="col">Bandwidth</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            $query = $conn->query("SELECT * FROM kriteria");

                            if ($query->num_rows > 0) {
                                while ($row = $query->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['ukuran_memori']; ?></td>
                                        <td><?= $row['tipe_memori']; ?></td>
                                        <td><?= $row['bus_memori']; ?></td>
                                        <td><?= $row['bandwidth']; ?></td>
                                        <td><?= $row['harga']; ?></td>
                                        <td>
                                            <a href="delete_kriteria.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('data ingin dihapus?')">Delete</a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.conatiner-fluid -->
<!-- footer -->
<?php include 'template/footer.php' ?>