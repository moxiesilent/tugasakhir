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
                    <h3>Tambah Listing</h3>
                </div>
                <form enctype="multipart/form-data" method="post" action="{{url('listings')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="kode">Kode Listing</label> <span style="color:red"><b>*</b></span>
                                <input id="kode" type="text" name="kode" placeholder="RIC.A000" class="form-control" required>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="agen">Agen</label>
                                <select class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Kode - Nama Agen" name="idagen" required>
                                    @foreach($agen as $ag)
                                        @if($ag->name == 'admin')
                                            <option value=""></option>
                                        @else
                                            <option value="{{$ag->id}}">{{$ag->kode}} - {{$ag->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="alamat">Alamat Domisili Pemilik</label>
                                <input id="alamat" type="text" name="alamatdomisili" placeholder="Alamat domisili pemilik..." class="form-control">
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="hp">No HP Pemilik</label>
                                <input id="hp" type="text" name="hppemilik" placeholder="08xxxxxx" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="suratkepemilikan">Surat Kepemilikan Atas Nama</label>
                                <input id="suratkepemilikan" type="text" name="skan" placeholder="Surat kepemilikan atas nama..." class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="alamatproperti">Alamat Properti</label>
                                <input id="alamatproperti" type="text" name="alamatproperti" placeholder="Alamat properti..." class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="tower">Tower</label>
                                <input id="tower" type="text" name="tower" placeholder="Tower (apartemen)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="cluster">Cluster</label>
                                <input id="cluster" type="text" name="cluster" placeholder="Cluster..." class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="lt">Luas Tanah (dalam meter persegi)</label>
                                <input id="lt" type="number" step="0.1" name="lt" placeholder="Luas tanah (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="lb">Luas Bangunan (dalam meter persegi)</label>
                                <input id="lb" type="number" step="0.1" name="lb" placeholder="Luas bangunan (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="dtl">Dimensi Tanah Lebar (dalam meter persegi)</label>
                                <input id="dtl" type="number" step="0.1" name="dtl" placeholder="Dimensi tanah lebar (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="dtp">Dimensi Tanah Panjang (dalam meter persegi)</label>
                                <input id="dtp" type="number" step="0.1" name="dtp" placeholder="Dimensi tanah panjang (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="kt">Jumlah Kamar Tidur</label>
                                <input id="kt" type="number" step="1" name="kt" placeholder="Jumlah kamar tidur (angka)" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="km">Jumlah Kamar Mandi</label>
                                <input id="km" type="number" step="1" name="km" placeholder="Jummlah kamar mandi (angka)" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="ktp">Jumlah Kamar Tidur Pembantu</label>
                                <input id="ktp" type="number" step="1" name="ktp" placeholder="Jumlah kamar tidur pembantu (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="kmp">Jumlah Kamar Mandi Pembantu</label>
                                <input id="kmp" type="number" step="1" name="kmp" placeholder="Luas bangunan (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="jumlahlantai">Jumlah Lantai (bangunan)</label>
                                <input id="jumlahlantai" type="number" step="1" name="jumlahlantai" placeholder="Jumlah lantai (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="nomorlantai">Nomor Lantai (apartemen)</label>
                                <input id="nomorlantai" type="text" name="nomorlantai" placeholder="Nomor lantai (apartemen)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="nomorunit">Nomor Unit (apartemen)</label>
                                <input id="nomorunit" type="text" name="nomorunit" placeholder="Nomor unit (apartemen)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>View (apartemen)</label><br>
                                <div class="n-chk">
                                    <label class="new-control new-radio radio-primary">
                                        <input type="radio" class="new-control-input" name="view" value="city">
                                        <span class="new-control-indicator"></span>City
                                    </label>
                                </div>
                                <div class="n-chk">
                                    <label class="new-control new-radio radio-primary">
                                        <input type="radio" class="new-control-input" name="view" value="pool">
                                        <span class="new-control-indicator"></span>Pool
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="listrik">Listrik (dalam watt)</label>
                                <input id="listrik" type="number" step="100" name="listrik" placeholder="Listrik (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="dapur">Jumlah Dapur</label>
                                <input id="dapur" type="number" step="1" name="dapur" placeholder="Jumlah dapur (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="carport">Jumlah Carport</label>
                                <input id="carport" type="number" step="1" name="carport" placeholder="Jumlah carport (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="garasi">Jumlah Garasi</label>
                                <input id="garasi" type="number" step="1" name="garasi" placeholder="Jumlah garasi (angka)" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Hadap</label><br>
                                <select class="selectpicker" data-width="100%" name="hadap" data-placeholder="Hadap">
                                    <option value="timur">Timur</option>
                                    <option value="utara">Utara</option>
                                    <option value="barat">Barat</option>
                                    <option value="selatan">Selatan</option>
                                    <option value="timur laut">Timur Laut</option>
                                    <option value="barat laut">Barat Laut</option>
                                    <option value="barat daya">Barat Daya</option>
                                    <option value="tenggara">Tenggara</option>
                                    <option value="utara dan selatan">Utara dan Selatan</option>
                                    <option value="utara dan timur">Utara dan Timur</option>
                                    <option value="utara dan barat">Utara dan Barat</option>
                                    <option value="timur dan barat">Timur dan Barat</option>
                                    <option value="timur dan selatan">Timur dan Selatan</option>
                                    <option value="barat dan selatan">Barat dan Selatan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Jenis Listing</label><br>
                                <select class="selectpicker" data-width="100%" name="jenislisting" data-placeholder="Jenis Listing" required>
                                    <option value="open">Open</option>
                                    <option value="open khusus">Open Khusus</option>
                                    <option value="ekslusif">Ekslusif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Air</label><br>
                                <select class="selectpicker" data-width="100%" name="air" data-placeholder="air" required>
                                    <option value="PDAM">PDAM</option>
                                    <option value="sumur">Sumur</option>
                                    <option value="PDAM dan sumur">PDAM dan Sumur</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Pemegang Hak</label><br>
                                <select class="selectpicker" data-width="100%" name="pemeganghak" data-placeholder="pemeganghak" required>
                                    <option value="perorangan">Perorangan</option>
                                    <option value="pt/cv">PT atau CV</option>
                                    <option value="ahli waris (sudah balik nama)">Ahli Waris (sudah balik nama)</option>
                                    <option value="ahli waris (belum balik nama)">Ahli Waris (belum balik nama)</option>
                                    <option value="ahli waris (dalam proses)">Ahli Waris (dalam proses)</option>
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
                                <label for="harga">Harga</label>
                                <input id="harga" type="number" name="harga" placeholder="Harga (angka)" step="100000000" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Posisi</label><br>
                                <select class="selectpicker" data-width="100%" name="posisi" data-placeholder="posisi" required>
                                    <option value="kotak (badan)">Kotak (badan)</option>
                                    <option value="hook (corner)">Hook (corner)</option>
                                    <option value="ngantong">Ngantong</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label>Perabotan</label><br>
                                <select class="selectpicker" data-width="100%" name="perabotan" data-placeholder="perabotan" required>
                                    <option value="full furnished">Full Furnished</option>
                                    <option value="non furnished">Non Furnished</option>
                                    <option value="semi furnished">Semi Furnished</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="komisi">Komisi (dalam persen)</label>
                                <input id="komisi" type="number" name="komisi" placeholder="Komisi (angka)" step="0.01" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="banner">Catatan Pasang Banner</label>
                                <input id="banner" type="text" name="banner" placeholder="Catatan banner..." class="form-control">
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
                                <label for="bentukharga">Harga Dalam Bentuk</label>
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
                                <label for="jenissurat">Jenis Surat</label>
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
                                <label for="tipeproperti">Tipe Properti</label>
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
                                <label for="provinsi">Provinsi</label>
                                <select onchange="provinsi()" id="provinsi" class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Pilih provinsi">
                                    @foreach($provinsi as $pr)
                                        <option value="{{$pr->idprovinsi}}">{{$pr->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group" id="pilihKota">
                                <label for="kota">Kabupaten atau Kota</label>
                                <select onchange="kota()" id="kota" class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Pilih kabupaten atau kota">
                                    
                                </select>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group" id="pilihKecamatan">
                                <label for="kecamatan">Kecamatan</label>
                                <select onchange="kecamatan()" id="kecamatan" class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Pilih wilayah">
                                    
                                </select>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group" id="pilihKelurahan">
                                <label for="kelurahan">Kelurahan</label>
                                <select onchange="kelurahan()" id="kelurahan" class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Pilih wilayah" name="kelurahan">
                                    @foreach($kelurahan as $kl)
                                        <option value="{{$kl->idkelurahan}}">{{$kl->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                                        
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto mb-3">
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <textarea id="catatan" name="catatan"></textarea>
                            </div>
                        </div>                                   
                    </div>
                    <div class="custom-file-container" data-upload-id="mySecondImage">
                        <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
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
    var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
<script>
    function provinsi(){
        var provinsi = $('#provinsi').val();
        $('#pilihKota').load('{{url("kota")}}/'+provinsi, function(e) {});
    }
</script>
<script>
    function kota(){
        var kota = $('#kota').val();
        $('#pilihKecamatan').load('{{url("kecamatan")}}/'+kota, function(e) {});
    }
</script>
<script>
    function kecamatan(){
        var kecamatan = $('#kecamatan').val();
        $('#pilihKelurahan').load('{{url("kelurahan")}}/'+kecamatan, function(e) {});
    }
</script>
@endsection