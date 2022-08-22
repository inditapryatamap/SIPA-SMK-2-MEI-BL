@include('admin.frame.header')

<div class="row">
    <div class="col-lg-12">
        @include('flash')
    </div>
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head kt-portlet__head--noborder">
                <div class="kt-portlet__head-label">
                    <h1 class="kt-portlet__head-title">
                        Perbarui Perusahaan
                    </h1>
                </div>
            </div>
            <div class="kt-portlet__body pt-0">
                <div class="kt-widget kt-widget--user-profile-2">
                    <div class="kt-widget__body">
                        <form method="POST" action="{{ route('admin.perusahaan.go_update_perusahaan', ['id_perusahaan' => $data['perusahaan']->id]) }}" class="kt-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="label-input">Pembimbing Lapangan</label>
                                    <select name="id_pembimbing_lapang" class="form-control">
                                        @for ($i = 0; $i < count($data['pemimbing_lapang']); $i++)
                                            @if ($data['perusahaan']->id_pembimbing_lapang === $data['pemimbing_lapang'][$i]->id)
                                                
                                            <option selected value="{{ $data['pemimbing_lapang'][$i]->id }}">{{ $data['pemimbing_lapang'][$i]->nama }}</option>
                                            @else
                                            <option value="{{ $data['pemimbing_lapang'][$i]->id }}">{{ $data['pemimbing_lapang'][$i]->nama }}</option>
                                                
                                            @endif
                                        @endfor
                                    </select>
                                </div>
                                
                                <div class="col-md-12 mb-4">
                                    <label class="label-input">Nama Perusahaan</label>
                                    <input name="nama_perusahaan" value="{{ $data['perusahaan']->nama_perusahaan }}" class="form-control" />
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="label-input">Profile Perusahaan</label>
                                    <textarea name="profile_perusahaan" class="form-control" >{{ $data['perusahaan']->profile_perusahaan }}</textarea>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="label-input">Alamat Perusahaan</label>
                                    <textarea name="alamat_perusahaan" class="form-control" >{{ $data['perusahaan']->alamat_perusahaan }}</textarea>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="label-input">No Telepon</label>
                                    <input name="no_telp" value="{{ $data['perusahaan']->no_telp }}" class="form-control" />
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="label-input">Deskripsi Pekerjaan</label>
                                    <textarea name="deskripsi_pekerjaan" class="form-control" >{{ $data['perusahaan']->deskripsi_pekerjaan }}</textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-primary">Perbarui Perusahaan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.frame.footer')