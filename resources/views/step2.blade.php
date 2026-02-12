<h6>Step 2</h6>
<section>
    <div class="text-center mb-4">
        <h4 class="font-weight-bold text-uppercase">
            BAHAGIAN 2: PILIH KEUTAMAAN ANDA
        </h4>
        <hr class="mx-auto" style="width: 120px; border-top: 3px solid #f36f21;">
    </div>
    {{-- elemen 1 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    ELEMEN 1: IPOH BANDAR TERBERSIH

                    <button type="button" class="btn waves-effect waves-light btn-success" id="btnAddElemen1"><i class="fas fa-plus" title="Tambah Elemen"></i></button>
                </div>
                <div class="card-body">
                    <div class="row" id="elemen1-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wlocation2"> Pilihan : </label>
                                <select class="custom-select form-control" id="pilihan_e1" name="pilihan_e1[]">
                                    <option value="">--Sila Pilih Sub Elemen--</option>
                                    @foreach ($elemenList_1 as $elemen)
                                        <option value="{{ $elemen->elemen_1 }}">{{ $elemen->elemen_1 }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wlocation2"> Lokasi : </label>
                                <select class="custom-select form-control" id="lokasi_e1" name="lokasi_e1[]">
                                    <option value="">--Sila Pilih Lokasi--</option>
                                    @foreach ($lokasiList as $lokasi)
                                        <option value="{{ $lokasi->lokasi }}">{{ $lokasi->lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wfirstName2"> Butiran : </label>
                                <input type="text" class="form-control" id="butiran_e1" name="butiran_e1[]" placeholder="Masukkan Butiran"> </div>
                        </div>
                    </div>
                    <div id="elemen1-append"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- elemen 2 --}}
    <div class="row">
        {{-- ELEMEN 1: IPOH BANDAR TERBERSIH --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    ELEMEN 2: KEMUDAHAN AWAM DAN TAMAN

                    <button type="button" class="btn waves-effect waves-light btn-success" id="btnAddElemen2"><i class="fas fa-plus" title="Tambah Elemen"></i></button>
                </div>
                <div class="card-body">
                    <div class="row" id="elemen2-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wlocation2"> Pilihan : </label>
                                <select class="custom-select form-control" id="pilihan_e2" name="pilihan_e2[]">
                                    <option value="">--Sila Pilih Sub Elemen--</option>
                                    @foreach ($elemenList_2 as $elemen)
                                        <option value="{{ $elemen->elemen_2 }}">{{ $elemen->elemen_2 }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wlocation2"> Lokasi : </label>
                                <select class="custom-select form-control" id="lokasi_e2" name="lokasi_e2[]">
                                    <option value="">--Sila Pilih Lokasi--</option>
                                    @foreach ($lokasiList as $lokasi)
                                        <option value="{{ $lokasi->lokasi }}">{{ $lokasi->lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wfirstName2"> Butiran : </label>
                                <input type="text" class="form-control" id="butiran_e2" name="butiran_e2[]" placeholder="Masukkan Butiran"> </div>
                        </div>
                    </div>
                    <div id="elemen2-append"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- elemen 3 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    ELEMEN 3: KEMUDAHAN INFRASTRUKTUR

                    <button type="button" class="btn waves-effect waves-light btn-success" id="btnAddElemen3"><i class="fas fa-plus" title="Tambah Elemen"></i></button>
                </div>
                <div class="card-body">
                    <div class="row" id="elemen3-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wlocation2"> Pilihan : </label>
                                <select class="custom-select form-control" id="pilihan_e3" name="pilihan_e3[]">
                                    <option value="">--Sila Pilih Sub Elemen--</option>
                                    @foreach ($elemenList_3 as $elemen)
                                        <option value="{{ $elemen->elemen_3 }}">{{ $elemen->elemen_3 }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wlocation2"> Lokasi : </label>
                                <select class="custom-select form-control" id="lokasi_e3" name="lokasi_e3[]">
                                    <option value="">--Sila Pilih Lokasi--</option>
                                    @foreach ($lokasiList as $lokasi)
                                        <option value="{{ $lokasi->lokasi }}">{{ $lokasi->lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wfirstName2"> Butiran : </label>
                                <input type="text" class="form-control" id="butiran_e3" name="butiran_e3[]" placeholder="Masukkan Butiran"> </div>
                        </div>
                    </div>
                    <div id="elemen3-append"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- elemen 4 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    ELEMEN 4: BANGUNAN DAN HARTANAH MAJLIS

                    <button type="button" class="btn waves-effect waves-light btn-success" id="btnAddElemen4"><i class="fas fa-plus" title="Tambah Elemen"></i></button>
                </div>
                <div class="card-body">
                    <div class="row" id="elemen4-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wlocation2"> Pilihan : </label>
                                <select class="custom-select form-control" id="pilihan_e4" name="pilihan_e4[]">
                                    <option value="">--Sila Pilih Sub Elemen--</option>
                                    @foreach ($elemenList_4 as $elemen)
                                        <option value="{{ $elemen->elemen_4 }}">{{ $elemen->elemen_4 }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wlocation2"> Lokasi : </label>
                                <select class="custom-select form-control" id="lokasi_e4" name="lokasi_e4[]">
                                    <option value="">--Sila Pilih Lokasi--</option>
                                    @foreach ($lokasiList as $lokasi)
                                        <option value="{{ $lokasi->lokasi }}">{{ $lokasi->lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wfirstName2"> Butiran : </label>
                                <input type="text" class="form-control" id="butiran_e4" name="butiran_e4[]" placeholder="Masukkan Butiran"> </div>
                        </div>
                    </div>
                    <div id="elemen4-append"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- elemen 5 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    ELEMEN 5: HARTA MODAL (ASET)

                    <button type="button" class="btn waves-effect waves-light btn-success" id="btnAddElemen5"><i class="fas fa-plus" title="Tambah Elemen"></i></button>
                </div>
                <div class="card-body">
                    <div class="row" id="elemen5-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wlocation2"> Pilihan : </label>
                                <select class="custom-select form-control" id="pilihan_e5" name="pilihan_e5[]">
                                    <option value="">--Sila Pilih Sub Elemen--</option>
                                    @foreach ($elemenList_5 as $elemen)
                                        <option value="{{ $elemen->id_elemen5 }}">{{ $elemen->elemen_5 }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wlocation2"> Aset : </label>
                                <select class="custom-select form-control" id="aset_e5" name="aset_e5[]">
                                    <option value="">--Sila Pilih Aset--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wfirstName2"> Butiran : </label>
                                <input type="text" class="form-control" id="butiran_e5" name="butiran_e5[]" placeholder="Masukkan Butiran"> </div>
                        </div>
                    </div>
                    <div id="elemen5-append"></div>
                </div>
            </div>
        </div>
    </div>

        {{-- elemen 6 --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        ELEMEN 6: IPOH BANDAR (BANDAR PINTAR)
    
                        <button type="button" class="btn waves-effect waves-light btn-success" id="btnAddElemen6"><i class="fas fa-plus" title="Tambah Elemen"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="row" id="elemen6-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wlocation2"> Pilihan : </label>
                                    <select class="custom-select form-control" id="pilihan_e6" name="pilihan_e6[]">
                                        <option value="">--Sila Pilih Sub Elemen--</option>
                                        @foreach ($elemenList_6 as $elemen)
                                            <option value="{{ $elemen->elemen_6 }}">{{ $elemen->elemen_6 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wlocation2"> Lokasi : </label>
                                    <select class="custom-select form-control" id="lokasi_e6" name="lokasi_e6[]">
                                        <option value="">--Sila Pilih Lokasi--</option>
                                        @foreach ($lokasiList as $lokasi)
                                            <option value="{{ $lokasi->lokasi }}">{{ $lokasi->lokasi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wfirstName2"> Butiran : </label>
                                    <input type="text" class="form-control" id="butiran_e6" name="butiran_e6[]" placeholder="Masukkan Butiran"> </div>
                            </div>
                        </div>
                        <div id="elemen6-append"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- elemen 7 --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        ELEMEN 7: IPOH BANDAR (BANDAR PINTAR)
    
                        <button type="button" class="btn waves-effect waves-light btn-success" id="btnAddElemen7"><i class="fas fa-plus" title="Tambah Elemen"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="row" id="elemen7-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wlocation2"> Pilihan : </label>
                                    <select class="custom-select form-control" id="pilihan_e7" name="pilihan_e7[]">
                                        <option value="">--Sila Pilih Sub Elemen--</option>
                                        @foreach ($elemenList_7 as $elemen)
                                            <option value="{{ $elemen->elemen_7 }}">{{ $elemen->elemen_7 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wlocation2"> Lokasi : </label>
                                    <select class="custom-select form-control" id="lokasi_e7" name="lokasi_e7[]">
                                        <option value="">--Sila Pilih Lokasi--</option>
                                        @foreach ($lokasiList as $lokasi)
                                            <option value="{{ $lokasi->lokasi }}">{{ $lokasi->lokasi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wfirstName2"> Butiran : </label>
                                    <input type="text" class="form-control" id="butiran_e7" name="butiran_e7[]" placeholder="Masukkan Butiran"> </div>
                            </div>
                        </div>
                        <div id="elemen7-append"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- elemen 8 --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        ELEMEN 8: PEMBANGUNAN EKONOMI MASYARAKAT DAN PELANCONGAN
    
                        <button type="button" class="btn waves-effect waves-light btn-success" id="btnAddElemen8"><i class="fas fa-plus" title="Tambah Elemen"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="row" id="elemen8-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wlocation2"> Pilihan : </label>
                                    <select class="custom-select form-control" id="pilihan_e8" name="pilihan_e8[]">
                                        <option value="">--Sila Pilih Sub Elemen--</option>
                                        @foreach ($elemenList_8 as $elemen)
                                            <option value="{{ $elemen->elemen_8 }}">{{ $elemen->elemen_8 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wlocation2"> Lokasi : </label>
                                    <select class="custom-select form-control" id="lokasi_e8" name="lokasi_e8[]">
                                        <option value="">--Sila Pilih Lokasi--</option>
                                        @foreach ($lokasiList as $lokasi)
                                            <option value="{{ $lokasi->lokasi }}">{{ $lokasi->lokasi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wfirstName2"> Butiran : </label>
                                    <input type="text" class="form-control" id="butiran_e8" name="butiran_e8[]" placeholder="Masukkan Butiran"> </div>
                            </div>
                        </div>
                        <div id="elemen8-append"></div>
                    </div>
                </div>
            </div>
        </div>
</section>