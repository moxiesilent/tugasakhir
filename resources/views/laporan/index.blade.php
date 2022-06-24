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
                        <h4><b>Laporan Penjualan Listing</b></4>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalTambah">Tambah Baru</button>
                    </div>
                </div>
                @if(session('status'))
                <div class="alert alert-light-success border-0 mb-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                    <strong>Sukses!</strong> {{session('status')}}</button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-light-danger border-0 mb-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                    <strong>Error!</strong> {{session('error')}}</button>
                </div>
                @endif
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
                                <th width="50px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
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
                                        {{$d->agensPemilik['nama']}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($d->agensPenjual != null)
                                        {{$d->agensPenjual['nama']}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{number_format($d->harga_jual)}}</td>
                                <td>{{date('d-m-Y',strtotime($d->tanggal_deal))}}</td>
                                <td>{{number_format($d->komisi_agen_pemilik)}}</td>
                                <td>{{number_format($d->komisi_agen_penjual)}}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2"data-boundary="window" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                            <a href="{{url('laporans/'.$d->idlaporan)}}"><button class="dropdown-item btn btn-primary">&nbsp&nbsp&nbspDetail</button></a><br>
                                            <a href="{{url('laporans/'.$d->idlaporan.'/edit')}}"><button class="dropdown-item btn btn-warning">&nbsp&nbsp&nbspUbah</button></a><br>
                                            <button class="dropdown-item btn btn-danger" onclick="hapus('{{csrf_token()}}','{{$d->idlaporan}}')">&nbsp&nbsp&nbspHapus</button>
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

<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form method="post" action="{{url('laporans')}}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan Penjualan</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-8 col-8 mx-auto">
                        <div class="form-group">
                            <label for="listing">Listing</label>
                            <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="" name="listing">
                                <option value="">-- Pilih Listing --</option>
                                @foreach($listing as $l)
                                    <option value="{{$l->idlisting}}">{{$l->kode_listing}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agenPemilik">Agen Pemilik</label>
                            <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Kode - Nama Agen" name="agenPemilik">
                                <option value="">-- Pilih Agen --</option>
                                @foreach($agen as $ag)
                                    @if($ag->nama != 'admin')
                                        <option value="{{$ag->idagen}}">{{$ag->kode}} - {{$ag->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agenPenjual">Agen Penjual</label>
                            <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Kode - Nama Agen" name="agenPenjual">
                                <option value="">-- Pilih Agen --</option>
                                @foreach($agen as $ag)
                                    @if($ag->nama != 'admin')
                                        <option value="{{$ag->idagen}}">{{$ag->kode}} - {{$ag->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hargaJual">Harga Jual</label> <span style="color:red"><b>*</b></span>
                            <input id="hargaJual" type="text" name="hargaJual" placeholder="(angka)" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Deal</label> <span style="color:red"><b>*</b></span>
                            <input class="form-control flatpickr flatpickr-input active" type="date" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="komisiPemilik">Total Komisi Pemilik</label>
                            <input id="komisiPemilik" type="text" name="komisiPemilik" placeholder="(angka)" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="komisiPenjual">Total Komisi Penjual</label>
                            <input id="komisiPenjual" type="text" name="komisiPenjual" placeholder="(angka)" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="namaPembeli">Nama Pembeli</label>
                            <input id="namaPembeli" type="text" name="namaPembeli" placeholder="nama pembeli" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="namaNotaris">Nama Notaris</label>
                            <input id="namaNotaris" type="text" name="namaNotaris" placeholder="nama notaris" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="dp">DP</label>
                            <input id="dp" type="text" name="dp" placeholder="(angka)" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea id="keterangan" name="keterangan"></textarea>
                        </div>
                    </div>                                        
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
            </div>
            </form>
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