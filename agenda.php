<?php
include 'menu.php';
include 'header.php';
include 'koneksi.php';
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                DAFTAR AGENDA
                <small>Agenda Kegiatan Sekolah Smk Dwk</small>
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="tambah_agenda.php"><button class="btn btn-primary">Tambah Data</button></a>
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
                                        <th>Tanggal  Agenda</th>
                                        <th>Pelasnana</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no=1;
                                    $sql=mysqli_query($kon,"SELECT * FROM agenda");
                                    while ($data=mysqli_fetch_assoc($sql)) {
                                        ?>
                                    
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['nama']?></td>
                                        <td><?= $data['tgl_agenda']?></td>
                                        <td><?= $data['pelaksana']?></td>
                                        <td>
                                            <a href="<?= 'edit_agenda.php?id=' . $data['id_agenda'] ?>" alt ="">
                                                <button class="btn btn-warning"><i class="material-icons"></i>Edit</button></a>

                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-detail<?= $data['id_agenda']; ?>" data-popup="tooltip" data-placement="top" title="Lihat Detail">
                                                <i class="material-icons"></i>Detail
                                            </a>
                                            <div class="modal fade" id="modal-detail<?= $data['id_agenda']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Detail Agenda</h4>
                        </div>
                        <?php
                        $id = $data['id_agenda'];
                        $dt = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM agenda WHERE id_agenda = $id"));

                          ?>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Agenda</td>
                                        <td><?= $dt['nama'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Agenda</td>
                                        <td><?= $dt['tgl_agenda'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Pelaksana</td>
                                        <td><?= $dt['pelaksana'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Deskripsi</td>
                                        <td><?= $dt['deskripsi'] ?></td>
                                    </tr>



                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
                                                <a href="<?= 'hapus_agenda.php?id=' . $data['id_agenda'] ?>">
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