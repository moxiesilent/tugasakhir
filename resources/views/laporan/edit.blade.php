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

    <li class="menu">
        <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <i data-feather="shield"></i>
                <span> Primary</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="submenu2" data-parent="#accordionExample">
            <li>
                <a href="{{url('primary')}}"> List </a>
            </li>
            <li class="">
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

    <li class="menu active">
        <a href="{{url('laporan')}}" aria-expanded="true" class="dropdown-toggle">
            <div class="active">
                <i data-feather="archive"></i>
                <span> Laporan Listing</span>
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
                <form method="post" action="{{url('laporans/'.$data->idlaporan)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="listing">Listing</label>
                        <input id="listing" type="text" name="listing" placeholder="(angka)" value="{{$data->listings != null ? $data->listings['kode_listing'] : 'Data listing bukan dari kantor XMTG'}}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="agenPemilik">Agen Pemilik</label>
                        <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Kode - Nama Agen" name="agenPemilik">
                            <option value="">-- Pilih Agen --</option>
                            @foreach($agen as $ag)
                                @if($ag->jabatan != 'admin')
                                    @if($ag->idagen == $data->agens_pemilik)
                                        <option value="{{$ag->idagen}}" selected>{{$ag->kode}} - {{$ag->nama}}</option>
                                    @else
                                        <option value="{{$ag->idagen}}">{{$ag->kode}} - {{$ag->nama}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="agenPenjual">Agen Penjual</label>
                        <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Kode - Nama Agen" name="agenPenjual">
                            <option value="">-- Pilih Agen --</option>
                            @foreach($agen as $ag)
                                @if($ag->jabatan != 'admin')
                                    @if($ag->idagen == $data->agens_penjual)
                                        <option value="{{$ag->idagen}}" selected>{{$ag->kode}} - {{$ag->nama}}</option>
                                    @else
                                        <option value="{{$ag->idagen}}">{{$ag->kode}} - {{$ag->nama}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hargaJual">Harga Jual</label> <span style="color:red"><b>*</b></span>
                        <input id="hargaJual" type="text" name="hargaJual" placeholder="(angka)" value="{{$data->harga_jual}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Deal</label> <span style="color:red"><b>*</b></span>
                        <input class="form-control flatpickr flatpickr-input active" type="date" value="{{$data->tanggal_deal}}" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="komisiPemilik">Total Komisi Pemilik</label>
                        <input id="komisiPemilik" type="text" name="komisiPemilik" value="{{$data->komisi_agen_pemilik}}" placeholder="(angka)" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="komisiPenjual">Total Komisi Penjual</label>
                        <input id="komisiPenjual" type="text" name="komisiPenjual" value="{{$data->komisi_agen_penjual}}" placeholder="(angka)" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="namaPembeli">Nama Pembeli</label>
                        <input id="namaPembeli" type="text" name="namaPembeli" value="{{$data->nama_pembeli}}" placeholder="nama pembeli" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="namaNotaris">Nama Notaris</label>
                        <input id="namaNotaris" type="text" name="namaNotaris" value="{{$data->nama_notaris}}" placeholder="nama notaris" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="dp">DP</label>
                        <input id="dp" type="text" name="dp" placeholder="(angka)" value="{{$data->dp}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan">{{$data->keterangan}}</textarea>
                    </div>
                    <a href="{{url('laporans')}}" class="btn btn-secondary-light"> Kembali</a>
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