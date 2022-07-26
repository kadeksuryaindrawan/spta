
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Dosen</a></li>
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
                                <div class="col-10">
                                    <h4 class="card-title">Data Dosen</h4>
                                </div>
                                
                                <div class="col-2">
                                    <a href="<?= base_url('DosenController/tambah') ?>"><button class="btn btn-primary text-white">Tambah Dosen</button></a>
                                </div>
                                </div>
                                
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>NIP</th>
                                                <th>Email</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Prodi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
		                                foreach ($dosen->result_array() as $key): ?>
			                                <tr>
                                                <td><?= $key['nip'] ?></td>
                                                <td><?= $key['email'] ?></td>
                                                <td><?= $key['name'] ?></td>
                                                <td><?= $key['alamat'] ?></td>
                                                <td><?= $key['nama_prodi'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('DosenController/edit/'.$key['user_id']) ?>"><button class="btn btn-primary btn-sm text-white">Edit</button></a>
                                                    <a href="<?= base_url('DosenController/delete/'.$key['user_id']) ?>" onclick = "return confirm('Yakin hapus dosen?')"><button class="btn btn-danger btn-sm text-white">Delete</button></a>
                                                    <a href="<?= base_url('DosenController/ubahPassword/'.$key['user_id']) ?>"><button class="btn btn-warning btn-sm text-white">Ubah Password</button></a>
                                                </td>
                                            </tr>
		                                <?php endforeach ?>
                                            
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>NIP</th>
                                                <th>Email</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Prodi</th>
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
    