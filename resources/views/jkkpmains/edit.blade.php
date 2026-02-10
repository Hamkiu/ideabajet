@extends('layout.master')
@section('title', 'Edit JKKP')
@section('content')
@include('include.error')
<div class="card">
    <header class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title mb-0">Edit JKKP - {{ $jkkp6Main->id }}</h5>
    </header>
    
    <div class="card-body">
        <form action="{{ route('jkkpmains.update', encode($jkkp6Main->id)) }}" method="POST" id="create_jkkpmain_form" enctype="multipart/form-data">
            @csrf
            {{-- <h4 class="card-title">Special title treatment</h4> --}}
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Maklumat pemberitahu<span class="text-danger">*</span></h4>
                            {{-- <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6> --}}
                            {{-- <form class="form-horizontal p-t-20"> --}}
                                <div class="form-group row">
                                    <label for="nama_pemberitahu" class="col-sm-3 control-label">Nama Pemberitahu</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                            <input type="text" class="form-control" id="nama_pem" name="nama_pem" placeholder="Nama Pemberitahu" value="{{ $jkkp6Main->maklumat->nama_pem }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jawatan_pemberitahu" class="col-sm-3 control-label">Jawatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-crown"></i></span></div>
                                            <input type="text" class="form-control" id="jaw_pem" name="jaw_pem" placeholder="Jawatan" value="{{ $jkkp6Main->maklumat->jaw_pem }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jabatan_pemberitahu" class="col-sm-3 control-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-bag"></i></span></div>
                                            <input type="text" class="form-control" id="jab_pem" name="jab_pem" placeholder="Jabatan" value="{{ $jkkp6Main->maklumat->jab_pem }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">No. Telefon</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-mobile"></i></span></div>
                                            <input type="text" class="form-control" id="tel_pem" name="tel_pem" placeholder="No. Telefon" value="{{ $jkkp6Main->maklumat->tel_pem }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">No. Pekerja</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="ti-unlock"></i></span></div>
                                            <input type="text" class="form-control" id="id_pem" name="id_pem" placeholder="No. Pekerja" value="{{ $jkkp6Main->maklumat->id_pem }}">
                                        </div>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Orang Yang Terlibat</h4>
                            {{-- <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6> --}}
                            {{-- <form class="form-horizontal p-t-20"> --}}
                                <div class="form-group row">
                                    <label for="no_terlibat" class="col-sm-3 control-label">No Pekerja<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Sila Masukkan No Pekerja" name="id_terlibat" id="paynumber" aria-label="" aria-describedby="basic-addon1" value="{{ $jkkp6Main->maklumat->id_terlibat }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="button" id="btnCariPekerja"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">
                                        Ketua Jabatan / Unit / Bahagian <span class="text-danger">*</span>
                                    </label>
                                
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select class="form-control"
                                                    id="ketua_jab"
                                                    name="nama_boss"
                                                    data-selected="{{ $jkkp6Main->maklumat->nama_boss ?? '' }}">
                                                <option value="">-- Sila Pilih --</option>
                                            </select>
                                
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="ti-drupal"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="web10" class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nama_terlibat" name="nama_terlibat" placeholder="Nama Terlibat" readonly value="{{ $jkkp6Main->maklumat->nama_terlibat }}">
                                            <div class="input-group-append"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="web10" class="col-sm-3 control-label">No. Kad Pengenalan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="no_kad_pengenalan_terlibat" name="kp_terlibat" placeholder="No. Kad Pengenalan" readonly value="{{ $jkkp6Main->maklumat->kp_terlibat }}">
                                            <div class="input-group-append"><span class="input-group-text"><i class="ti-id-badge"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="web10" class="col-sm-3 control-label">Tarikh lahir</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="tarikh_lahir_terlibat" name="tarikh_lahir" placeholder="Tarikh Lahir" readonly value="{{ $jkkp6Main->maklumat->tarikh_lahir }}">
                                            <div class="input-group-append"><span class="input-group-text"><i class="ti-calendar"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="web10" class="col-sm-3 control-label">Warganegara</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="warganegara_terlibat" name="warganegara" placeholder="Warganegara" readonly value="{{ $jkkp6Main->maklumat->warganegara }}">
                                            <div class="input-group-append"><span class="input-group-text"><i class="ti-flag"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="web10" class="col-sm-3 control-label">Jantina</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="jantina_terlibat" name="jantina" placeholder="Jantina" readonly value="{{ $jkkp6Main->maklumat->jantina }}">
                                            <div class="input-group-append"><span class="input-group-text"><i class="ti-heart"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="web10" class="col-sm-3 control-label">Jawatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="jawatan_terlibat" name="jawatan" placeholder="Jawatan" readonly value="{{ $jkkp6Main->maklumat->jawatan }}">
                                            <div class="input-group-append"><span class="input-group-text"><i class="ti-crown"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="web10" class="col-sm-3 control-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="jabatan_terlibat" name="jabatan" placeholder="Jabatan" readonly value="{{ $jkkp6Main->maklumat->jabatan }}">
                                            <div class="input-group-append"><span class="input-group-text"><i class="ti-bag"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="web10" class="col-sm-3 control-label">Maklumat Gaji (RM)</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="maklumat_gaji_terlibat" name="gaji" placeholder="Maklumat Gaji (RM)" readonly value="{{ $jkkp6Main->maklumat->gaji }}">
                                            <div class="input-group-append"><span class="input-group-text"><i class="ti-money"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Huraian Kemalangan</h4>
                            <div class="form-group row">
                                <label for="nama_pemberitahu" class="col-sm-3 control-label">Tarikh & Masa Kemalangan<span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-calendar"></i></span></div>
                                        <input type="date" class="form-control" id="tarikh_kejadian" name="tarikh_kejadian" placeholder="Tarikh Kemalangan" value="{{ $jkkp6Main->maklumat->tarikh_kejadian }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-time"></i></span></div>
                                        <input type="time" class="form-control" id="masa_kejadian" name="masa_kejadian" placeholder="Masa Kemalangan" value="{{ $jkkp6Main->maklumat->masa_kejadian }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_pemberitahu" class="col-sm-3 control-label">Lokasi Kemalangan<span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-location-pin"></i></span></div>
                                        <input type="text" class="form-control" id="lokasi_kejadian" name="lokasi_kejadian" placeholder="Lokasi Kemalangan" value="{{ $jkkp6Main->maklumat->lokasi_kejadian }}">
                                    </div>
                                </div>
                            </div>
                            <h6 class="card-title"><u>Keterangan<span class="text-danger">*</span></u></h6>
                            <div class="form-group row">
                                <label for="sebelum_kejadian" class="col-sm-3 control-label">Sebelum Kejadian</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-arrow-left"></i></span></div>
                                        <textarea class="form-control" id="huraian_sebelum" name="huraian_sebelum" rows="5" placeholder="Sebelum Kejadian..">{{ $jkkp6Main->maklumat->huraian_sebelum }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="semasa_kejadian" class="col-sm-3 control-label">Semasa Kejadian</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-arrows-vertical"></i></span></div>
                                        <textarea class="form-control" id="huraian_semasa" name="huraian_semasa" rows="5" placeholder="Semasa Kejadian..">{{ $jkkp6Main->maklumat->huraian_semasa }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="selepas_kejadian" class="col-sm-3 control-label">Selepas Kejadian</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-arrow-right"></i></span></div>
                                        <textarea class="form-control" id="huraian_selepas" name="huraian_selepas" rows="5" placeholder="Selepas Kejadian..">{{ $jkkp6Main->maklumat->huraian_selepas }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lampiran</h4>
                            <div class="form-group row">
                                <label for="sijil_cuti" class="col-sm-3 control-label">Sijil Cuti Sakit<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="file" name="sijil_cuti[]" class="form-control-file" multiple>
                                    <p class="help-block">doc, docx, pdf, jpeg, png, jpg (Max 10Mb)</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gambar_kemalangan" class="col-sm-3 control-label">Gambar Kemalangan<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="file" name="gambar_kemalangan[]" class="form-control-file" multiple>
                                    <p class="help-block">doc, docx, pdf, jpeg, png, jpg (Max 10Mb)</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="laporan_polis" class="col-sm-3 control-label">Laporan Polis (jika ada)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="laporan_polis[]" class="form-control-file" multiple>
                                    <p class="help-block">doc, docx, pdf, jpeg, png, jpg (Max 10Mb)</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="laporan_perubatan" class="col-sm-3 control-label">Laporan Perubatan (dimasukkan ke wad)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="laporan_perubatan[]" class="form-control-file" multiple>
                                    <p class="help-block">doc, docx, pdf, jpeg, png, jpg (Max 10Mb)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row m-b-0">
                <div class="offset-sm-3 col-sm-9 text-right">
                    <button type="submit" class="btn btn-info" onclick="return true;">
                        Simpan & Seterusnya
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('btnCariPekerja').addEventListener('click', function () {

        const paynumber = document.getElementById('paynumber').value.trim();

        if (!paynumber) {
            Swal.fire({
                    icon: 'warning',
                    title: 'Sila Masukkan No Pekerja',
                    timer: 1500,
                    showConfirmButton: true
                });
                return;
        }

        fetch('/api/cari-pekerja', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            paynumber: document.getElementById('paynumber').value
        })
        })
        .then(res => res.json())
        .then(res => {
            const data = res.body;

            if (!data.maklumatUser || data.maklumatUser.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Maklumat Tidak Dijumpai',
                    text: 'Maklumat pekerja tidak dijumpai.',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
                return;
            }


            const u = data.maklumatUser[0];

            document.getElementById('nama_terlibat').value = u.MAS_STAFFNAME ?? '';
            document.getElementById('no_kad_pengenalan_terlibat').value = u.MAS_STAFNEWIC ?? '';
            document.getElementById('tarikh_lahir_terlibat').value = u.MAS_STAFFSDOB ? u.MAS_STAFFSDOB.substring(0,10) : '';
            document.getElementById('warganegara_terlibat').value = 'MALAYSIA';
            document.getElementById('jantina_terlibat').value = u.MAS_STAFFSSEX ?? '';
            document.getElementById('jawatan_terlibat').value = u.JAW_JAWATNAME ?? '';
            document.getElementById('jabatan_terlibat').value = u.PTJ_PTJPKNAME ?? '';
            document.getElementById('maklumat_gaji_terlibat').value = u.PAY_GAJIPOKOK ?? '';
        })

            .catch(err => {
                console.error(err);
                alert('Ralat semasa carian maklumat pekerja');
            });
    });

    //ketua jabatan-api
    document.addEventListener('DOMContentLoaded', function () {

const selectKetua = document.getElementById('ketua_jab');
if (!selectKetua) return;

const selectedValue = selectKetua.dataset.selected || '';

fetch('/api/list-kj')
    .then(response => response.json())
    .then(data => {

        if (!data.ketuaJabatan) {
            console.error('Data ketuaJabatan tiada');
            return;
        }

        data.ketuaJabatan.forEach(item => {

            const option = document.createElement('option');

            // DB simpan NAMA SAHAJA
            option.value = item.PER_STAFFNAME;

            option.textContent =
                item.PER_STAFFNAME + ' (' + item.PER_GELARANJW + ')';

            // AUTO SELECT (EDIT MODE)
            if (
                selectedValue &&
                item.PER_STAFFNAME.trim().toUpperCase() ===
                selectedValue.trim().toUpperCase()
            ) {
                option.selected = true;
            }

            selectKetua.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Gagal load Ketua Jabatan:', error);
    });
});
</script>
@endpush

