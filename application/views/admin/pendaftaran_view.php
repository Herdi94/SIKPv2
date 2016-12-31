<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Kerja Praktek Online - Admin</title>

    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/images/jabar.png')?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/AdminBSB/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/AdminBSB/plugins/node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/AdminBSB/plugins/animate-css/animate.css')?>" rel="stylesheet" />

    <!-- Preloader Css -->
    <link href="<?php echo base_url('assets/AdminBSB/plugins/material-design-preloader/md-preloader.css')?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/AdminBSB/css/style.css')?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets/AdminBSB/css/themes/all-themes.css')?>" rel="stylesheet" />
</head>

<body class="theme-pink">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="md-preloader pl-size-md">
            <svg viewbox="0 0 75 75">
                <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
            </svg>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo site_url('dashboard/home'); ?>">Kerja Praktek Online - Admin</a>
        </div>

    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo base_url('assets/images/herdi.png')?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    //echo $this->session->userdata('nama');
                    ?>
                    </div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>

                        <li role="seperator" class="divider"></li>
                        <li><a href="<?php echo site_url('dashboard/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="<?php echo site_url('dashboard/home'); ?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/pembimbing'); ?>">
                        <i class="material-icons">assignment</i>
                        <span>Data Pembimbing</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/pendaftaran'); ?>">
                        <i class="material-icons">view_list</i>
                        <span>Data Pendaftaran</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 <a href="http://diskominfo.jabarprov.go.id/">Dinas Komunikasi dan Informatika <br> Jawa Barat</a>
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>



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
                                <!-- status
                                --<th>Disetujui</th>-->
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


            <script src="<?php echo base_url('assets/startbootstrap_freelancer/js/jquery-2.1.4.min.js')?>"></script><!--penting-->
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
                            "url": "<?php echo site_url('admin/pendaftaran/ajax_list')?>",
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







                function detail_pendaftaran(kode_pengajuan)
                {
                    //save_method = 'update';
                    $('#form')[0].reset(); // reset form on modals
                    $('.form-group').removeClass('has-error'); // clear error class
                    $('.help-block').empty(); // clear error string


                    //Ajax Load data from ajax
                    $.ajax({
                        url : "<?php echo site_url('admin/pendaftaran/detail_pengaju')?>/" + kode_pengajuan,
                        type: "GET",
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
                            //$('[name="anggota_kelompok"]').val(data.anggota_kelompok);
                            //$('[name="tgl_mulai"]').datepicker('update',data.tgl_mulai);
                            //$('[name="tgl_akhir"]').datepicker('update',data.tgl_akhir);
                            //$('[name="status"]').val(data.status);
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

                            if(data.photo)
                            {
                                $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive" width=50%>'); // show photo
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




/*
            function save()
            {
            $('#btnSave').text('Saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable
            var url;

            if(save_method == 'update') {
            url = "<?php echo site_url('admin/pendaftaran/ajax_update')?>";
            }

            // ajax adding data to database

            var formData = new FormData($('#form')[0]);
            $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {

            if(data.status) //if success close modal and reload ajax table
            {
            //$('#modal_form').modal('hide');
            reload_table();
            }
            else
            {
            for (var i = 0; i < data.inputerror.length; i++)
            {
            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
            }
            }
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            alert('Error adding / update data');
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

            }
            });
            }
*/

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



<!-- Bootstrap Core Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/bootstrap/js/bootstrap.js') ?>"></script>


<!-- Slimscroll Plugin Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/jquery-slimscroll/jquery.slimscroll.js')?>"></script>


<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/node-waves/waves.js') ?>"></script>


<!-- Flot Charts Plugin Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/flot-charts/jquery.flot.js')?>"></script>
<script src="<?php echo base_url('assets/AdminBSB/plugins/flot-charts/jquery.flot.resize.js')?>"></script>
<script src="<?php echo base_url('assets/AdminBSB/plugins/flot-charts/jquery.flot.pie.js')?>"></script>
<script src="<?php echo base_url('assets/AdminBSB/plugins/flot-charts/jquery.flot.categories.js')?>"></script>
<script src="<?php echo base_url('assets/AdminBSB/plugins/flot-charts/jquery.flot.time.js')?>"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/jquery-countto/jquery.countTo.js') ?>"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="<?php echo base_url('assets/AdminBSB/plugins/jquery-sparkline/jquery.sparkline.js')?>"></script>

<!-- Custom Js -->
<script src="<?php echo base_url('assets/AdminBSB/js/admin.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminBSB/js/pages/index.js') ?>"></script>

<!-- Demo Js -->
<script src="<?php echo base_url('assets/AdminBSB/js/demo.js') ?>"></script>

</body>

</html>