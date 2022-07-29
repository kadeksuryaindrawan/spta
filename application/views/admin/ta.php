
        <div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Proposal</a></li>
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
                        <div class="col-12">
                        <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success') ?>
                        </div>
                <?php endif ?>
                        </div>
                    <div class="col-lg-10">
                        <h4 class="card-title">Data TA Mahasiswa</h4>
                    </div>
                    
                    <div class="col-lg-2">
                        <a href="<?= base_url('TAController/tambah') ?>"><button class="btn btn-primary text-white">Tambah</button></a>
                    </div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>Judul</th>
                                    <th>Penguji 1</th>
                                    <th>Penguji 2</th>
                                    <th>Status</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($ta->result_array() as $key): ?>
                                <tr>
                                    <td><?= $key['name_mhs'] ?></td>
                                    <td><?= $key['judul'] ?></td>
                                    
                                    <?php
                                        if($key['penguji1'] == NULL){
                                            ?>
                                                <td class="text-danger">Belum Ada</td>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <td class="text-success"><?= $key['nama_penguji1'] ?></td>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                        if($key['penguji2'] == NULL){
                                            ?>
                                                <td class="text-danger">Belum Ada</td>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <td class="text-success"><?= $key['nama_penguji2'] ?></td>
                                            <?php
                                        }
                                    ?>

<?php
                                        if($key['status_ta'] == 'susun'){
                                            ?>
                                                <td class="text-primary"><?= $key['status_ta'] ?></td>
                                            <?php
                                        }
                                        elseif($key['status_ta'] == 'ujian'){
                                            ?>
                                                <td class="text-warning"><?= $key['status_ta'] ?></td>
                                            <?php
                                        }
                                        elseif($key['status_ta'] == 'lulus'){
                                            ?>
                                                <td class="text-success"><?= $key['status_ta'] ?></td>
                                            <?php
                                        }
                                        elseif($key['status_ta'] == 'tidak lulus'){
                                            ?>
                                                <td class="text-danger"><?= $key['status_ta'] ?></td>
                                            <?php
                                        }
                                    ?>
                                    
                                    <td>
                                        <a href="<?= base_url('upload/ta/'.$key['file']) ?>" target="_BLANK"><button class="btn btn-success btn-sm text-white">Lihat</button></a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('TAController/edit/'.$key['ta_id']) ?>"><button class="btn btn-primary btn-sm text-white">Edit</button></a>
                                        <a href="<?= base_url('TAController/delete/'.$key['ta_id']) ?>" onclick = "return confirm('Yakin hapus TA?')"><button class="btn btn-danger btn-sm text-white">Delete</button></a>
                                        <?php
                                            if($key['penguji1'] == NULL && $key['penguji2'] == NULL){
                                                ?>
                                                    <a href="<?= base_url('TAController/penguji/'.$key['ta_id']) ?>"><button class="btn btn-warning btn-sm text-white">Tentukan Penguji</button></a>
                                                <?php
                                            }
                                        ?>
                                        
                                    </td>
                                </tr>
                            <?php endforeach ?>
                                
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>Nama Mahasiswa</th>
                                    <th>Judul</th>
                                    <th>Penguji 1</th>
                                    <th>Penguji 2</th>
                                    <th>Status</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
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
