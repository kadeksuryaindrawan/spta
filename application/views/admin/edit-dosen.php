
        <div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dosen</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">Edit Dosen</h4>
                    </div>
                    </div>
                    
                    
                    <div class="basic-form mt-5">
                    <?php if($this->session->flashdata('error')): ?>
									<div class="alert alert-danger">
										<?= $this->session->flashdata('error') ?>
									</div>
							<?php endif ?>
                        <form action="<?= base_url('DosenController/editProcess/').$dosen['user_id'] ?>" method="POST">
                            <input type="hidden" value="<?= $dosen['user_id'] ?>" name="user_id">
                            <div class="form-group">
                                <label for="nip">Email</label>
                                <input type="email" name="email" class="form-control input-default" id="email" value="<?= $dosen['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="number" name="nip" class="form-control input-default" value="<?= $dosen['nip'] ?>" id="nip">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="name" class="form-control input-default" id="nama" value="<?= $dosen['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control input-default" id="alamat"><?= $dosen['alamat'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="prodi">Prodi</label>
                                <select name="kode_prodi" id="prodi" class="form-control input-default">
                                    <option value="">Pilih Prodi</option>
                                    <?php
                                    foreach ($prd->result_array() as $key): 
                                        $selected = ($key['kode_prodi'] == $dosen['kode_prodi']) ? 'selected' : '';
                                    ?>
                                        <option  value="<?= $key['kode_prodi'] ?>" <?= $selected ?>><?= $key['nama_prodi'] ?></option>
		                            <?php endforeach ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="w-100 btn btn-success text-white" type="submit">Edit</button>
                                </div>
                            </div>
                            
                        </form>
                        <div class="row mt-2">
                                <div class="col-12">
                                    <a href="<?= base_url('DosenController') ?>"><button class="w-100 btn btn-danger text-white">Kembali</button></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>
<!--**********************************
Content body end
***********************************-->
