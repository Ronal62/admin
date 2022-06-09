<?php
include 'menu.php';
include 'header.php';
include 'koneksi.php';
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                DAFTAR ALUMNI
                <small>Daftar Alumni Smk Dwk</small>
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="tambah_alumni.php"><button class="btn btn-primary">Tambah Data</button></a>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name</th>
                                        <th>Tetala</th>
                                        <th>Alamat</th>
                                        <th>Tahun Lulus</th>
                                        <th>Jenjang</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no=1;
                                    $sql=mysqli_query($kon,"SELECT * FROM alumni");
                                    while ($data=mysqli_fetch_assoc($sql)) {
                                        ?>
                                    
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nama']?></td>
                                        <td><?= $data['tetala']?></td>
                                        <td><?= $data['alamat']?></td>
                                        <td><?= $data['tahun_lulus']?></td>
                                        <td><?= $data['jenjang']?></td>
                                        <td><img height="100" src="<?= 'images/image-gallery/foto_alumni/'.$data['foto']?>"></td>
                                        <td style="text-align: center;"> 
                                            <a href="<?= 'edit_alumni.php?id=' . $data['id_alumni'] ?>" alt ="">
                                                <button class="btn btn-warning"><i class="material-icons"></i>Edit</button></a>

                                            
                                                <a href="<?= 'hapus_alumni.php?id=' . $data['id_alumni'] ?>">
                                            <button class="btn btn-danger"><i class="material-icons"></i>Hapus</button></a>
                                        </td>
                                            
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->

            <!-- #END# Exportable Table -->
        </div>
    </section>
    <?php
    include 'footer.php';
    ?>