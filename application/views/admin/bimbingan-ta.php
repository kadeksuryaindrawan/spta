
        <div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">TA</a></li>
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
                    
                    <div class="col-lg-2">
                        <a href="<?= base_url('TAController/tambahBimbingan') ?>"><button class="btn btn-primary text-white">Tambah</button></a>
                    </div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>Judul TA</th>
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
                                        <a href="<?= base_url('upload/ta/'.$key['file_bimbingan']) ?>" target="_BLANK"><button class="btn btn-success btn-sm text-white">Lihat</button></a>    
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
                                    
                                    <td>
                                        <a href="<?= base_url('TAController/editBimbingan/'.$key['bimbingan_ta_id']) ?>"><button class="btn btn-primary btn-sm text-white">Edit</button></a>
                                        <a href="<?= base_url('TAController/deleteBimbingan/'.$key['bimbingan_ta_id']) ?>" onclick = "return confirm('Yakin hapus bimbingan?')"><button class="btn btn-danger btn-sm text-white">Delete</button></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                                
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Mahasiswa</th>
                                    <th>Judul TA</th>
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
