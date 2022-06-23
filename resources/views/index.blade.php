@extends('layouts.cork')
@section('side')
<ul class="list-unstyled menu-categories" id="accordionExample">
    <li class="menu active">
        <a href="{{url('/')}}" aria-expanded="true" class="dropdown-toggle">
            <div class="active">
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

    <li class="menu">
        <a href="{{url('laporan')}}" aria-expanded="false" class="dropdown-toggle">
            <div class="">
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
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing row">

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one bg-secondary">
                    <div class="widget-heading">
                        <h6 class="text-white">Agen</h6>
                    </div>
                    <div class="widget-content row col-md-12">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <h2 class="ml-3 text-white">{{$user}}</h2>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one bg-primary">
                    <div class="widget-heading">
                        <h6 class="text-white">Listing</h6>
                    </div>
                    <div class="widget-content row col-md-12">
                        <div class="w-icon">
                            <i data-feather="trending-up"></i>
                        </div>
                        <h2 class="ml-3 text-white">{{$listing}}</h2>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one bg-success">
                    <div class="widget-heading">
                        <h6 class="text-white">Listing Sold</h6>
                    </div>
                    <div class="widget-content row col-md-12">
                        <div class="w-icon">
                            <i data-feather="archive"></i>
                        </div>
                        <h2 class="ml-3 text-white">{{$terjual}}</h2>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one bg-warning">
                    <div class="widget-heading">
                        <h6 class="text-white">Primary</h6>
                    </div>
                    <div class="widget-content row col-md-12">
                        <div class="w-icon">
                            <i data-feather="trending-up"></i>
                        </div>
                        <h2 class="ml-3 text-white">{{$primary}}</h2>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one bg-dark">
                    <div class="widget-heading">
                        <h6 class="text-white">Calon Pembeli</h6>
                    </div>
                    <div class="widget-content row col-md-12">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <h2 class="ml-3 text-white">{{$calonpembeli}}</h2>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one bg-danger">
                    <div class="widget-heading">
                        <h6 class="text-white">Listing Pending</h6>
                    </div>
                    <div class="widget-content row col-md-12">
                        <div class="w-icon">
                            <i data-feather="clock"></i>
                        </div>
                        <h2 class="ml-3 text-white">{{$listingpending}}</h2>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div style="margin:20px;">
                        <div class="text-center">
                            <h4><b>Daftar Reminder Satu Minggu</b></4>
                        </div>
                    @if(count($reminder) == 0)
                    <br>
                    <h4 class="text-center">Tidak ada reminder dalam minggu ini.</h4>
                    @else
                        <table id="myTable" class="table table-striped" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th>Kode Agen</th>
                                    <th>Primary</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Total Komisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reminder as $d)
                                <tr>
                                    <td>{{$d->agens->nama}}</td>
                                    <td>{{$d->primarys->nama_project}}</td>
                                    <td>{{date('d-m-Y',strtotime($d->tanggal))}}</td>
                                    <td>
                                        @if($d->keterangan != null)
                                        {{$d->keterangan}}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td class="text-right">{{number_format($d->total_komisi)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>

@endsection