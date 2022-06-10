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

    <li class="menu active">
        <a href="{{url('listing')}}" aria-expanded="true" class="dropdown-toggle">
            <div class="active">
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
            <li class="">
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
                    <div class="text-center">
                        <h4><b>Data Listing</b></4>
                        <br><br>
                        <div class="row justify-content-center">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:85%;">
                                <div class="carousel-inner" style="background-color:#0e1726;">
                                    @foreach($foto as $f => $fot)
                                    <div class="carousel-item {{$f == 0 ? 'active' : '' }}">
                                        <img class="" src="{{asset('images/listing/'.$fot->path)}}" height='350px'>
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div><br>
                    <div class="row center">
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-4 ">
                            <h3><b>{{$data->judul}}</b></h3>
                        </div>
                        <div class="col-xl col-lg-5 col-md-6 col-sm-8 text-right">
                            <h2><b>Rp. {{number_format($data->harga)}}</b></h2>
                        </div>
                    </div><br>
                    <div class="row center">
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-4 ">
                            <h5><b>Data Utama</b></h5><br>
                            <h6>Kode Listing : <b>{{$data->kode_listing}}</b></h6>
                            <h6>Agen : <b>{{$data->agens->nama}}</b></h6>
                            <h6>Luas Tanah : <b>{{$data->luas_tanah}} m<sup>2</sup></b></h6>
                            <h6>Luas Bangunan : <b>{{$data->luas_bangunan}} m<sup>2</sup></b></h6>
                            <h6>Dimensi Tanah Lebar : <b>{{$data->dimensi_tanah_lebar}} m</b></h6>
                            <h6>Dimensi Tanah Panjang : <b>{{$data->dimensi_tanah_panjang}} m</b></h6>
                            <h6>Jenis Surat : <b>{{$data->surats->jenis_surat}}</b></h6>
                            <h6>Tipe Properti : <b>{{$data->tipepropertis->jenis_properti}}</b></h6>
                            @if($data->tipe_apartemens_idtipe_apartemen != '')
                            <h6>Tipe Apartemen : <b>{{$data->tipeapartemens->tipe_apartemen}}</b></h6>
                            <h6>Tower : <b>{{$data->tower}}</b></h6>
                            <h6>Nomor Lantai : <b>{{$data->nomor_lantai}}</b></h6>
                            <h6>Nomor Unit : <b>{{$data->nomor_unit}}</b></h6>
                            <h6>View : <b>{{$data->view}}</b></h6>
                            @endif
                            <h6>Listrik : <b>{{$data->listrik}} watt</b></h6>
                            <h6>Hadap : <b>{{$data->hadap}}</b></h6>
                            <h6>Air : <b>{{$data->air}}</b></h6>
                            <h6>Jumlah Lantai : <b>{{$data->jumlah_lantai}}</b></h6>
                            <h6>Cluster : <b>{{$data->cluster}}</b></h6>
                            <h6>Posisi : <b>{{$data->posisi}}</b></h6>
                            <h6>Perabotan : <b>{{$data->perabotank}}</b></h6>
                            <h6>Kelurahan : <b>{{$data->kelurahans->nama}}</b></h6>
                        </div>
                        <div class="col-xl col-lg-5 col-md-6 col-sm-8">
                            <h5><b>Data Pemilik Properti</b></h5><br>
                            <h6>Surat Kepemilikan Atas Nama : <b>{{$data->surat_kepemilikan_atasnama}}</b></h6>
                            <h6>No HP Pemilik : <b>{{$data->nomor_hp_pemilik}}</b></h6>
                            <h6>Alamat Properti : <b>{{$data->alamat_properti}}</b></h6>
                            <h6>Pemegang Hak : <b>{{$data->pemegang_hak}}</b></h6>
                            <h6>Alamat Domisili : <b>{{$data->alamat_domisili}}</b></h6>
                        </div>
                    </div><br>
                    <div class="row center">
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-4 ">
                        <h5><b>Data Ruangan Properti</b></h5><br>
                            <h6>Kamar Tidur : <b>{{$data->kamar_tidur}}</b></h6>
                            <h6>Kamar Mandi : <b>{{$data->kamar_mandi}}</b></h6>
                            <h6>Kamar Tidur Pembantu : <b>{{$data->kamar_tidur_pembantu}}</b></h6>
                            <h6>Kamar Mandi Pembantu : <b>{{$data->kamar_mandi_pembantu}}</b></h6>
                            <h6>Dapur : <b>{{$data->dapur}}</b></h6>
                            <h6>Carport : <b>{{$data->carport}}</b></h6>
                            <h6>Garasi : <b>{{$data->garasi}}</b></h6>
                            @if($data->jenis_lantai_idjenis_lantai != '')
                            <h6>Jenis Lantai : <b>{{$data->lantais->nama}}</b></h6><br>
                            @endif
                        </div>
                        <div class="col-xl col-lg-5 col-md-6 col-sm-8">
                            <h5><b>Data Kantor</b></h5><br>
                            <h6>Jenis Listing : <b>{{$data->jenis_listing}}</b></h6>
                            <h6>Tipe Listing : <b>{{$data->tipe_listing}}</b></h6>
                            <h6>Komisi : <b>{{$data->komisi}} %</b></h6>
                            <h6>Mulai Tanggal : <b>{{$data->mulai_tanggal}}</b></h6>
                            <h6>Berakhir Tanggal : <b>{{$data->berakhir_tanggal}}</b></h6>
                            <h6>Pasang Banner : <b>{{$data->pasang_banner}}</b></h6>
                            <h6>Bentuk Harga : <b>{{$data->bentukhargas['bentuk_harga']}}</b></h6>
                            @if($data->status == 'available')
                            <h6>Status : <b class="text-success">{{$data->status}}</b></h6>
                            @else
                            <h6 class="">Status : <b>{{$data->status}}</b></h6>
                            @endif
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xl-12 col-lg-7 col-md-6 col-sm-4 ">
                            <h6>Catatan : </h6><h6><b>{!!$data->catatan!!}</b></h6>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 ">
                            <a href="{{url('listings/'.$data->idlisting.'/edit')}}"><button class="btn btn-warning">Ubah</button></a>
                            <button class="btn btn-danger" onclick="hapus('{{csrf_token()}}','{{$data->idlisting}}')">Hapus</button>
                            <button class="btn btn-dark" onclick="terjual('{{csrf_token()}}','{{$data->idlisting}}')">Sold</button>
                            <button class="btn btn-info" onclick="pending('{{csrf_token()}}','{{$data->idlisting}}')">Pending</button>
                            <button class="btn btn-success" onclick="available('{{csrf_token()}}','{{$data->idlisting}}')">Available</button>
                        </div>
                        <div class="col-xl col-lg-5 col-md-6 col-sm-8 align-self-center text-right">
                            <a href="{{url('listings')}}" class="btn btn-secondary-light"> Kembali</a>
                        </div>
                    </div>
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
<script>
    function hapus(token,id){
        swal({
        title: "Yakin Ingin Menghapus Data? ",
        text: "Data yang ada akan hilang sepenuhnya",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF5722",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Tidak!",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
    }).then(function (result) {
        if (result.value) {
            var url = '/hapuslisting';
            $.post(url, {

                _token: token,
                id:id,
                },
            function (data) {
                swal(
                'Berhasil!',
                'Data berhasil dihapus.',
                'success'
                ).then(function () {
                    location.reload();
                })
            });
        } else if(result.dismiss) {
            swal(
                'Hapus Data Dibatalkan!',
                '',
                'error'
            )
        }
    })
}
</script>
<script>
    function terjual(token,id){
        swal({
        title: "Apakah Properti Ini Sudah Terjual? ",
        text: "Data properti {{$data->kode_listing}} akan berganti status menjadi terjual",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF5722",
        confirmButtonText: "Ya!",
        cancelButtonText: "Tidak!",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
    }).then(function (result) {
        if (result.value) {
            var url = '/juallisting';
            $.post(url, {

                _token: token,
                id:id,
                },
            function (data) {
                swal(
                'Berhasil!',
                'Status listing berhasil diganti.',
                'success'
                ).then(function () {
                    location.reload();
                })
            });
        } else if(result.dismiss) {
            swal(
                'Perubahan status dibatalkan!',
                '',
                'error'
            )
        }
    })
}
</script>
<script>
    function pending(token,id){
        swal({
        title: "Apakah anda ingin mengganti status ini menjadi 'pending'? ",
        text: "Data properti {{$data->kode_listing}} akan berganti status menjadi pending",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF5722",
        confirmButtonText: "Ya!",
        cancelButtonText: "Tidak!",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
    }).then(function (result) {
        if (result.value) {
            var url = '/pendinglisting';
            $.post(url, {

                _token: token,
                id:id,
                },
            function (data) {
                swal(
                'Berhasil!',
                'Status listing berhasil diganti.',
                'success'
                ).then(function () {
                    location.reload();
                })
            });
        } else if(result.dismiss) {
            swal(
                'Perubahan status dibatalkan!',
                '',
                'error'
            )
        }
    })
}
</script>
<script>
    function available(token,id){
        swal({
        title: "Apakah anda ingin mengganti status ini menjadi available? ",
        text: "Data properti {{$data->kode_listing}} akan berganti status menjadi available",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF5722",
        confirmButtonText: "Ya!",
        cancelButtonText: "Tidak!",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
    }).then(function (result) {
        if (result.value) {
            var url = '/availablelisting';
            $.post(url, {

                _token: token,
                id:id,
                },
            function (data) {
                swal(
                'Berhasil!',
                'Status listing berhasil diganti.',
                'success'
                ).then(function () {
                    location.reload();
                })
            });
        } else if(result.dismiss) {
            swal(
                'Perubahan status dibatalkan!',
                '',
                'error'
            )
        }
    })
}
</script>
@endsection