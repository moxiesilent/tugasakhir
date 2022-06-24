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
                <div class="" style="margin-bottom:20px;">
                    <div class="text-center">
                        <h4><b>Detail Laporan Penjualan Listing</b></4>
                    </div>
                    <br>
                    <h6>Kode Listing : {{$data->listings != null ? $data->listings['kode_listing'] : '-'}}</h6>
                    <h6>Agen Pemilik Listing : {{$data->agens_pemilik != null ? $data->agens_pemilik['nama'] : '-'}}</h6>
                    <h6>Agen Penjual Listing : {{$data->agens_penjual != null ? $data->agens_penjual['nama'] : '-'}}</h6>
                    <h6>Harga Tejual : Rp. {{number_format($data->harga_terjual)}}</h6>
                    <h6>Tanggal Kesepakatan : {{$data->tanggal_deal}}</h6>
                    <h6>Komisi Agen Pemilik Listing : {{$data->komisi_agen_pemilik != null ? $data->komisi_agen_pemilik : '-'}}</h6>
                    <h6>Komisi Agen Penjual Listing : {{$data->komisi_agen_penjual != null ? $data->komisi_agen_penjual : '-'}}</h6>
                    <h6>Nama Pembeli : {{$data->nama_pembeli}}</h6>
                    <h6>Nama Notaris : {{$data->nama_notaris}}</h6>
                    <h6>Jumlah Uang Muka : Rp. {{number_format($data->dp)}}</h6>
                    <h6>Keterangan : </h6>
                    <?php echo $data->keterangan?>
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
            var url = '/hapuslantai';
            $.post(url, {

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