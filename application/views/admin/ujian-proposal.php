
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
                        <h4 class="card-title">Data Ujian Proposal</h4>
                    </div>
                    
                    <div class="col-lg-2">
                        <a href="<?= base_url('UjianController/tambahUjianProposal') ?>"><button class="btn btn-primary text-white">Tambah</button></a>
                    </div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>Judul</th>
                                    <th>Waktu Ujian</th>
                                    <th>Nilai</th>
                                    <th>Status Ujian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($ujian->result_array() as $key): ?>
                                <tr>
                                    <td><?= $key['name_mhs'] ?></td>
                                    <td><?= $key['judul'] ?></td>
                                    <td><?= $key['waktu_ujian'] ?></td>
                                    <?php
                                    if($key['nilai'] == NULL){
                                        ?>
                                            <td class="text-center">-</td>
                                        <?php
                                    }
                                        elseif($key['nilai'] >= 66 && $key['nilai'] <=100){
                                            ?>
                                                <td class="text-success text-center"><?= $key['nilai'] ?></td>
                                            <?php
                                        }
                                        elseif($key['nilai'] <= 65){
                                            ?>
                                                <td class="text-danger text-center"><?= $key['nilai'] ?></td>
                                            <?php
                                        }
                                        
                                    ?>

                                    <?php
                                    if($key['status_up'] == 'proses'){
                                        ?>
                                            <td class="text-warning"><?= $key['status_up'] ?></td>
                                        <?php
                                    }
                                    elseif($key['status_up'] == 'lulus'){
                                        ?>
                                            <td class="text-success"><?= $key['status_up'] ?></td>
                                        <?php
                                    }
                                    elseif($key['status_up'] == 'tidak lulus'){
                                        ?>
                                            <td class="text-danger"><?= $key['status_up'] ?></td>
                                        <?php
                                    }
                        
                                        
                                    ?>
                                    
                                    
                                    <td>
                                        <a href="<?= base_url('UjianController/editUjianProposal/'.$key['ujian_proposal_id']) ?>"><button class="btn btn-primary btn-sm text-white">Edit</button></a>
                                        <a href="<?= base_url('UjianController/deleteUjianProposal/'.$key['ujian_proposal_id']) ?>" onclick = "return confirm('Yakin hapus ujian proposal?')"><button class="btn btn-danger btn-sm text-white">Delete</button></a>
                                        <?php
                                            if($key['nilai'] == NULL){
                                                ?>
                                                    <a href="<?= base_url('UjianController/nilaiUjianProposal/'.$key['ujian_proposal_id']) ?>"><button class="btn btn-warning btn-sm text-white">Nilai</button></a>
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
                                    <th>Waktu Ujian</th>
                                    <th>Nilai</th>
                                    <th>Status Ujian</th>
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
