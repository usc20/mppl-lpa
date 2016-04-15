<?php

    error_reporting(E_ALL & ~E_WARNING);

    if($_SESSION['username']){
        //echo $_SESSION['username'];
//        $id_guru = $_SESSION['userid'];
        //echo $_SESSION['name'];
    }
    else{
        header("Location:../dashboard");
        //redirect("../trunk");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="FaberNainggolan">
    <title>Little Prince Azkaa</title>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">

  </head>

  <body>
    <!-- Static navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">LPA - Guru</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url(); ?>kelas"><i class="glyphicon glyphicon-th"></i> Daftar Kelas</a></li>
            <li><a href="<?php echo base_url(); ?>murid"><i class="glyphicon glyphicon-list"></i> Daftar Murid</a></li>
            <li><a href="<?php echo base_url(); ?>kelas\profil"><i class="glyphicon glyphicon-user"></i> Profil</a></li>
            <li><a href="<?php echo base_url(); ?>dashboard\logout"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>