@extends('partial.header')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
    
    <!-- Custom Css-->
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />

       <!-- ========== Left Sidebar Start ========== -->
       <div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Meznu</li>
                        <li>
                            <a href="/filliere;" class="has-arrow waves-effect">
                                <i class="bx bx-layout"></i>
                                <span key="t-layouts">Les Notes</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li>
                                 
                                        <li><a target="_blank" href="layouts-compact-sidebar.html" key="t-compact-sidebar">Détail des épreuves</a></li>
                                        <li><a target="_blank" href="layouts-icon-sidebar.html" key="t-icon-sidebar">Détail de discipline</a></li>
                                        <li><a target="_blank" href="layouts-boxed.html" key="t-boxed-width">Détail activités parascolaires</a></li>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-envelope"></i>
                                <span key="t-email">Email</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="email-inbox.html" key="t-inbox">Boîte de réception</a></li>
          
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-receipt"></i>
                                <span key="t-invoices">Factures</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="invoices-list.html" key="t-invoice-list">Liste des Factures</a></li>
                                <li><a href="invoices-detail.html" key="t-invoice-detail">Détail des Factures</a></li>
                            </ul>
                        </li>  
                        <li>
                            <a href="calendar.html" class="waves-effect">
                                <i class="bx bx-calendar"></i>
                                <span key="t-chat">Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html" class="waves-effect">
                                <i class="bx bx-chat"></i>
                                <span key="t-chat">Chat</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="bx bx-task"></i>
                                <span key="t-blog">À noter</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="blog-list.html" key="t-blog-list">Les Tâches</a></li>
                                <li><a href="blog-grid.html" key="t-blog-grid">Les Déplacements</a></li>
                                <li><a href="blog-details.html" key="t-blog-details">Les Événements</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="bx bx-user-circle"></i>
                                <span key="t-authentication">Authentification</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                            <li><a target="_blank" href="auth-login.html" key="t-login">SE DÉCONNECTER</a></li></ul>
                        </li>                    
        </ul>
    </div>
                        <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>

    <!-- App js -->
    
    <script src="assets/js/app.js"></script>
    