<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Styles Shoe Shop</title>
    <link rel="shortcut icon" href="<?php echo base_url('images/logo/favicon.ico'); ?>" type="image/png" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/uikit/css/uikit.min.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/uikit/js/uikit.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/uikit/js/components/slideshow.min.js'); ?>"></script>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin-top: 60px;
            clear: both;
            background: #FDFDFD;
        }

        #topNav {
            background-color: #36A187;
            border: none;
        }

        ul#navigation li a {
            color: #fff;
            -moz-transition: all 0.2s ease-in-out;
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        ul#navigation li a:hover {
            color: #fff;
        }

        #title {
            color: #fff;
        }

        #nav ul#navright li a {
            color: #000;
            -moz-transition: all 0.2s ease-in-out;
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        #nav ul#navright li a:hover {
            color: #fff;
        }

        ul li a {
            text-decoration: none;
            font-weight: bold;
            color: #36A187;
        }
        
        .btn{
            border-radius: none !important;
        }

        .best {
            position: absolute;
            color: #FFF;
            padding: 14px 16px 12px 16px;
            margin-bottom: 10px;
            background-color: #FE292F;
        }

        #brand {
            border: none;
            -moz-transition: all 0.2s ease-in-out;
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }

        #brand:hover {
            transform: scale(1.2);
        }

        #brand a img {
            border: none;
        }

        #blogo {
            display: none;
        }

        #list {
            background-color: #A5E12B;
            border: none;
        }

        #shoes {
            border: none;
        }

        #itemPic {
            transition: all 0.2s ease-in-out;
        }

        #itemPic:hover {
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
            -o-border-box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
        }

        #viewlink {
            display: none;
            font-weight: bold;
            font-size: 1.2em;
            text-decoration: none;
            background-color: #FE292F;
            color: #fff;
            line-height: 30px;
        }

        #itemPic:hover #image {
            transform: scale(1.1);
            transition: all 0.2s ease-in-out 0.2;
        }

        #itemPic:hover #blogo {
            display: block;
            transition: all 0.2s ease-in-out 0.2;
        }

        #itemPic:hover #logo {
            display: none;
            transition: all 0.2s ease-in-out 0.2;
        }

        #itemPic:hover .best {
            display: none;
            transition: all 0.2s ease-in-out 0.2;
        }

        #itemPic:hover #size {
            display: none;
            transition: all 0.2s ease-in-out 0.2;
        }

        #itemPic:hover #price {
            display: none;
            transition: all 0.2s ease-in-out 0.2;
        }

        #itemPic:hover #viewlink {
            display: block;
            transition: all 0.2s ease-in-out 0.2;
        }

    </style>
</head>

<body>

    <!-- Sign In Modal -->
    <div class="modal fade sign-in" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Sign In</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('sign_in'); ?>" method="post">
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="e.g. user.user@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="pword" class="form-control" id="pword" placeholder="Password" required>
                        </div>
                        <input type="submit" class="btn btn-warning" value="Sign In">
                    </form>
                </div>
                <div class="modal-footer">
                    <a type="submit" data-toggle="modal" data-target="#registerModal" data-dismiss="modal" style="cursor: pointer;" class="pull-left">Don't have an account? Sign up today!</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade register-user" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Register Now</h4>
                </div>
                <div class="modal-body">
                    <form action="register" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" name="fname" class="form-control" id="fname" placeholder="First name" required maxlength="40">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" required maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="e.g. user.user@gmail.com" required maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="userfile">Picture: <span class="text-success">(optional)</span></label>
                            <input type="file" id="userfile" name="userfile">
                            <span class="uploaded_image"></span>
                        </div>
                        <div class="form-group">
                            <label for="pass1">Password:</label>
                            <input type="password" name="pass1" class="form-control" id="pass1" placeholder="Password" required maxlength="15">
                        </div>
                        <div class="form-group">
                            <label for="pass2">Confirm Password:</label>
                            <input type="password" name="pass2" class="form-control" id="pass2" placeholder="Confirm Password" required maxlength="15">
                        </div>
                        <input type="submit" class="btn btn-warning" value="Register">
                    </form>
                </div>
            </div>
        </div>
    </div>
