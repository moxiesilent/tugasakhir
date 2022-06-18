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
                <div style="margin-bottom:20px;">
                    <div class="text-center">
                        <h4><b>Data Primary</b></4>
                        <br><br>
                        <div class="row justify-content-center">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:85%;">
                                <div class="carousel-inner" style="background-color:#0e1726;">
                                    @foreach($foto as $f => $fot)
                                    <div class="carousel-item {{$f == 0 ? 'active' : '' }}">
                                        <img class="" src="{{asset('images/primary/'.$fot->path)}}" height='350px'>
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
                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 ">
                            <h3><b>{{$data->nama_project}}</b></h3><br>
                            <h6>Developer : <b>{{$data->developer}}</b></h6>
                            <h6>BLT : <b>Rp. {{number_format($data->blt)}}</b></h6>
                            <h6>Komisi : <b>{{$data->komisi}} %</b></h6>
                            <h6>Website : <b>{{$data->website != '' ? $data->website : '-'}} </b></h6>
                            <h6>Keterangan : </h6>
                            <?php echo $data->keterangan ?>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 ">
                            <a href="{{url('primarys/'.$data->idprimary.'/edit')}}"><button class="btn btn-warning">Ubah</button></a>
                            <button class="btn btn-danger" onclick="hapus('{{csrf_token()}}','{{$data->idprimary}}')">Hapus</button>
                            @if($data->website != "")
                            <a href="{{$data->website}}" target="blank"><button class="btn btn-dark">Website</button></a>
                            @endif
                        </div>
                        <div class="col-xl col-lg-5 col-md-6 col-sm-8 align-self-center text-right">
                            <a href="{{url('primarys')}}" class="btn btn-secondary-light"> Kembali</a>
                        </div>
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
            var act = '/hapusprimary';
            $.post(act, {

                _token: token,
                id:id,
                },
            function (data) {
                if(data.message != 'error'){
                    swal(
                    'Berhasil!',
                    'Data berhasil dihapus.',
                    'success'
                    ).then(function () {
                        location.reload();
                    })
                }else{
                    swal(
                    'Error!!',
                    'Data tidak bisa dihapus. Data masih terpakai di tempat lain.',
                    'error'
                    )
                }
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
@endsection