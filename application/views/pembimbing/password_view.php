<!--start content -->
<section class="content">
    <div class="container-fluid">


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



                <div class="info_contact">
                    <h4>Change password</h4>
                    <div class="content">
                        <form method="post" action="<?=site_url('pembimbing/');?>save_password" >
                            <table class="input"><tr><td>Old Password</td><tr>
                                <tr><td class="input-width"><input type="password" name="old" value="<?php echo set_value('old');?>" required oninvalid="this.setCustomValidity('Masukkan old password.')" oninput="setCustomValidity('')"></td></tr>
                                <tr><td>New Password</td><tr>
                                <tr><td class="input-width"><input type="password" name="new" value="<?php echo set_value('new');?>"  required oninvalid="this.setCustomValidity('Masukkan new password.')" oninput="setCustomValidity('')"></td></tr>
                                <tr><td>Re-type New Password</td><tr>
                                <tr><td class="input-width"><input type="password" name="re_new" value="<?php echo set_value('re_new'); ?>" required oninvalid="this.setCustomValidity('Masukkan re-type new password.')" oninput="setCustomValidity('')"></td></tr>
                                <tr><td>
                                        <button type='submit' class='btn1' value='' >Save</button>
                                    </td></tr>
                            </table>
                        </form>
                    </div>
                    <div class="error">
                        <?= validation_errors() ?>
                        <?php echo $this->session->flashdata('error') ?>
                    </div>
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