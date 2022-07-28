<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../">
    <meta charset="utf-8" />
    <title>SIPA - Sistem Pengajuan Tempat PKL</title>
    <meta name="description" content="Maksimalkan Pengalaman Anda Dengan Mengikuti Kegiatan Praktik Kerja Lapangan (PKL)">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link href="{{ url('assets') }}/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
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
<body>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Data Perusahaan
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Perusahaan</th>
                                <th>Pembimbing Lapang</th>
                                <th>Profile Perusahaan</th>
                                <th>Alamat</th>
                                <th>Nomor Telepon</th>
                                <th>Deskripsi Pekerjaan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($data['perusahaan']); $i++)
                                <tr class="text-center">
                                    <td>{{ (int)$i + 1 }}</td>
                                    <td>{{ $data['perusahaan'][$i]->nama_perusahaan }}</td>
                                    <td>{{ $data['perusahaan'][$i]->nama_pembimbing }}</td>
                                    <td>{{ $data['perusahaan'][$i]->profile_perusahaan }}</td>
                                    <td>{{ $data['perusahaan'][$i]->alamat_perusahaan }}</td>
                                    <td>{{ $data['perusahaan'][$i]->no_telp }}</td>
                                    <td>{{ $data['perusahaan'][$i]->deskripsi_pekerjaan }}</td>
                                    <td><span class="badge badge-success">{{ $data['perusahaan'][$i]->status }}</span></td>
                                </tr> 
                            @endfor
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Perusahaan</th>
                                <th>Pembimbing Lapang</th>
                                <th>Profile Perusahaan</th>
                                <th>Alamat</th>
                                <th>Nomor Telepon</th>
                                <th>Deskripsi Pekerjaan</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@include('admin.frame.footer')
<script src="{{ url('assets') }}/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

<script>
    var btn_export = {!! json_encode($data['button_export']) !!};
  $( document ).ready(function() {
    var KTDatatablesExtensionButtons = function() {

var initTable1 = function() {
    if (btn_export) {
        var table = $('#kt_table_1').DataTable({
            responsive: true,
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
            <'row'<'col-sm-12'tr>>
            <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                'print',
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
            ],
        });
    } else {
        var table = $('#kt_table_1').DataTable({
            responsive: true,
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
            <'row'<'col-sm-12'tr>>
            <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                
            ],
        });
    }
}
    
return {

    //main function to initiate the module
    init: function() {
        initTable1();
    },

};

}();

jQuery(document).ready(function() {
KTDatatablesExtensionButtons.init();
});
  });
</script>