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
        <a href="#submenu" data-toggle="collapse" aria-expanded="" class="dropdown-toggle">
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
            <li class="">
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
            <li>
                <a href="{{url('primary')}}"> List </a>
            </li>
            <li class="active">
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
                <form method="post" action="{{url('reminders/'.$data->idreminder)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="agen">Agen</label> <span style="color:red"><b>*</b></span>
                        <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Kode - Nama Agen" name="agen" required>
                            <option value="">-- Pilih Agen --</option>
                            @foreach($agen as $ag)
                                @if($ag->nama != 'admin')
                                    @if($ag->idagen == $data->agens_idagen)
                                        <option value="{{$ag->idagen}}" selected>{{$ag->kode}} - {{$ag->nama}}</option>
                                    @else
                                        <option value="{{$ag->idagen}}">{{$ag->kode}} - {{$ag->nama}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="primary">Primary</label> <span style="color:red"><b>*</b></span>
                        <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="" name="primary" required>
                            <option value="">-- Pilih Primary --</option>
                            @foreach($primary as $pr)
                                @if($data->primarys_idprimary == $pr->idprimary)
                                <option value="{{$pr->idprimary}}" selected>{{$pr->nama_project}} - {{$pr->developer}}</option>
                                @else
                                <option value="{{$pr->idprimary}}">{{$pr->nama_project}} - {{$pr->developer}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label> <span style="color:red"><b>*</b></span>
                        <input class="form-control flatpickr flatpickr-input active" value="{{$data->tanggal}}" type="date" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="komisi">Total Komisi</label> <span style="color:red"><b>*</b></span>
                        <input id="komisi" type="text" name="komisi" placeholder="(angka)" class="form-control" value="{{$data->total_komisi}}" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan">{{$data->keterangan}}</textarea>
                    </div>
                    <a href="{{url('reminders')}}" class="btn btn-secondary-light"> Kembali</a>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script>
    CKEDITOR.replace( 'keterangan' );
</script>
@endsection