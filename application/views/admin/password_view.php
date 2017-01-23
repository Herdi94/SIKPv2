<!--start content -->
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <h2>Change Password</h2>
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


<!--
                <script type="text/javascript"></script>

                <script>
                    $(document).ready(function()
                    {
                        $("#old_password").change(function()
                        {
                            var berlaku = $("#old_password").val();
                            $("#old_password").html("<img src='loading.gif'>Cek password ...");

                            if(berlaku=='')
                            {
                                $("#msg_berlaku").html('<img src="unvalid.gif"><span class="teks">Password harus diisi</span>');
                                $("#old_password").css('background', '#FFEBE8');
                            }
                            else
                                $.ajax({type: "POST", url: "<?php site_url('dashboard/search_password') ?>", data: "old_password="+berlaku, success:function(data)
                                {
                                    if(data==0)
                                    {
                                        $("#msg_berlaku").html('<img src="unvalid.gif"><span class="teks">Password tidak cocok</span>');
                                        $("#old_password").css('background', '#FFEBE8');
                                    }
                                    else
                                    {
                                        $("#msg_berlaku").html('<img src="valid.gif">');
                                        $("#old_password").css('background', 'white');
                                    }

                                } });
                        })

                        $("#btnSave").click(function()
                        {
                            var berlaku = $("#old_password").val();
                            $("#old_password").html("<img src='loading.gif'>Cek password ...");

                            if(berlaku=='')
                            {
                                $("#msg_berlaku").html('<img src="unvalid.gif"><span class="teks">Password harus diisi</span>');
                                $("#old_password").css('background', '#FFEBE8');
                            }

                        })


                    });




                </script>
-->
                    <form method="post" id="formpass">
                        <label for="old_password">Old Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" id="old_password" class="form-control" placeholder="Enter your old password">
                                <span id="msg_berlaku"/>
                            </div>
                        </div>
                        <label for="new_password">New Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" id="new_password" class="form-control" placeholder="Enter your new password">
                                <span class="label"/>
                            </div>
                        </div>

                        <label for="retype_new_password">Retype New Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" id="retype_new_password" class="form-control" placeholder="Enter your retype new password">
                                <span class="label"/>
                            </div>
                            <div class="form-line"/>
                        </div>
                            </div>

                        <button type="button" id="btnSave" class="btn btn-primary">Save</button>
                        <button type="reset" id="btnReset" class="btn btn-danger">Cancel</button>

                        </form>


                </div>
                </div>
            </div>


        </body>
        </html>

    </div>
</section>
<!--end content -->
</html>