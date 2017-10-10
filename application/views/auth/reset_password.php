<html>
    <head>
        <meta charset="UTF-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/square/blue.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <title>Recover Password</title>
    </head>
    <body class="login-page" style="background:#001930 ">
        <div class="login-box">
            <div class="row">
                <div class="login-logo">
                    <img src="<?php echo base_url('files/logo.png') ?>" alt="User Image" width="400" height="100"/> <br>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Change Your Password</h2>
                            <div class="panel-body">
                                <div id="infoMessage"><?php echo $message; ?></div>
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="<?php echo site_url('auth/reset_password?q='. $code) ?>">
                                    <div class="form-group">
                                        <div class="form-group has-feedback">

                                            <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length); ?></label> <br />
                                            <?php echo form_input($new_password); ?>

                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>

                                        <div class="form-group has-feedback">
                                            <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm'); ?> <br />
                                            <?php echo form_input($new_password_confirm); ?>
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>

                                        <div class="form-group has-feedback">
                                            <?php echo form_input($user_id); ?>
                                        </div>

                                        <div class="form-group has-feedback">
                                            <?php echo form_hidden($csrf); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="change_password_submit_btn" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>




