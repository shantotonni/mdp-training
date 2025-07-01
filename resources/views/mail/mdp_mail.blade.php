<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>AMS E-Statement</title>
    <meta content="E-Statement Mail" name="description">
    <meta content="AMS" name="author">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
</head>
<body><!-- Begin page -->
<div id="wrapper"><!-- Top Bar Start -->
    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f6f6f6" style="font-family: Arial, sans-serif; margin: 0; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="max-width: 600px; width: 100%; background: #fff; border: 3px solid #3c4ccf; border-radius: 7px; padding: 30px;">
                    <tr>
                        <td style="font-size: 14px; color: #333;">
                            <p>Hello,</p>
                            <p>One of your associates, {{ $name }}, {{ $Designation }} has submitted MDP for your kind perusal.</p>
                            <p>Please click below for Review & approval :</p>
                            <p><a href="https://hrconnect.acigroup.info/mdp-list" target="_blank" style="color: #3c4ccf;">MDP List</a></p>
                            <p>Please kindly take immediate action.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/js/waves.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>