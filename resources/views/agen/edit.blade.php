@extends('layouts.cork')
@section('side')
<ul class="list-unstyled menu-categories" id="accordionExample">
    <li class="menu">
        <a href="{{url('/')}}" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <i data-feather="home"></i>
                <span> Dashboard</span>
            </div>
        </a>
    </li>

    <li class="menu">
        <a href="{{url('agen')}}" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <i data-feather="user"></i>
                <span> Agen</span>
            </div>
        </a>
    </li>

    <li class="menu">
        <a href="{{url('listing')}}" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <i data-feather="box"></i>
                <span> Listing</span>
            </div>
        </a>
    </li>

    <li class="menu">
        <a href="#submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <i data-feather="file"></i>
                <span> Jenis</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu recent-submenu list-unstyled" id="submenu" data-parent="#accordionExample">
            <li>
                <a href="{{url('tipeproperti')}}"> Tipe Properti </a>
            </li>
            <li class="">
                <a href="{{url('tipeapartemen')}}"> Tipe Apartemen </a>
            </li>
            <li>
                <a href="{{url('surat')}}"> Surat </a>
            </li>
            <li>
                <a href="{{url('bentukharga')}}"> Bentuk Harga </a>
            </li>
            <li>
                <a href="{{url('lantai')}}"> Lantai </a>
            </li>                           
        </ul>
    </li>

    <li class="menu active">
        <a href="#submenu2" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
            <div class="">
                <i data-feather="shield"></i>
                <span> Primary</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled show" id="submenu2" data-parent="#accordionExample">
            <li class="active">
                <a href="{{url('primary')}}"> List </a>
            </li>
            <li>
                <a href="{{url('reminder')}}"> Reminder </a>
            </li>
        </ul>
    </li>

    <li class="menu">
        <a href="{{url('calonpembeli')}}" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <i data-feather="users"></i>
                <span> Calon Pembeli</span>
            </div>
        </a>
    </li>
    
</ul>
@endsection
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div style="margin:20px;">
                <form enctype="multipart/form-data" method="post" action="{{url('agens/'.$data->idagen)}}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input id="nama" type="text" name="nama" value="{{$data->nama}}" class="form-control" required>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="kode">Kode Agen</label>
                                <input id="kode" type="text" name="kode" value="{{$data->kode}}" class="form-control" required>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" name="email" value="{{$data->email}}" class="form-control" required>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input id="jabatan" type="text" name="jabatan" value="{{$data->jabatan}}" class="form-control" required>
                            </div>
                        </div>                                        
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label>Agama</label><br>
                            <select class="selectpicker" data-width="75%" name="agama">
                                @if($data->agama == 'konghucu')
                                <option value="kristen" >Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="islam">Islam</option>
                                <option value="buddha">Buddha</option>
                                <option value="hindu">Hindu</option>
                                <option value="konghucu" selected>Konghucu</option>
                                @elseif($data->agama == 'katolik')
                                <option value="kristen" >Kristen</option>
                                <option value="katolik" selected>Katolik</option>
                                <option value="islam">Islam</option>
                                <option value="buddha">Buddha</option>
                                <option value="hindu">Hindu</option>
                                <option value="konghucu">Konghucu</option>
                                @elseif($data->agama == 'islam')
                                <option value="kristen" >Kristen</option>
                                <option value="katolik" >Katolik</option>
                                <option value="islam" selected>Islam</option>
                                <option value="buddha">Buddha</option>
                                <option value="hindu">Hindu</option>
                                <option value="konghucu">Konghucu</option>
                                @elseif($data->agama == 'buddha')
                                <option value="kristen" >Kristen</option>
                                <option value="katolik" >Katolik</option>
                                <option value="islam">Islam</option>
                                <option value="buddha" selected>Buddha</option>
                                <option value="hindu">Hindu</option>
                                <option value="konghucu">Konghucu</option>
                                @elseif($data->agama == 'hindu')
                                <option value="kristen" >Kristen</option>
                                <option value="katolik" >Katolik</option>
                                <option value="islam" >Islam</option>
                                <option value="buddha">Buddha</option>
                                <option value="hindu" selected>Hindu</option>
                                <option value="konghucu">Konghucu</option>
                                @else
                                <option value="kristen" selected>Kristen</option>
                                <option value="katolik" >Katolik</option>
                                <option value="islam" >Islam</option>
                                <option value="buddha">Buddha</option>
                                <option value="hindu" >Hindu</option>
                                <option value="konghucu" >Konghucu</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label><br>
                            @if($data->jenis_kelamin == 'laki-laki')
                            <div class="n-chk">
                                <label class="new-control new-radio radio-primary">
                                    <input type="radio" class="new-control-input" name="jeniskelamin" value="laki-laki" checked>
                                    <span class="new-control-indicator"></span>Laki-laki
                                </label>
                            </div>
                            <div class="n-chk">
                                <label class="new-control new-radio radio-primary">
                                    <input type="radio" class="new-control-input" name="jeniskelamin" value="perempuan">
                                    <span class="new-control-indicator"></span>perempuan
                                </label>
                            </div>
                            @elseif($data->jenis_kelamin == 'perempuan')
                            <div class="n-chk">
                                <label class="new-control new-radio radio-primary">
                                    <input type="radio" class="new-control-input" name="jeniskelamin" value="laki-laki" >
                                    <span class="new-control-indicator"></span>Laki-laki
                                </label>
                            </div>
                            <div class="n-chk">
                                <label class="new-control new-radio radio-primary">
                                    <input type="radio" class="new-control-input" name="jeniskelamin" value="perempuan" checked>
                                    <span class="new-control-indicator"></span>perempuan
                                </label>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="tanggallahir">Tanggal Lahir</label>
                                <input class="form-control flatpickr flatpickr-input active" value="{{$data->tanggallahir}}" type="date" id="tanggallahir" name="tanggallahir">
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="hp">No HP</label>
                                <input id="hp" type="text" name="hp" value="{{$data->hp}}" class="form-control" required>
                            </div>
                        </div>                                   
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input id="alamat" type="text" name="alamat" value="{{$data->alamat}}" class="form-control">
                            </div>
                        </div>                                        
                    </div>
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>Upload Foto (tidak perlu diisi apabila tidak ingin mengganti)<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" class="custom-file-container__custom-file__custom-file-input" name="foto">
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                </div>
                <a href="{{url('agens')}}" class="btn btn-secondary-light"> Kembali</a>
                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
<script>
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
@endsection
