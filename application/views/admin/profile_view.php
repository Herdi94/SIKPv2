<!--start content -->
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>PROFILE</h2>
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

        <script type="text/javascript">

            var base_url = '<?php echo base_url();?>';

        </script>

        <div class="row clearfix">
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <div class="card">
                    <div class="header">
                        <button class="btn btn-primary" onclick="edit_profile()">
                            <i class="glyphicon glyphicon-pencil"></i>Edit Profile
                        </button>
                        <br/>
                        <br/>
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <td width="10%">NIP</td><td><?php echo $this->session->userdata('nip') ?> </td>
                    </tr>

                    <tr>
                        <td width="10%">Nama</td><td><?php echo $this->session->userdata('nama');  ?></td>
                    </tr>

                    <tr>
                        <td width="10%">Username</td><td><?php echo $this->session->userdata('username') ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Email</td><td><?php echo $this->session->userdata('email') ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Foto</td>
                        <td><img src="<?php echo base_url('upload/'.$this->session->userdata('photo')) ?>" class="img-responsive" width="100px" onerror="this.src='<?php echo base_url('images/error_photo.gif'); ?> '"/> </td>

                </tr>
                    </thead>
                        </table>

                </div>
            </div>
        </div>
            </div>

<script type="text/javascript">


    $(document).ready(function () {

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
    });

    });



    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url();?>';



            function edit_profile() {

                save_method = 'edit';
                $('#form')[0].reset();
                $('.form-group').removeClass('has-error');
                $('.help-block').empty();
                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Profile');

                $('#photo-preview').show() // show photo preview modal
                $('#photo-preview div').html('<img src="' + base_url + 'upload/' + "<?php echo $this->session->userdata('photo') ?>" + '" class="img-responsive" width=100px >'); // show photo
            }



    function save() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        var url;

        if (save_method == 'edit') {
            url = "<?php echo site_url('admin/admin/ajax_update_profile')?>";
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

                if (data.status)
                {
                    $('#modal_form').modal('hide');
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
                alert('Error update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable

            }
        });

    }



        function tampilkanPreview(gambar, idpreview) {
            //                membuat objek gambar
            var gb = gambar.files;

            //                loop untuk merender gambar
            for (var i = 0; i < gb.length; i++) {
                //                    bikin variabel
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var preview = document.getElementById(idpreview);
                var reader = new FileReader();

                if (gbPreview.type.match(imageType)) {
                    //                        jika tipe data sesuai
                    preview.file = gbPreview;
                    reader.onload = (function (element) {
                        return function (e) {
                            element.src = e.target.result;
                        };
                    })(preview);

                    //                    membaca data URL gambar
                    reader.readAsDataURL(gbPreview);
                } else {
                    //                        jika tipe data tidak sesuai
                    alert("Type file tidak sesuai. Khusus image.");
                }
            }
        }
        <!-- end show preview foto -->




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
                        <h3 class="modal-title">Edit Profile</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="form" class="form-horizontal">
                            <input type="hidden" value="<?php echo $this->session->userdata('id_admin') ?>" name="id_admin"/>
                            <div class="form-body">


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nip">NIP</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">

                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nip" name="nip"
                                                       value="<?php echo $this->session->userdata('nip') ?>"
                                                       class="form-control"
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
                                                <input type="text" id="nama" name="nama"
                                                       value="<?php echo $this->session->userdata('nama') ?>" class="form-control"
                                                       placeholder="Masukkan nama">
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
                                                       value="<?php echo $this->session->userdata('username') ?>"
                                                       class="form-control"
                                                       placeholder="Masukkan Username">
                                                <span class="help-block"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email" name="email"
                                                       value="<?php echo $this->session->userdata('email') ?>"
                                                       class="form-control" placeholder="Masukkan email">
                                                <span class="help-block"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Update Foto</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-control">
                                    <input type="file"
                                           onchange="tampilkanPreview(this,'preview')"
                                           name="photo"
                                           />
                                        <span class="help-block"/>
                                    </div>
                                    <br>
                                    <br>

                                    <img id="preview" src="" alt="" width="100px">
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