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
        <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
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
            <li>
                <a href="{{url('tipeproperti')}}"> Tipe Properti </a>
            </li>
            <li>
                <a href="{{url('surat')}}"> Surat </a>
            </li>
            <li>
                <a href="{{url('bentukharga')}}"> Bentuk Harga </a>
            </li>
            <li class="active">
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
                <div class="" style="margin-bottom:20px;">
                    <button class="btn btn-primary mb-2">Tambah Baru</button>
                </div>
                    <table id="myTable" class="table table-striped" style="width:100%; ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Jenis Lantai</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->idjenis_lantai}}</td>
                                <td>{{$d->nama}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                            <a class="dropdown-item action-edit" href="apps_invoice-edit.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Edit</a>
                                            <a class="dropdown-item action-delete" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection