
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
                        <h4 class="card-title">Tambah Dosen</h4>
                    </div>
                    </div>
                    
                    
                    <div class="basic-form mt-5">
                    <?php if($this->session->flashdata('error')): ?>
									<div class="alert alert-danger">
										<?= $this->session->flashdata('error') ?>
									</div>
							<?php endif ?>
                        <form action="<?= base_url('DosenController/add') ?>" method="POST">
                            <div class="form-group">
                                <label for="nip">Email</label>
                                <input type="email" name="email" class="form-control input-default" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control input-default" id="password">
                            </div>
                            <div class="form-group">
                                <label for="repassword">Re-password</label>
                                <input type="password" name="repassword" class="form-control input-default" id="repassword">
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="number" name="nip" class="form-control input-default" id="nip">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="name" class="form-control input-default" id="nama">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control input-default" id="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="prodi">Prodi</label>
                                <select name="kode_prodi" id="prodi" class="form-control input-default">
                                    <option value="">Pilih Prodi</option>
                                    <?php
                                    foreach ($prd->result_array() as $key): ?>
                                        <option value="<?= $key['kode_prodi'] ?>"><?= $key['nama_prodi'] ?></option>
		                            <?php endforeach ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="w-100 btn btn-success text-white" type="submit">Tambah</button>
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
