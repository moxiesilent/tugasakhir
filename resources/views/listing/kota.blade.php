<div class="form-group" id="pilihKota">
    <label for="kota">Kabupaten atau Kota</label>
    <select onchange="kota()" id="kota" class="form-control basic" data-toggle="select" title="Simple select" data-placeholder="Pilih kabupaten atau kota">
        @foreach($kota as $k)
            <option value="{{$k->idkota}}">{{$k->nama_kota}}</option>
        @endforeach
    </select>
</div>