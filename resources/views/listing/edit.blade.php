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
        <a href="{{url('listing')}}" aria-expanded="false" class="dropdown-toggle">
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
            <li>
                <a href="{{url('lantai')}}"> Lantai </a>
            </li>                           
        </ul>
    </li>

    <li class="menu ">
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
            <li class="">
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
                <div style="margin-bottom:20px;">
                    <div class="text-center">
                        <h3><b>Ubah Listing</b></3>
                    </div>
                </div>
                <form enctype="multipart/form-data" method="post" action="{{url('listings/'.$data->idlisting)}}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="kode">Kode Listing</label> <span style="color:red"><b>*</b></span>
                                <input id="kode" type="text" value="{{$data->kode_listing}}" class="form-control" disabled>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="agen">Agen</label> <span style="color:red"><b>*</b></span>
                                <input id="agen" type="text" value="{{$data->agens->nama}}" class="form-control" disabled>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Jenis Listing</label> <span style="color:red"><b>*</b></span><br> 
                                <select class="selectpicker" data-width="100%" name="jenislisting" required>
                                    <option value="">-- Pilih Jenis Listing --</option>
                                    @if($data->jenis_listing == 'JUAL')
                                    <option value="jual" selected>Jual</option>
                                    <option value="sewa">Sewa</option>
                                    @else
                                    <option value="jual" >Jual</option>
                                    <option value="sewa" selected>Sewa</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="alamat">Alamat Domisili Pemilik</label>
                                <input id="alamat" type="text" name="alamatdomisili" value="{{$data->alamat_domisili}}" class="form-control" >
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="hp">No HP Pemilik</label>
                                <input id="hp" type="text" name="hppemilik" value="{{$data->nomor_hp_pemilik}}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="suratkepemilikan">Surat Kepemilikan Atas Nama</label>
                                <input id="suratkepemilikan" type="text" name="skan" value="{{$data->surat_kepemilikan_atasnama}}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="alamatproperti">Alamat Properti</label>
                                <input id="alamatproperti" type="text" name="alamatproperti" value="{{$data->alamat_properti}}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="tower">Tower</label>
                                <input id="tower" type="text" name="tower" value="{{$data->tower}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="cluster">Cluster</label>
                                <input id="cluster" type="text" name="cluster" value="{{$data->cluster}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="lt">Luas Tanah (dalam meter persegi)</label> <span style="color:red"><b>*</b></span>
                                <input id="lt" type="number" step="0.1" name="lt" value="{{$data->luas_tanah}}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="lb">Luas Bangunan (dalam meter persegi)</label>
                                <input id="lb" type="number" step="0.1" name="lb" value="{{$data->luas_bangunan}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="dtl">Dimensi Tanah Lebar (dalam meter persegi)</label>
                                <input id="dtl" type="number" step="0.1" name="dtl" value="{{$data->dimensi_tanah_lebar}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="dtp">Dimensi Tanah Panjang (dalam meter persegi)</label>
                                <input id="dtp" type="number" step="0.1" name="dtp" value="{{$data->dimensi_tanah_luas}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="kt">Jumlah Kamar Tidur</label>
                                <input id="kt" type="number" step="1" name="kt" value="{{$data->kamar_tidur}}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="km">Jumlah Kamar Mandi</label>
                                <input id="km" type="number" step="1" name="km" value="{{$data->kamar_mandi}}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="ktp">Jumlah Kamar Tidur Pembantu</label>
                                <input id="ktp" type="number" step="1" name="ktp" value="{{$data->kamar_tidur_pembantu}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="kmp">Jumlah Kamar Mandi Pembantu</label>
                                <input id="kmp" type="number" step="1" name="kmp" value="{{$data->kamar_mandi_pembantu}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="jumlahlantai">Jumlah Lantai (bangunan)</label>
                                <input id="jumlahlantai" type="number" step="1" name="jumlahlantai" value="{{$data->jumlah_lantai}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="nomorlantai">Nomor Lantai (apartemen)</label>
                                <input id="nomorlantai" type="text" name="nomorlantai" value="{{$data->nomor_lantai}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="nomorunit">Nomor Unit (apartemen)</label>
                                <input id="nomorunit" type="text" name="nomorunit" value="{{$data->nomor_unit}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>View (apartemen)</label><br>
                                <select class="selectpicker" data-width="100%" name="view">
                                    <option value="">-- Pilih View (khusus apartemen)--</option>
                                    @if($data->view == 'city')
                                    <option value="city" selected>City</option>
                                    <option value="pool">Pool</option>
                                    @elseif($data->view == 'pool')
                                    <option value="city" >City</option>
                                    <option value="pool" selected>Pool</option>
                                    @else
                                    <option value="city">City</option>
                                    <option value="pool">Pool</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="listrik">Listrik (dalam watt)</label>
                                <input id="listrik" type="number" step="100" name="listrik" value="{{$data->listrik}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="dapur">Jumlah Dapur</label>
                                <input id="dapur" type="number" step="1" name="dapur" value="{{$data->dapur}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="carport">Jumlah Carport</label>
                                <input id="carport" type="number" step="1" name="carport" value="{{$data->carport}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="garasi">Jumlah Garasi</label>
                                <input id="garasi" type="number" step="1" name="garasi" value="{{$data->garasi}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Hadap</label><br>
                                <select class="selectpicker" data-width="100%" name="hadap" data-placeholder="Hadap">
                                    <option value="">-- Pilih Hadap --</option>
                                    <?php 
                                        $hadap = ['Timur', 'Utara', 'Barat', 'Selatan', 'Timur Laut', 'Barat Laut', 'Barat Daya', 'Tenggara', 'Utara dan Selatan',
                                        'Utara dan Timur', 'Utara dan Barat', 'Timur dan Barat', 'Timur dan Selatan', 'Barat dan Selatan'];                               
                                    ?>
                                    @foreach($hadap as $h)
                                        @if($h == $data->hadap)
                                            <option value="{{$h}}" selected>{{$h}}</option>
                                        @else
                                            <option value="{{$h}}">{{$h}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Tipe Listing</label><br>
                                <select class="selectpicker" data-width="100%" name="tipelisting" data-placeholder="Tipe Listing" >
                                    <option value="Open">Open</option>
                                    <option value="Open Khusus">Open Khusus</option>
                                    <option value="Ekslusif">Ekslusif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Air</label><br>
                                <select class="selectpicker" data-width="100%" name="air" data-placeholder="air" >
                                    <option value="PDAM">PDAM</option>
                                    <option value="Sumur">Sumur</option>
                                    <option value="PDAM dan Sumur">PDAM dan Sumur</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Pemegang Hak</label><br>
                                <select class="selectpicker" data-width="100%" name="pemeganghak" data-placeholder="pemeganghak" >
                                    <option value="Perorangan">Perorangan</option>
                                    <option value="PT/CV">PT atau CV</option>
                                    <option value="Ahli waris (sudah balik nama)">Ahli Waris (sudah balik nama)</option>
                                    <option value="Ahli waris (belum balik nama)">Ahli Waris (belum balik nama)</option>
                                    <option value="Ahli waris (dalam proses)">Ahli Waris (dalam proses)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="mulaitanggal">Berlaku Mulai Tanggal</label>
                                <input class="form-control flatpickr flatpickr-input active" type="date" id="mulaitanggal" name="mulaitanggal">
                            </div>
                        </div>                                   
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="berakhirtanggal">Berakhir Tanggal</label>
                                <input class="form-control flatpickr flatpickr-input active" type="date" id="berakhirtanggal" name="berakhirtanggal">
                            </div>
                        </div>                                   
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="harga">Harga</label> <span style="color:red"><b>*</b></span>
                                <input id="harga" type="number" name="harga" value="{{$data->harga}}" step="100000000" min="0" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Posisi</label><br>
                                <select class="selectpicker" data-width="100%" name="posisi" data-placeholder="posisi" >
                                    <option value="Kotak (badan)">Kotak (badan)</option>
                                    <option value="Hook (corner)">Hook (corner)</option>
                                    <option value="Ngantong">Ngantong</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Perabotan</label><br>
                                <select class="selectpicker" data-width="100%" name="perabotan" data-placeholder="perabotan" >
                                    <option value="Full furnished">Full Furnished</option>
                                    <option value="Non furnished">Non Furnished</option>
                                    <option value="Semi furnished">Semi Furnished</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="komisi">Komisi (dalam persen)</label> <span style="color:red"><b>*</b></span>
                                <input id="komisi" type="number" name="komisi" value="{{$data->komisi}}" step="0.01" min="0" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="banner">Catatan Pasang Banner</label>
                                <input id="banner" type="text" name="banner" value="{{$data->banner}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="tipeapartemen">Tipe Apartemen (khusus apartemen)</label>
                                <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Pilih bentuk harga" name="tipeapartemen">
                                    <option value="0">-- Pilih tipe apartemen (khusus apartemen) --</option>
                                    @foreach($bentukharga as $bh)
                                        <option value="{{$bh->idbentuk_harga}}">{{$bh->bentuk_harga}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="bentukharga">Harga Dalam Bentuk</label> <span style="color:red"><b>*</b></span>
                                <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Pilih bentuk harga" name="idbh" required>
                                    @foreach($bentukharga as $bh)
                                        <option value="{{$bh->idbentuk_harga}}">{{$bh->bentuk_harga}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="jenissurat">Jenis Surat</label> <span style="color:red"><b>*</b></span>
                                <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Pilih jenis surat" name="idjs" required>
                                    @foreach($jenissurat as $js)
                                        <option value="{{$js->idjenis_surat}}">{{$js->jenis_surat}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="tipeproperti">Tipe Properti</label> <span style="color:red"><b>*</b></span>
                                <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Pilih tipe properti" name="idtp" required>
                                    @foreach($tipeproperti as $tp)
                                        <option value="{{$tp->idtipe_properti}}">{{$tp->jenis_properti}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="jenislantai">Jenis Lantai</label>
                                <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Pilih jenis lantai" name="idjl">
                                    @foreach($jenislantai as $jl)
                                        <option value="{{$jl->idjenis_lantai}}">{{$jl->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="judul">Judul</label> <span style="color:red"><b>*</b></span>
                                <input id="judul" type="text" name="judul" value="{{$data->judul}}" class="form-control" maxlength="100" required>
                                <small id="sh-text1" class="form-text text-muted">Maks. 100 karakter</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <textarea id="catatan" name="catatan">{{$data->keterangan}}</textarea>
                            </div>
                        </div>                                   
                    </div>
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>Upload Foto Utama (akan ditampilkan pada bagian depan) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                        
                        <label class="custom-file-container__custom-file" >
                            <input type="file" class="custom-file-container__custom-file__custom-file-input" name="fotoutama">
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                    <div class="custom-file-container" data-upload-id="mySecondImage">
                        <label>Upload Semua Foto (termasuk foto utama) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                        <small id="sh-text1" class="form-text text-muted">Apabila tidak ingin mengganti maka tidak perlu di upload</small>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" class="custom-file-container__custom-file__custom-file-input" name="foto[]" multiple>
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                    
                </div>
                <a href="{{url('listings')}}" class="btn btn-secondary-light"> Kembali</a>
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
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<script>
    CKEDITOR.replace( 'catatan' );
</script>
<script src="{{asset('plugins/blockui/jquery.blockUI.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
<script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('plugins/select2/custom-select2.js')}}"></script>
<script>
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
@endsection