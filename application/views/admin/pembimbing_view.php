

<!--start content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DATA PEMBIMBING</h2>
        </div>

        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">


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
                        <button class="btn btn-success" onclick="add_pembimbing()"><i
                                class="glyphicon glyphicon-plus"></i>Add
                        </button>
                        <button class="btn btn-default" onclick="reload_table()"><i
                                class="glyphicon glyphicon-refresh"></i> Reload
                        </button>
                        <br/>
                        <br/>
                        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Bidang</th>
                                <th>Jabatan</th>
                                <th width="60">Foto</th>
                                <th>Username</th>
                                <th style="width:50px;">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <script type="text/javascript">


                //inisialisasi
                var save_method; //for save method string
                var base_url = '<?php echo base_url();?>';
                var table;


                $(document).ready(function () {

                    //datatables
                    table = $('#table').DataTable({

                        "processing": true, //Feature control the processing indicator.
                        "serverSide": true, //Feature control DataTables' server-side processing mode.
                        "order": [], //Initial no order.

                        // Load data for the table's content from an Ajax source
                        "ajax": {
                            "url": "<?php echo site_url('admin/pembimbing/ajax_list')?>",
                            "type": "POST"
                        },

                        //Set column definition initialisation properties.
                        "columnDefs": [
                            {
                                "targets": [-3], //last column
                                "orderable": false, //set not orderable (photo)
                            },
                            {
                                "targets": [-1], // last column (aksi)
                                "orderable": false, //set not orderable
                            },
                        ],

                    });

                    //set input/textarea/select event when change value, remove class error and remove text help block
                    $("input").change(function () {
                        $(this).parent().parent().removeClass('has-error');
                        $(this).next().empty();
                    });
                    $("textarea").change(function () {
                        $(this).parent().parent().removeClass('has-error');
                        $(this).next().empty();
                    });
                    $("select").change(function () {
                        $(this).parent().parent().removeClass('has-error');
                        $(this).next().empty();
                    });

                });

                function add_pembimbing() {
                    save_method = 'add';
                    $('#form')[0].reset();
                    $('.form-group').removeClass('has-error');
                    $('.help-block').empty();
                    $('#modal_form').modal('show');
                    $('.modal-title').text('Add Pembimbing');
                }

                function delete_pembimbing(id_pembimbing) {
                    if (confirm('Are you sure delete this data?')) {

                        //ajax delete data
                        $.ajax({
                            url: "<?php echo site_url('admin/pembimbing/ajax_delete')?>/" + id_pembimbing,
                            type: "POST",
                            dataType: "JSON",
                            success: function (data) {
                                //if success reload table
                                $('#modal_form').modal('hide');
                                reload_table();
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                alert("Error deleting data");
                            }
                        })
                    }

                }

                function edit_pembimbing(id_pembimbing) {
                    save_method = 'update';
                    $('#form')[0].reset(); //reset form modal
                    $('.form-group').removeClass('has-error'); //clear error class
                    $('.help-block').empty(); //clear error string

                    //ajax load from database
                    $.ajax({
                        url: "<?php echo site_url('admin/pembimbing/ajax_edit'); ?>/" + id_pembimbing,
                        type: "GET",
                        dataType: "JSON",
                        success: function (data) {
                            $('[name="id_pembimbing"]').val(data.id_pembimbing);

                            $('[name="nip"]').val(data.nip);
                            $('[name="nama"]').val(data.nama);
                            $('[name="bidang"]').val(data.bidang);
                            $('[name="jabatan"]').val(data.jabatan);
                            $('[name="username"]').val(data.username);
                            //setting for hidden password
                            //setting for label
                            $('[for="password" ]').hide();
                            //setting for input type
                            $('[name="password" ]').hide();
                            //setting for div form-line
                            $('#hd-form-line').hide();

                            $('#modal_form').modal('show'); //showing modal when complete loaded
                            $('.modal-title').text('Edit Pembimbing');

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('Error get data from ajax');
                        }
                    });

                }


                function reload_table() {
                    table.ajax.reload(null, false); //reload datatable ajax
                }


                function save() {
                    $('#btnSave').text('saving...'); //change button text
                    $('#btnSave').attr('disabled', true); //set button disable
                    var url;

                    if (save_method == 'add') {
                        url = "<?php echo site_url('admin/pembimbing/ajax_add')?>";
                    } else {
                        url = "<?php echo site_url('admin/pembimbing/ajax_update')?>";
                    }

                    // ajax adding data to database

                    var formData = new FormData($('#form')[0]);
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: "JSON",
                        success: function (data) {

                            if (data.status) //if success close modal and reload ajax table
                            {
                                $('#modal_form').modal('hide');
                                reload_table();
                            }
                            else {
                                for (var i = 0; i < data.inputerror.length; i++) {
                                    $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                                }
                            }
                            $('#btnSave').text('save'); //change button text
                            $('#btnSave').attr('disabled', false); //set button enable


                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('Error adding / update data');
                            $('#btnSave').text('save'); //change button text
                            $('#btnSave').attr('disabled', false); //set button enable

                    }});
                }


            </script>

            <!--Bootstrap modal -->
            <div class="modal fade" id="modal_form" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!--header modal -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">
                                    &times;</span></button>
                            <h3 class="modal-title">Pembimbing Form</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" value="" name="id_pembimbing"/>

                                <div class="form-body">


                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="nip">NIP</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="nip" name="nip" class="form-control"
                                                           placeholder="Masukkan nip">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="nama">Nama</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="nama" name="nama" class="form-control"
                                                           placeholder="Masukkan nama">
                                                    <span class="help-block"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="bidang">Bidang</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="bidang" name="bidang" class="form-control"
                                                           placeholder="Masukkan bidang">
                                                    <span class="help-block"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="jabatan">Jabatan</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="jabatan" name="jabatan" class="form-control"
                                                           placeholder="Masukkan jabatan">
                                                    <span class="help-block"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="username" name="username"
                                                           class="form-control" placeholder="Masukkan username">
                                                    <span class="help-block"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line" id="hd-form-line">
                                                    <input type="password" id="password" name="password"
                                                           class="form-control" placeholder="Masukkan password">
                                                    <span class="help-block"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>


        </body>
        </html>

    </div>
</section>
<!--end content -->
</html>