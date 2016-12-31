


<body>

<script src="<?php echo base_url('assets/startbootstrap_freelancer/js/jquery-2.1.4.min.js')?>"></script><!--penting-->

<!-- Bootstrap Core Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/bootstrap/js/bootstrap.js') ?>"></script>

<!-- Bootstrap Core Css -->
<link href="<?php echo base_url('assets/AdminBSB/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Detail Pendaftaran</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">

                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label col-md-3">No:</label>
                            <div class="col-md-9">

                                <input name="kode_pengajuan" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">No.identitas:</label>
                            <div class="col-md-9">
                                <input name="no_identitas" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama:</label>
                            <div class="col-md-9">
                                <input name="nama2" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Kelamin:</label>
                            <div class="col-md-9">
                                <input name="jk" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Email:</label>
                            <div class="col-md-9">
                                <input name="email" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Pendidikan:</label>
                            <div class="col-md-9">
                                <input name="pendidikan" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Jurusan:</label>
                            <div class="col-md-9">
                                <input name="jurusan" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Sekolah:</label>
                            <div class="col-md-9">
                                <input name="sekolah" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Jenis Pengaju:</label>
                            <div class="col-md-9">
                                <input name="jns_pengaju" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group" id="anggota">
                            <label class="control-label col-md-3">Anggota:</label>
                            <div class="col-md-9">
                                <input name="anggota_kelompok" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Awal KP:</label>
                            <div class="col-md-9">
                                <input name="tgl_mulai" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Akhir KP:</label>
                            <div class="col-md-9">
                                <input name="tgl_akhir" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <!--
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Awal KP:</label>
                                                                <div class="col-md-9">
                                                                    <input name="tgl_mulai" placeholder="yyyy-mm-dd" class="datepicker" type="text">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Akhir KP:</label>
                                                                <div class="col-md-9">
                                                                    <input name="tgl_akhir" placeholder="yyyy-mm-dd" class="datepicker" type="text">
                                                                    <span class="help-block"></span>
                                                                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                                                                </div>

                                                            </div>

                        -->
                        <div class="form-group">
                            <label class="control-label col-md-3">Disetujui:</label>
                            <div class="col-md-9">
                                <input name="status" class="form-control" type="text" disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Surat:</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>


                    </div>
                </form action="#"form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function () {

        $('#modal_form').modal('show');

    });

</script>

</body>