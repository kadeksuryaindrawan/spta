
        <div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Prodi</a></li>
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
                        <h4 class="card-title">Tambah Prodi</h4>
                    </div>
                    </div>
                    
                    
                    <div class="basic-form mt-5">
                    <?php if($this->session->flashdata('error')): ?>
									<div class="alert alert-danger">
										<?= $this->session->flashdata('error') ?>
									</div>
							<?php endif ?>
                        <form action="<?= base_url('ProdiController/add') ?>" method="POST">
                            <div class="form-group">
                                <label for="kode_prodi">Kode Prodi</label>
                                <input type="number" name="kode_prodi" class="form-control input-default" id="kode_prodi">
                            </div>
                            <div class="form-group">
                                <label for="nama_prodi">Nama Prodi</label>
                                <input type="text" name="nama_prodi" class="form-control input-default" id="nama_prodi">
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <button class="w-100 btn btn-success text-white" type="submit">Tambah</button>
                                </div>
                            </div>
                            
                        </form>
                        <div class="row mt-2">
                                <div class="col-12">
                                    <a href="<?= base_url('ProdiController') ?>"><button class="w-100 btn btn-danger text-white">Kembali</button></a>
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
