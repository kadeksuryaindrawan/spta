
        <div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ujian</a></li>
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
                        <h4 class="card-title">Tambah Ujian Proposal</h4>
                    </div>
                    </div>
                    
                    
                    <div class="basic-form mt-5">
                    <?php if($this->session->flashdata('error')): ?>
									<div class="alert alert-danger">
										<?= $this->session->flashdata('error') ?>
									</div>
							<?php endif ?>
                        <form action="<?= base_url('UjianController/addUjianProposal') ?>" method="POST">
                            <div class="form-group">
                                <label for="mahasiswa">Pilih Mahasiswa</label>
                                <select name="nim" id="mahasiswa" class="form-control input-default">
                                    <option value="">Pilih Mahasiswa</option>
                                    <?php
                                    foreach ($mhs->result_array() as $key): ?>
                                        <option value="<?= $key['nim'] ?>"><?= $key['name_mhs'] ?></option>
		                            <?php endforeach ?>
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label for="waktu">Waktu Ujian</label>
                                <input type="datetime-local" name="waktu_ujian" class="form-control input-default" id="waktu">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="w-100 btn btn-success text-white" type="submit">Tambah</button>
                                </div>
                            </div>
                            
                        </form>
                        <div class="row mt-2">
                                <div class="col-12">
                                    <a href="<?= base_url('UjianController') ?>"><button class="w-100 btn btn-danger text-white">Kembali</button></a>
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
