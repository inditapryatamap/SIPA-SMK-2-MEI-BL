@include('admin.frame.header')
@include('flash')
<div class="kt-portlet">
    <div class="kt-portlet__body  kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="kt-widget24">
                    <div class="kt-asd">
                        <h5>{{ $data['pengumuman']->created_at->format('d F Y') }}</h6>
                        <p>
                            {!! $data['pengumuman']->pengumuman !!}
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.frame.footer')