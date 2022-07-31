
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
                        <h4 class="card-title">Data Bimbingan Mahasiswa</h4>
                    </div>
                    <?php
                        $level = $this->session->userdata('level');
                    ?>
                    <div class="col-lg-2">
                        <?php
                            if($level == 'admin' || $level == 'mahasiswa'){
                                ?>
                                    <a href="<?= base_url('ProposalController/tambahBimbingan') ?>"><button class="btn btn-primary text-white">Tambah</button></a>
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
                                    <th>Judul Proposal</th>
                                    <th>Waktu Bimbingan</th>
                                    <th>File Bimbingan</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($bimbingan->result_array() as $key): ?>
                                <tr>
                                    <td><?= $key['name_mhs'] ?></td>
                                    <td><?= $key['judul'] ?></td>
                                    <td><?= $key['waktu_bimbingan'] ?></td>
                                    <td>
                                        <a href="<?= base_url('upload/proposal/'.$key['file_bimbingan']) ?>" target="_BLANK"><button class="btn btn-success btn-sm text-white">Lihat</button></a>    
                                    </td>
                                    <td><a href="<?= $key['link'] ?>"><button class="btn btn-primary btn-sm text-white">Link</button></a></td>
                                    <?php
                                        if($key['status_bimbingan'] == 'disetujui'){
                                            ?>
                                                <td class="text-success"><?= $key['status_bimbingan'] ?></td>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <td class="text-danger"><?= $key['status_bimbingan'] ?></td>
                                            <?php
                                        }
                                    ?>
                                    <?php
                                        if($level == 'admin' || $level == 'mahasiswa'){
                                            ?>
                                                <td>
                                                    <a href="<?= base_url('ProposalController/editBimbingan/'.$key['bimbingan_proposal_id']) ?>"><button class="btn btn-primary btn-sm text-white">Edit</button></a>
                                                    <a href="<?= base_url('ProposalController/deleteBimbingan/'.$key['bimbingan_proposal_id']) ?>" onclick = "return confirm('Yakin hapus bimbingan?')"><button class="btn btn-danger btn-sm text-white">Delete</button></a>
                                                </td>
                                            <?php
                                        }

                                        elseif($level == 'dosen'){
                                            if($key['status_bimbingan'] == 'belum disetujui'){
                                                ?>
                                                    <td>
                                                        <a href="<?= base_url('ProposalController/setujuiBimbingan/'.$key['bimbingan_proposal_id']) ?>" onclick = "return confirm('Yakin setujui bimbingan?')"><button class="btn btn-success btn-sm text-white">Setujui</button></a>
                                                        <a href="<?= base_url('ProposalController/tolakBimbingan/'.$key['bimbingan_proposal_id']) ?>" onclick = "return confirm('Yakin tolak bimbingan?')"><button class="btn btn-danger btn-sm text-white">Tolak</button></a>
                                                    </td>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <td>
                                                        -
                                                    </td>
                                                <?php
                                            }
                                        }
                                    ?>
                                    
                                </tr>
                            <?php endforeach ?>
                                
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>Judul Proposal</th>
                                    <th>Waktu Bimbingan</th>
                                    <th>File Bimbingan</th>
                                    <th>Link</th>
                                    <th>Status</th>
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
