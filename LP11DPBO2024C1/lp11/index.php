<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");


$tp = new TampilPasien();
// $data = $tp->tampil();

if(isset($_POST['add']))
{
    $tp->processAdd($_POST);
}
else if(isset($_POST['update']))
{
    $tp->processUpdate($_POST);
}
else if(isset($_GET['add'])){
    $tp->addForm();
}
else if(isset($_GET['edit'])){
    $tp->updateForm($_GET['edit']);
}
else if(isset($_GET['delete'])){
    $tp->processDelete($_GET['delete']);
}
else{
    $tp->tampil();
}