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

                    <div>
                        CADANGAN ANDA 
                        <small class="text-muted">(klik untuk info senarai zon dan kawasan
                        <i class="fas fa-info-circle text-info ms-1"
                        data-toggle="modal"
                        data-target=".bs-example-modal-lg"
                        title="Maklumat Senarai Kawasan dan Zon"></i> )</small>
                    </div>
        
                    <button type="button"
                        class="btn waves-effect waves-light btn-success"
                        id="btnAddElemen2027">
                        <i class="fas fa-plus me-2"></i> Tambah Elemen
                    </button>
        
                </div>
                <div class="card-body">
                    <div class="row elemen-row position-relative">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Elemen :</label>
                                <select class="custom-select form-control elemen_2027" name="elemen_2027[]">
                                    <option value="">--Sila Pilih Elemen--</option>
                                    @foreach ($elemen2027 as $elemen)
                                        <option value="{{ $elemen->id }}">{{ $elemen->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Zon :</label>
                                <select class="custom-select form-control zon_2027" name="zon_2027[]">
                                    <option value="">--Sila Pilih Zon--</option>
                                    @foreach ($zon2027 as $zon)
                                        <option value="{{ $zon->zon }}">{{ $zon->zon }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Lokasi Spesifik :</label>
                                <input type="text" class="form-control lokasi_spesifik" name="lokasi_spesifik[]" placeholder="Masukkan Lokasi Spesifik">
                                <small class="text-muted">
                                    <span class="lokasi_charCount">0</span> / 150 patah perkataan | isi "TIADA" jika tiada lokasi spesifik
                                </small>
                            </div>
                        </div>
                    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cadangan :</label>
                                <textarea class="form-control cadangan2027" rows="3" name="cadangan_2027[]" placeholder="tidak melebihi 300 patah perkataan"></textarea>
                                <small class="text-muted">
                                    <span class="cadangan_charCount">0</span> / 300 patah perkataan | isi "TIADA" jika tiada cadangan
                                </small>
                            </div>
                        </div>
                        <br>

                        <small class="text-info">
                            Sila klik (+) jika ada tambahan elemen sebelum klik <b>Seterusnya</b>.
                        </small>


                    
                    </div>
                    <div id="elemen2027-container"></div>
                </div>
            </div>
        </div>
    </div>
</section>