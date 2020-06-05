<div class="container">
<div class="row mt-3">
    <div class="col-md-6">
    <div class="card">
    <h5 class="card-header">Form Edit Data Buku</h5>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="<?= $buku['judul'] ?>">
                    <small class="form-text text-danger"><?= form_error('judul') ?></small>
                </div>
                <div class="form-group">
                    <label for="judul">Penulis</label>
                    <input type="text" class="form-control" name="penulis" id="penulis" value="<?= $buku['penulis'] ?>">
                    <small class="form-text text-danger"><?= form_error('penulis') ?></small>
                </div>
                <div class="form-group">
                    <label for="judul">Tahun Terbit</label>
                    <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>">
                    <small class="form-text text-danger"><?= form_error('tahun_terbit') ?></small>
                </div>
                <div class="form-group">
                    <label for="judul">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" value="<?= $buku['harga'] ?>">
                    <small class="form-text text-danger"><?= form_error('harga') ?></small>
                </div>
                <div class="form-group">
                    <label for="id_genre">Genre</label>
                    <select name="id_genre" id="id_genre" class="form-control">
                        <?php
                            foreach($genre as $g){ ?>
                            <option <?php if($buku['id_genre'] == $g['id_genre']) {echo "selected";} ?> value="<?= $g['id_genre'] ?>"><?= $g['genre'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </form>
        </div>
    </div>
    </div>
</div>
</div>