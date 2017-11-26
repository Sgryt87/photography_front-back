<?php
include "../../db/global_config.php";
include '../db/admin_script.php';
ob_start();
session_start();

if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
    header('Location: ../login/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]> -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!--[endif]-->


</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../photos/index.php">CMS Admin</a>
            <a class="navbar-brand" href="../../index.php">Website</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Admin<b
                            class="caret"></b></a>
                <ul class="dropdown-menu">

                    <li>
                        <a href="../login/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="../dashboard/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#photos">
                        <i class="fa fa-file-image-o" aria-hidden="true"></i> Photos <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <ul id="photos" class="collapse">
                        <li>
                            <a href="../photos/index.php">All Photos</a>
                        </li>
                        <li>
                            <a href="../photos/add.php">Add Photos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#genres">
                        <i class="fa fa-list" aria-hidden="true"></i> Genres <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <ul id="genres" class="collapse">
                        <li>
                            <a href="../genres/index.php">All Genres</a>
                        </li>
                        <li>
                            <a href="../genres/add.php">Add Genre</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#settings">
                        <i class="fa fa-suitcase" aria-hidden="true"></i> Settings<i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <ul id="settings" class="collapse">
                        <li>
                            <a href="../settings/index.php">Login Info</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>