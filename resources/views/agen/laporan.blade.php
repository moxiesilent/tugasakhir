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
        <a href="{{url('agen')}}" aria-expanded="true" class="dropdown-toggle">
            <div class="active">
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
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div style="margin:20px;">
                    <div class="" style="margin-bottom:20px;">
                        <div>
                            <h5>Total Komisi Penjualan Listing : Rp. {{number_format($komisiListing)}}</h5>
                            <div calss="row">
                                <h5>Total Komisi Penjualan Primary : Rp. {{number_format($komisiPrimary)}}</h5>
                                <div class="col-xl col-lg-5 col-md-6 col-sm-8 align-self-center text-right">
                                    <a href="{{url('agens/'.$agen->idagen)}}" class="btn btn-secondary-light"> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="widget-content widget-content-area br-6">
                <div style="margin:20px;">
                <div class="" style="margin-bottom:20px;">
                    <div class="text-center">
                        <h5><b>Detail Laporan Penjualan Listing</b></h5>
                    </div>
                </div>
                @if(count($laporanListing) != 0)
                    <table id="myTable" class="table table-striped" style="width:100%; ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Kode Listing</th>
                                <th>Agen Pemilik</th>
                                <th>Agen Penjual</th>
                                <th>Harga Jual</th>
                                <th>Tanggal</th>
                                <th>Total Komisi Pemilik</th>
                                <th>Total Komisi Penjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporanListing as $d)
                            <tr>
                                <td>{{$d->idlaporan}}</td>
                                <td>
                                    @if($d->listings != null)
                                        {{$d->listings['kode_listing']}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($d->agensPemilik != null)
                                        @if($d->agensPemilik['nama'] == $agen->nama)
                                            <b>{{$d->agensPemilik['nama']}}</b>
                                        @else
                                            {{$d->agensPemilik['nama']}}
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($d->agensPenjual != null)
                                        @if($d->agensPenjual['nama'] == $agen->nama)
                                            <b>{{$d->agensPenjual['nama']}}</b>
                                        @else
                                            {{$d->agensPenjual['nama']}}
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-right">{{number_format($d->harga_jual)}}</td>
                                <td>{{date('d-m-Y',strtotime($d->tanggal_deal))}}</td>
                                <td class="text-right">{{number_format($d->komisi_agen_pemilik)}}</td>
                                <td class="text-right">{{number_format($d->komisi_agen_penjual)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <h6><b>Agen belum menjualkan properti secondary</b></h6>
                    </div>
                @endif
                </div>
            </div>
            <br>
            <div class="widget-content widget-content-area br-6">
                <div style="margin:20px;">
                <div class="" style="margin-bottom:20px;">
                    <div class="text-center">
                        <h5><b>Detail Laporan Penjualan Primary</b></h5>
                    </div>
                </div>
                @if(count($laporanPrimary) != 0)
                    <table id="myTable2" class="table table-striped" style="width:100%; ">
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
                            @foreach($laporanPrimary as $d)
                            <tr>
                                <td>{{$d->agens->nama}}</td>
                                <td>{{$d->primarys->nama_project}}</td>
                                <td>{{date('d-m-Y',strtotime($d->tanggal))}}</td>
                                <td>
                                    @if($d->keterangan != null)
                                    <?php echo $d->keterangan;?>
                                    @else
                                    -
                                    @endif
                                </td>
                                <td class="text-right">{{number_format($d->total_komisi)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <h6><b>Agen belum menjualkan properti primary</b></h6>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
$(document).ready( function () {
    $('#myTable').DataTable({
        "scrollX": true
    });
} );
</script>
<script>
$(document).ready( function () {
    $('#myTable2').DataTable({
        "scrollX": true
    });
} );
</script>
<script>
    CKEDITOR.replace( 'keterangan' );
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