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

    <li class="menu active">
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
                        <h4><b>Data Agen</b></4>
                    </div><br>
                    <div class="row center">
                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 ">
                            <h3><b>{{$data->nama}}</b></h3><br>
                            <h6>Kode Agen : <b>{{$data->kode}}</b></h6>
                            <h6>Jabatan : <b>{{$data->jabatan}}</b></h6>
                            <h6>Tanggal Lahir : <b>{{date('d-m-Y',strtotime($data->tanggallahir))}}</b></h6>
                            <h6>Agama : <b>{{$data->agama}}</b></h6>
                            <h6>Email : <b>{{$data->email}}</b></h6>
                            <h6>No Telp : <b>{{$data->hp}}</b></h6>
                            <h6>Alamat : <b>{{$data->alamat}}</b></h6>
                            <h6>Jenis Kelamin : <b>{{$data->jenis_kelamin}}</b></h6><br>
                        </div>
                        <div class="col-xl col-lg-5 col-md-6 col-sm-8 align-self-center text-center">
                            <img style="border-radius: 15px;" src="{{asset('images/agen/'.$data->foto)}}" height='250px'/>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 ">
                            <a href="{{url('agens/'.$data->idagen.'/edit')}}"><button class="btn btn-warning">Ubah</button></a>
                            <button class="btn btn-danger" onclick="hapus('{{csrf_token()}}','{{$data->idagen}}')">Hapus</button>
                            <button class="btn btn-dark" onclick="resetpassword('{{csrf_token()}}','{{$data->idagen}}')">Reset Password</button>
                        </div>
                        <div class="col-xl col-lg-5 col-md-6 col-sm-8 align-self-center text-right">
                            <a href="{{url('agens')}}" class="btn btn-secondary-light"> Kembali</a>
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
        text: "Jika dihapus data akan Sepenuhnya Hilang",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#4361ee",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Tidak!",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
    }).then(function () {
        var act = '/hapusprimary';
        $.post(act, {

            _token: token,
            id:id,
            },
        function (data) {
            swal(
            'Terhapus!',
            'Data berhasil dihapus.',
            'success'
            ).then(function () {
                location.reload();
            })
        });

    }, function (dismiss) {
        if (dismiss === 'cancel') {
            swal(
                'Batal',
                'Langkah menghapus terhenti dan dibatalkan :)',
                'error'
                )
        }
    })
}
</script>
<script>
    function resetpassword(token,id){
        swal({
        title: "Anda Yakin Ingin Mereset Password? ",
        text: "Jika reset password dilakukan maka akan kembali ke password default",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF5722",
        confirmButtonText: "Reset Password!",
        cancelButtonText: "Tidak!",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
    }).then(function (result) {
        if (result.value) {
            var url = '/resetpassword';
            $.post(url, {

                _token: token,
                id:id,
                },
            function (data) {
                swal(
                'Berhasil!',
                'Password berhasil di reset.',
                'success'
                ).then(function () {
                    location.reload();
                })
            });
        } else if(result.dismiss) {
            swal(
                'Batal melakukan reset password!',
                '',
                'error'
            )
        }
    })
}
</script>
@endsection