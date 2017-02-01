<!--start content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DATA PENDAFTARAN</h2>
        </div>

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">





            <!--            <link href="--><?php //echo base_url('assets/bootstrap-datepicker1/css/bootstrap-datepicker3.min.css')?><!--" rel="stylesheet">-->

            <link href="<?php echo base_url('assets/datatables/media/css/dataTables.bootstrap.css')?>" rel="stylesheet">
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body>

        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                        <br />
                        <br />
                        <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM/NIS</th>
                                <th>Nama</th>
                                <th>Sekolah</th>
                                <th>Pengajuan</th>
                                <th>Awal KP</th>
                                <th>Akhir KP</th>
                                <th>Status</th>
                                <th width="60">Surat</th>
                                <th style="width:50px;">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                            </div>
                    </div>
                </div>
            </div>


            <script src="<?php echo base_url('assets/startbootstrap_freelancer/vendor/jquery/jquery.min.js')?>"></script><!--penting-->
            <script src="<?php echo base_url('assets/datatables/media/js/jquery.dataTables.min.js')?>"></script><!--penting-->
            <script src="<?php echo base_url('assets/datatables/media/js/dataTables.bootstrap.js')?>"></script>
            <!--            <script src="--><?php //echo base_url('assets/bootstrap-datepicker1/js/bootstrap-datepicker.min.js')?><!--"></script>-->


            <script type="text/javascript">


                //inisialisasi
                var save_method; //for save method string
                var base_url = '<?php echo base_url();?>';
                var table;


                $(document).ready(function() {

                    //datatables
                    table = $('#table').DataTable({

                        "processing": true, //Feature control the processing indicator.
                        "serverSide": true, //Feature control DataTables' server-side processing mode.
                        "order": [], //Initial no order.

                        // Load data for the table's content from an Ajax source
                        "ajax": {
                            "url": "<?php echo site_url('admin/pendaftaran/ajax_list');?>",
                            "type": "POST"
                        },

                        //Set column definition initialisation properties.
                        "columnDefs": [
                            {
                                "targets": [ -1 ], //last column
                                "orderable": false, //set not orderable
                            },
                            {
                                "targets": [ -2 ], //2 last column (photo)
                                "orderable": false, //set not orderable
                            },
                        ],

                    });

                    <!--for date picker -->


                    /*datepicker
                     $('.datepicker').datepicker({
                     autoclose: true,
                     format: "yyyy-mm-dd",
                     todayHighlight: true,
                     orientation: "top auto",
                     todayBtn: true,
                     todayHighlight: true,
                     });

                     //set input/textarea/select event when change value, remove class error and remove text help block
                     $("input").change(function(){
                     $(this).parent().parent().removeClass('has-error');
                     $(this).next().empty();
                     });
                     $("textarea").change(function(){
                     $(this).parent().parent().removeClass('has-error');
                     $(this).next().empty();
                     });
                     $("select").change(function(){
                     $(this).parent().parent().removeClass('has-error');
                     $(this).next().empty();
                     }); */

                });


                <!--end date picker-->




                function disetujui(kode_pengajuan)
                {
                    status = 'Diterima';
                    id_pembimbing = "<?= $this->session->userdata('id_pembimbing')?>";
                   //$(function(){

                        $.ajax({
                            type:"POST",
                            url: "<?= base_url('admin/pendaftaran/action_status'); ?>",
                            data : "ac=Diterima" + "&kode_pengajuan=" + kode_pengajuan + "&id_pembimbing=" +id_pembimbing,
                            success : function(response){
                                //console.log(response);
                                reload_table();
                                alert("Pendaftaran Disetujui");
                            },
                            error: function (jqXHR, status, error){
                                //console.log(error);
                                reload_table();
                                alert("Pendaftaran Disetujui");
                            }
                        });
                        /*$.post("<?= base_url()?>admin/pendaftaran/action_setuju", {"kode_pengajuan" : kode_pengajuan,"status" : status})
                            .done(function (data){
                                console.log(data);
                                if(data){
                                    reload_table();
                                    alert("Pendaftaran Disetujui");
                                }
                                else{
                                    reload_table();
                                    alert("error")
                                }


                            })*/
                    //})


                }

                function ditolak(kode_pengajuan){

                    status='Ditolak';
                    id_pembimbing = "<?= $this->session->userdata('id_pembimbing')?>";
                    $.ajax({
                        type:"POST",
                        url:"<?=base_url('admin/pendaftaran/action_status')?>",
                        data: "ac=Ditolak" +"&kode_pengajuan=" +kode_pengajuan +"&id_pembimbing=" +id_pembimbing,
                        success: function(response){
                            reload_table();
                            alert("Pendaftaran Ditolak");
                        },
                        error:function(jqXHR,status,error){
                            reload_table();
                            alert("Pendaftaran Ditolak");
                        }
                    });

                }





                function detail_pendaftaran(kode_pengajuan)
                {
                    //save_method = 'update';
                    $('#form')[0].reset(); // reset form on modals
                    $('.form-group').removeClass('has-error'); // clear error class
                    $('.help-block').empty(); // clear error string


                    //Ajax Load data from ajax
                    $.ajax({
                        type: "GET",
                        url : "<?php echo site_url('admin/pendaftaran/detail_pengaju')?>/" + kode_pengajuan,
                        dataType: "JSON",
                        success: function(data)
                        {

                            $('[name="kode_pengajuan"]').val(data.kode_pengajuan);
                            $('[name="no_identitas"]').val(data.no_identitas);
                            $('[name="nama2"]').val(data.nama);
                            $('[name="jk"]').val(data.jk);
                            $('[name="email"]').val(data.email);
                            $('[name="pendidikan"]').val(data.pendidikan);
                            $('[name="jurusan"]').val(data.jurusan);
                            $('[name="sekolah"]').val(data.sekolah);
                            $('[name="jns_pengaju"]').val(data.jns_pengaju);
                            $('[name="tgl_mulai"]').val(data.tgl_mulai);
                            $('[name="tgl_akhir"]').val(data.tgl_akhir);
                            $('[name="status"]').val(data.status);
                            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                            $('.modal-title').text('Detail Pendaftaran'); // Set title to Bootstrap modal title



                            if(data.anggota_kelompok)
                            {
                                $('[name="anggota_kelompok"]').val(data.anggota_kelompok);
                            }
                            else
                            {
                                $('#anggota div').text('(Tidak ada anggota kelompok)');
                            }


                            $('#photo-preview').show(); // show photo preview modal

                            if(data.surat)
                            {
                                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.surat+'" class="img-responsive" width=50%>'); // show photo surat
                            }
                            else
                            {
                                $('#photo-preview div').text('(No photo)');
                            }


                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error get data from ajax');
                        }
                    });
                }



                function reload_table()
                {
                    table.ajax.reload(null,false); //reload datatable ajax
                }






            </script>



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

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Akhir KP:</label>
                                        <div class="col-md-9">
                                            <input name="tgl_akhir" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Status:</label>
                                        <div class="col-md-9">
                                            <input name="status" class="form-control" type="text" disabled>
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
                                    <!-- form status
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Disetujui:</label>
                                        <div class="col-md-9">
                                            <input name="status" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    -->

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





        </body>
        </html>

    </div>
</section>
<!--end content -->
