<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../">
    <meta charset="utf-8" />
    <title>SIPA - Sistem Pengajuan Tempat PKL</title>
    <meta name="description" content="Maksimalkan Pengalaman Anda Dengan Mengikuti Kegiatan Praktik Kerja Lapangan (PKL)">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="{{ url('assets') }}/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/css/demo1/skins/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/css/demo1/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/css/demo1/skins/brand/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/css/demo1/skins/aside/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ url('logo.png') }}" />
</head>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
       <div class="kt-header-mobile__logo">
          <a href="">
            <img alt="Logo" src="{{ url('assets') }}/media/logos/logo-light.png" />
          </a>
       </div>
       <div class="kt-header-mobile__toolbar">
          <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left"
             id="kt_aside_mobile_toggler"><span></span></button>
          <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
          <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
             class="flaticon-more"></i></button>
       </div>
    </div>
    <div class="kt-grid kt-grid--hor kt-grid--root">
       <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
          @include('admin.frame.sidebar')
          <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
             @include('admin.frame.navbar')
             <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                @include('admin.frame.sub_navbar')
                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">