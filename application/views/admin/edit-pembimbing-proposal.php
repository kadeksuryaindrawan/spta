
        <div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Mahasiswa</a></li>
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
                        <h4 class="card-title">Edit Pembimbing Proposal Mahasiswa</h4>
                    </div>
                    </div>
                    
                    
                    <div class="basic-form mt-5">
                    <?php if($this->session->flashdata('error')): ?>
									<div class="alert alert-danger">
										<?= $this->session->flashdata('error') ?>
									</div>
							<?php endif ?>
                        <form action="<?= base_url('MahasiswaController/editPembimbingProposalProcess') ?>" method="POST">
                            
                        <input type="hidden" value="<?= $mhs['nim'] ?>" name="nim">
                            <div class="form-group">
                                <label for="nip">Pilih Dosen Pembimbing Proposal</label>
                                <select name="dosbing1" id="nip" class="form-control input-default">
                                    
                                    <option value="">Pilih Dosen</option>
                                    <?php
                                    foreach ($dosen->result_array() as $key): 
                                        $selected = ($key['nip'] == $mhs['dosbing1']) ? 'selected' : '';
                                    ?>
                                        <option value="<?= $key['nip'] ?>" <?= $selected ?>><?= $key['name'] ?></option>
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
                                    <a href="<?= base_url('MahasiswaController/pembimbingProposal') ?>"><button class="w-100 btn btn-danger text-white">Kembali</button></a>
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
