
        <div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">ta</a></li>
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
                        <h4 class="card-title">Edit Bimbingan TA</h4>
                    </div>
                    </div>
                    
                    
                    <div class="basic-form mt-5">
                    <?php if($this->session->flashdata('error')): ?>
									<div class="alert alert-danger">
										<?= $this->session->flashdata('error') ?>
									</div>
							<?php endif ?>
                        <form action="<?= base_url('TAController/editBimbinganProcess/').$bimbingan['bimbingan_ta_id'] ?>" method="POST"  enctype="multipart/form-data">
                            <input type="hidden" value="<?= $bimbingan['bimbingan_ta_id'] ?>" name="bimbingan_ta_id">
                            <div class="form-group">
                                <label for="ta">Pilih TA</label>
                                <select name="ta_id" id="ta" class="form-control input-default">
                                    <option value="">Pilih TA</option>
                                    <?php
                                    foreach ($ta->result_array() as $key): 
                                        $selected = ($key['ta_id'] == $bimbingan['ta_id']) ? 'selected' : '';
                                    ?>
                                        <option value="<?= $key['ta_id'] ?>" <?= $selected ?>><?= $key['judul'] ?></option>
		                            <?php endforeach ?>
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label for="waktu">Waktu Bimbingan</label>
                                <input type="datetime-local" name="waktu_bimbingan" class="form-control input-default" id="waktu" value="<?= $bimbingan['waktu_bimbingan'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="file">File PDF</label>
                                <input type="file" name="file_bimbingan" class="form-control input-default" id="file">
                            </div>

                            <div class="form-group">
                                <label for="link">Link Meet</label>
                                <input type="text" name="link" class="form-control input-default" id="link" value="<?= $bimbingan['link'] ?>">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="w-100 btn btn-success text-white" type="submit">Edit</button>
                                </div>
                            </div>
                            
                        </form>
                        <div class="row mt-2">
                                <div class="col-12">
                                    <a href="<?= base_url('TAController/bimbingan') ?>"><button class="w-100 btn btn-danger text-white">Kembali</button></a>
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
