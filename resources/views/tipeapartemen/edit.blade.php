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

    <li class="menu active">
        <a href="#submenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
            <div class="">
                <i data-feather="file"></i>
                <span> Jenis</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu recent-submenu list-unstyled show" id="submenu" data-parent="#accordionExample">
            <li class="">
                <a href="{{url('tipeproperti')}}"> Tipe Properti </a>
            </li>
            <li class="active">
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
                <form method="post" action="{{url('tipepropertis/'.$data->idtipe_properti)}}">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <div class="">
                            <div class="form-group">
                                <label for="jenisproperti">Jenis Surat</label>
                                <input id="jenisproperti" type="text" name="jenisproperti" value="{{$data->jenis_properti}}" class="form-control" required>
                            </div>
                        </div>                                        
                    </div>
                    <a href="{{url('tipepropertis')}}" class="btn btn-secondary-light"> Kembali</a>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
