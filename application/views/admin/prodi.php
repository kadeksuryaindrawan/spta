
        <div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Prodi</a></li>
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
                        <h4 class="card-title">Data Prodi</h4>
                    </div>
                    
                    <div class="col-lg-2">
                        <a href="<?= base_url('ProdiController/tambah') ?>"><button class="btn btn-primary text-white">Tambah Prodi</button></a>
                    </div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Kode Prodi</th>
                                    <th>Nama Prodi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($prd->result_array() as $key): ?>
                                <tr>
                                    <td><?= $key['kode_prodi'] ?></td>
                                    <td><?= $key['nama_prodi'] ?></td>
                                    <td>
                                        <a href="<?= base_url('ProdiController/edit/'.$key['kode_prodi']) ?>"><button class="btn btn-primary btn-sm text-white">Edit</button></a>
                                        <a href="<?= base_url('ProdiController/delete/'.$key['kode_prodi']) ?>" onclick = "return confirm('Yakin hapus prodi?')"><button class="btn btn-danger btn-sm text-white">Delete</button></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                                
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>Kode Prodi</th>
                                    <th>Nama Prodi</th>
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
