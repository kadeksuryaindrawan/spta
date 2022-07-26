
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
                        <div class="col-12">
                        <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success') ?>
                        </div>
                <?php endif ?>
                        </div>
                    <div class="col-lg-10">
                        <h4 class="card-title">Data Mahasiswa</h4>
                    </div>
                    
                    <div class="col-lg-2">
                        <a href="<?= base_url('MahasiswaController/tambah') ?>"><button class="btn btn-primary text-white">Tambah Mahasiswa</button></a>
                    </div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>NIM</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Prodi</th>
                                    <th>Dosbing1</th>
                                    <th>Dosbing2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($mhs->result_array() as $key): ?>
                                <tr>
                                    <td><img src="<?= base_url('upload/img/mahasiswa/'.$key['foto']) ?>" alt="" width="50px" height="70px"></td>
                                    <td><?= $key['nim'] ?></td>
                                    <td><?= $key['email'] ?></td>
                                    <td><?= $key['name'] ?></td>
                                    <td><?= $key['alamat'] ?></td>
                                    <td><?= $key['nama_prodi'] ?></td>
                                    <?php
                                        if($key['dosbing1'] == NULL){
                                            ?>
                                                <td class="text-danger"> Belum Ada </td>
                                            <?php
                                        }

                                        else{
                                            ?>
                                                <td class="text-success"> Sudah Ada </td>
                                            <?php
                                        }

                                        if($key['dosbing2'] == NULL){
                                            ?>
                                                <td class="text-danger"> Belum Ada </td>
                                            <?php
                                        }

                                        else{
                                            ?>
                                                <td class="text-success"> Sudah Ada </td>
                                            <?php
                                        }
                                    ?>
                                    
                                    
                                    <td>
                                        <a href="<?= base_url('MahasiswaController/edit/'.$key['user_id']) ?>"><button class="btn btn-primary btn-sm text-white">Edit</button></a>
                                        <a href="<?= base_url('MahasiswaController/delete/'.$key['user_id']) ?>" onclick = "return confirm('Yakin hapus mahasiswa?')"><button class="btn btn-danger btn-sm text-white">Delete</button></a>
                                        <a href="<?= base_url('MahasiswaController/ubahPassword/'.$key['user_id']) ?>"><button class="btn btn-warning btn-sm text-white">Ubah Password</button></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                                
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>Foto</th>
                                    <th>NIM</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Prodi</th>
                                    <th>Dosbing1</th>
                                    <th>Dosbing2</th>
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
