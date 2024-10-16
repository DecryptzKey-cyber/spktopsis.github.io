<!-- header -->
<?php include 'template/header.php' ?>

<!-- Begin Page Content -->

<?php

include 'koneksi.php';

if (isset($_POST['simpan'])) {
      $id = $_GET['id'];
      $merek = $_POST['merek'];
      $ukuran_memori = $_POST['ukuran_memori'];
      $tipe_memori = $_POST['tipe_memori'];
      $bus_memori = $_POST['bus_memori'];
      $bandwidth = $_POST['bandwidth'];
      $harga = $_POST['harga'];

            $query = $conn->query("UPDATE penilaian SET merek='$merek',ukuran_memori='$ukuran_memori',tipe__memori='$tipe_memori',bus_memori='$bus_memori',bandwidth='$bandwidth',harga='$harga' WHERE id='$id'");

            if(!$query) {
                  echo "<script>
            alert('data gagal diedit');
            window.location.href = 'edit_penilaian.php';
            </script>";
            } else {
                  echo "<script>
            alert('data berhasil diedit');
            window.location.href = 'penilaian.php';
            </script>";
       }         
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Bobot</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <?php
                              $id = $_GET['id'];
                              $penilaian = $conn->query("SELECT * FROM penilaian WHERE id='$id'");
                              if( $penilaian->num_rows > 0) {
                                    while($row = $penilaian->fetch_assoc()) {
                              ?>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Merek</label>
                            <div class="col-sm-8">
                                <select name="merek" class="form-control">
                                    <option selected="<?= $row['merek']; ?>"></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ukuran Memori</label>
                            <div class="col-sm-8">
                                <select name="ukuran_memori" class="form-control">
                                    <option selected="<?= $row['ukuran_memori']; ?>"></option>
                                    <option value="5">Sangat Baik</option>
                                    <option value="4">Baik</option>
                                    <option value="3">Cukup</option>
                                    <option value="2">Kurang Baik</option>
                                    <option value="1">Tidak Baik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tipe Memori</label>
                            <div class="col-sm-8">
                                <select name="tipe_memori" class="form-control">
                                    <option selected="<?= $row['tipe_memori']; ?>"></option>
                                    <option value="5">Sangat Baik</option>
                                    <option value="4">Baik</option>
                                    <option value="3">Cukup</option>
                                    <option value="2">Kurang Baik</option>
                                    <option value="1">Tidak Baik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Bus Memori</label>
                            <div class="col-sm-8">
                                <select name="bus_memori" class="form-control">
                                    <option selected="<?= $row['bus_memori']; ?>"></option>
                                    <option value="5">Sangat Baik</option>
                                    <option value="4">Baik</option>
                                    <option value="3">Cukup</option>
                                    <option value="2">Kurang Baik</option>
                                    <option value="1">Tidak Baik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Bandwidth</label>
                            <div class="col-sm-8">
                                <select name="bandwidth" class="form-control">
                                    <option selected="<?= $row['bandwidth']; ?>"></option>
                                    <option value="5">Sangat Baik</option>
                                    <option value="4">Baik</option>
                                    <option value="3">Cukup</option>
                                    <option value="2">Kurang Baik</option>
                                    <option value="1">Tidak Baik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <select name="harga" class="form-control">
                                    <option selected="<?= $row['harga']; ?>"></option>
                                    <option value="5">Murah</option>
                                    <option value="4">Sedang</option>
                                    <option value="3">Mahal</option>
                                    <option value="2">Cukup Mahal</option>
                                    <option value="1">Sangat mahal</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        <?php }
                                     }?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.conatiner-fluid -->
<!-- footer -->
<?php include 'template/footer.php' ?>