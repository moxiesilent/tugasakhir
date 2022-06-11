<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin Template - Login Page</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/js/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/authentication/form-2.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">
</head>
<body class="form">
    
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="form-container outer">
        <div class="form-form">
            <!-- <div class="form-form-wrap"> -->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="form-container">
                            <div class="form-content">
                                @if($foto != "")
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:100%;">
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
                                    @else
                                                <img class="" src="{{asset('images/listing/default.png')}}" height='350px'>
                                @endif    
                                <br>
                                <div class="row">
                                    <h4><b>{{$listing->judul}}</b></h4>
                                </div>
                                <hr class="bg-dark border-1 border-top border-dark">
                                <div class="text-right">
                                    <h5><b>Rp. {{number_format($listing->harga)}}</b></h5>
                                </div>
                                <div class="text-left">
                                    <p>Luas Tanah : <b>{{$listing->luas_tanah}} m<sup>2</sup></b></p>
                                    @if($listing->luas_bangunan != 0)
                                        <p>Luas Bangunan : <b>{{$listing->luas_bangunan}} m<sup>2</sup></b></p>
                                    @else
                                        <p>Luas Bangunan : <b>-</b></p>
                                    @endif
                                    @if($listing->dimensi_tanah_lebar != 0)
                                        <p>Dimensi Tanah Lebar : <b>{{$listing->dimensi_tanah_lebar}} m</b></p>
                                    @else
                                        <p>Dimensi Tanah Lebar : <b>-</b></p>
                                    @endif
                                    @if($listing->dimensi_tanah_panjang != 0)
                                        <p>Dimensi Tanah Panjang : <b>{{$listing->dimensi_tanah_panjang}} m</b></p>
                                    @else
                                        <p>Dimensi Tanah Panjang : <b>-</b></p>
                                    @endif
                                    <p>Jenis Surat : <b>{{$listing->surats->jenis_surat}}</b></p>
                                    <p>Tipe Properti : <b>{{$listing->tipepropertis->jenis_properti}}</b></p>
                                    <br>
                                    @if($listing->tipepropertis->jenis_properti == 'Apartemen')
                                        @if($listing->tipeapartemens->tipe_apartemen != null)
                                            <p>Tipe Apartemen : <b>{{$listing->tipeapartemens->tipe_apartemen}}</b></p>
                                        @else
                                            <p>Tipe Apartemen : <b>{{$listing->tipeapartemens->tipe_apartemen}}</b></p>
                                        @endif
                                        @if($listing->tower != null)
                                            <p>Tower : <b>{{$listing->tower}}</b></p>
                                        @else
                                            <p>Tower : <b>-</b></p>
                                        @endif
                                        @if($listing->view != null)
                                            <p>View : <b>{{$listing->view}}</b></p>
                                        @else
                                            <p>View : <b>-</b></p>
                                        @endif
                                        @if($listing->nomor_lantai != null)
                                            <p>Nomor Lantai : <b>{{$listing->nomor_lantai}}</b></p>
                                        @else
                                            <p>Nomor Lantai : <b>-</b></p>
                                        @endif
                                        @if($listing->nomor_unit != null)
                                            <p>Nomor Unit : <b>{{$listing->nomor_unit}}</b></p>
                                        @else
                                            <p>Nomor Unit : <b>-</b></p>
                                        @endif
                                    @endif
                                    <br>
                                    
                                    <p>Kamar Tidur : <b>{{$listing->kamar_tidur}}</b></p>
                                    <p>Kamar Mandi : <b>{{$listing->kamar_mandi}}</b></p>
                                    <p>Kamar Tidur Pembantu : <b>{{$listing->kamar_tidur_pembantu}}</b></p>
                                    <p>Kamar Mandi Pembantu : <b>{{$listing->kamar_mandi_pembantu}}</b></p>
                                    <p>Dapur : <b>{{$listing->dapur}}</b></p>
                                    <p>Carport : <b>{{$listing->carport}}</b></p>
                                    <p>Garasi : <b>{{$listing->garasi}}</b></p>
                                    @if($listing->jenis_lantai_idjenis_lantai != '')
                                    <p>Jenis Lantai : <b>{{$listing->lantais->nama}}</b></p><br>
                                    @endif
                                    <p>Catatan : </p><p><b>{!!$listing->catatan!!}</b></p>
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/authentication/form-2.js')}}"></script>
    <script>
        var loaderElement = document.querySelector('#load_screen');
        setTimeout( function() {
            loaderElement.style.display = "none";
        }, 3000);
    </script>
</body>
</html>