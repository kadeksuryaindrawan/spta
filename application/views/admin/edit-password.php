
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
                        <h4 class="card-title">Ubah Password</h4>
                    </div>
                    </div>
                    
                    
                    <div class="basic-form mt-5">
                    <?php if($this->session->flashdata('error')): ?>
									<div class="alert alert-danger">
										<?= $this->session->flashdata('error') ?>
									</div>
							<?php endif ?>
                        <form action="<?= base_url('DosenController/ubahPasswordProcess/').$dosen['user_id'] ?>" method="POST">
                            <input type="hidden" value="<?= $dosen['user_id'] ?>" name="user_id">
                            <div class="form-group">
                                <label for="password-lama">Password Lama</label>
                                <input type="password" name="password_lama" class="form-control input-default" id="password-lama">
                            </div>

                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input type="password" name="password" class="form-control input-default" id="password">
                            </div>

                            <div class="form-group">
                                <label for="repassword">Masukkan Ulang Password Baru</label>
                                <input type="password" name="repassword" class="form-control input-default" id="repassword">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="w-100 btn btn-success text-white" type="submit">Ubah Password</button>
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
