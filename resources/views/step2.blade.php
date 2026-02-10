<h6>Step 2</h6>
<section>
    <div class="text-center mb-4">
        <h4 class="font-weight-bold text-uppercase">
            BAHAGIAN 2: PILIH KEUTAMAAN ANDA
        </h4>
        <hr class="mx-auto" style="width: 120px; border-top: 3px solid #f36f21;">
    </div>
    <div class="row">
        {{-- ELEMEN 1: IPOH BANDAR TERBERSIH --}}
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
                                <select class="custom-select form-control" id="pilihan_e1" name="pilihan_e1">
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
                                <select class="custom-select form-control" id="bangsa_e1" name="bangsa_e1">
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
                                <input type="text" class="form-control" id="butiran_e1" name="butiran_e1" placeholder="Masukkan Butiran"> </div>
                        </div>
                    </div>
                    <div id="elemen1-append"></div>
                </div>
            </div>
        </div>
    </div>
</section>