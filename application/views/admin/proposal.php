
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
                        <h4 class="card-title">Data Proposal Mahasiswa</h4>
                    </div>
                    <?php
                        $level = $this->session->userdata('level');
                    ?>
                    <div class="col-lg-2">
                        <?php
                            if($level == 'admin' || $level == 'mahasiswa'){
                                ?>
                                    <a href="<?= base_url('ProposalController/tambah') ?>"><button class="btn btn-primary text-white">Tambah</button></a>
                                <?php
                            }
                        ?>
                        
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
                            foreach ($proposal->result_array() as $key): ?>
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
                                                <td class="text-success">Sudah Ada</td>
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
                                                <td class="text-success">Sudah Ada</td>
                                            <?php
                                        }
                                    ?>

<?php
                                        if($key['status_proposal'] == 'susun'){
                                            ?>
                                                <td class="text-primary"><?= $key['status_proposal'] ?></td>
                                            <?php
                                        }
                                        elseif($key['status_proposal'] == 'ujian'){
                                            ?>
                                                <td class="text-warning"><?= $key['status_proposal'] ?></td>
                                            <?php
                                        }
                                        elseif($key['status_proposal'] == 'lulus'){
                                            ?>
                                                <td class="text-success"><?= $key['status_proposal'] ?></td>
                                            <?php
                                        }
                                        elseif($key['status_proposal'] == 'tidak lulus'){
                                            ?>
                                                <td class="text-danger"><?= $key['status_proposal'] ?></td>
                                            <?php
                                        }
                                    ?>
                                    
                                    <td>
                                        <a href="<?= base_url('upload/proposal/'.$key['file']) ?>" target="_BLANK"><button class="btn btn-success btn-sm text-white">Lihat</button></a>
                                    </td>
                                    <?php
                                        
                                        if($level == 'admin'){
                                            ?>
                                                <td>
                                                    <a href="<?= base_url('ProposalController/edit/'.$key['proposal_id']) ?>"><button class="btn btn-primary btn-sm text-white">Edit</button></a>
                                                    <a href="<?= base_url('ProposalController/delete/'.$key['proposal_id']) ?>" onclick = "return confirm('Yakin hapus proposal?')"><button class="btn btn-danger btn-sm text-white">Delete</button></a>
                                                    <?php
                                                        if($key['penguji1'] == NULL && $key['penguji2'] == NULL){
                                                            ?>
                                                                <a href="<?= base_url('ProposalController/penguji/'.$key['proposal_id']) ?>"><button class="btn btn-warning btn-sm text-white">Tentukan Penguji</button></a>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                                <a href="<?= base_url('ProposalController/lihatPenguji/'.$key['proposal_id']) ?>"><button class="btn btn-warning btn-sm text-white">Lihat Penguji</button></a>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </td>
                                            <?php
                                        }

                                        elseif($level == 'dosen'){
                                            ?>
                                                <td>
                                                    <?php
                                                        if($key['penguji1'] == NULL && $key['penguji2'] == NULL){
                                                            ?>
                                                                -
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                                <a href="<?= base_url('ProposalController/lihatPenguji/'.$key['proposal_id']) ?>"><button class="btn btn-warning btn-sm text-white">Lihat Penguji</button></a>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                            <?php
                                        }

                                        elseif($level == 'mahasiswa'){
                                            ?>
                                                <td>
                                                    <a href="<?= base_url('ProposalController/edit/'.$key['proposal_id']) ?>"><button class="btn btn-primary btn-sm text-white">Edit</button></a>
                                                    <a href="<?= base_url('ProposalController/delete/'.$key['proposal_id']) ?>" onclick = "return confirm('Yakin hapus proposal?')"><button class="btn btn-danger btn-sm text-white">Delete</button></a>
                                                    <?php
                                                        if($key['penguji1'] != NULL && $key['penguji2'] != NULL){
                                                            ?>
                                                                <a href="<?= base_url('ProposalController/lihatPenguji/'.$key['proposal_id']) ?>"><button class="btn btn-warning btn-sm text-white">Lihat Penguji</button></a>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </td>
                                            <?php
                                        }
                                    ?>
                                    
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
