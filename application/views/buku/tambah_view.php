<div class="container">
<div class="row mt-3">
    <div class="col-md-6">
    <div class="card">
    <h5 class="card-header">Form Tambah Data Buku</h5>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="<?= $this->form_validation->set_value('judul'); ?>">
                    <small class="form-text text-danger"><?= form_error('judul') ?></small>
                </div>
                <div class="form-group">
                    <label for="judul">Penulis</label>
                    <input type="text" class="form-control" name="penulis" id="penulis" value="<?= $this->form_validation->set_value('penulis'); ?>">
                    <small class="form-text text-danger"><?= form_error('penulis') ?></small>
                </div>
                <div class="form-group">
                    <label for="judul">Tahun Terbit</label>
                    <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= $this->form_validation->set_value('tahun_terbit'); ?>">
                    <small class="form-text text-danger"><?= form_error('tahun_terbit') ?></small>
                </div>
                <div class="form-group">
                    <label for="judul">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" value="<?= $this->form_validation->set_value('harga'); ?>">
                    <small class="form-text text-danger"><?= form_error('harga') ?></small>
                </div>
                <div class="form-group">
                    <label for="id_genre">Genre</label>
                    <select name="id_genre" id="id_genre" class="form-control">
                        <?php
                            foreach($genre as $g){ ?>
                            <option value="<?= $g['id_genre'] ?>"><?= $g['genre'] ?></option>
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