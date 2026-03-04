@extends('layout.master')
@section('title', 'Cadangan')
@section('content')
@include('include.error')
@push('styles')
<style>
.blink-text {
    animation: blink 1.5s infinite;
}

@keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0; }
    100% { opacity: 1; }
}
</style>
@endpush

<div class="col-12">
    <div class="card">
        <div class="card-body wizard-content">
            <h4 class="card-title blink-text">Sila isi maklumat di bawah</h4>
            {{-- <h6 class="card-subtitle">You can us the validation like what we did</h6> --}}
            <form method="POST" action="{{ route('pencadang.store') }}" class="validation-wizard wizard-circle m-t-40">
                @csrf
                <!-- Step 1 -->
                <h6>Step 1</h6>
                <section>
                    <div class="text-center mb-4">
                        <h4 class="font-weight-bold text-uppercase">
                            BAHAGIAN 1: DEMOGRAFIK
                        </h4>
                        <hr class="mx-auto" style="width: 120px; border-top: 3px solid #f36f21;">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wfirstName2"> Nama : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="wfirstName2" name="nama" style="text-transform: uppercase;"> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wlastName2"> Email : <span class="text-danger">*</span> </label>
                                <input type="email" class="form-control" id="wlastName2" name="email"> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wlocation2"> Jantina : <span class="text-danger">*</span> </label>
                                <select class="custom-select form-control" id="wlocation2" name="jantina">
                                    <option value="">Pilih Jantina</option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wlocation2"> Bangsa : <span class="text-danger">*</span> </label>
                                <select class="custom-select form-control" id="wlocation2" name="bangsa">
                                    <option value="">Pilih Bangsa</option>
                                    <option value="Melayu">Melayu</option>
                                    <option value="Cina">Cina</option>
                                    <option value="India">India</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wlocation2"> Umur : <span class="text-danger">*</span> </label>
                                <select class="custom-select form-control" id="wlocation2" name="umur">
                                    <option value="">Pilih Umur</option>
                                    <option value="18-25">18-25</option>
                                    <option value="26-35">26-35</option>
                                    <option value="36-45">36-45</option>
                                    <option value="46-55">46-55</option>
                                    <option value="56-65">56-65</option>
                                    <option value="66+">66 ke atas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="wlocation2"> Pekerjaan : <span class="text-danger">*</span> </label>
                                <select class="custom-select form-control" name="pekerjaan" id="pekerjaan">
                                    <option value="">Pilih Pekerjaan</option>
                                    <option value="ahli_majlis">Ahli Majlis, MBI</option>
                                    <option value="kakitangan_mbi">Kakitangan MBI</option>
                                    <option value="kakitangan_kerajaan">Kakitangan Kerajaan</option>
                                    <option value="kakitangan_swasta">Kakitangan Swasta</option>
                                    <option value="bekerja_sendiri">Bekerja Sendiri</option>
                                    <option value="tidak_bekerja">Tidak Bekerja</option>
                                    <option value="pelajar">Pelajar</option>
                                    <option value="pesara">Pesara</option>
                                </select>
                            </div>
                        </div>

                        {{-- AHLI MAJLIS APPEND --}}
                        <div class="col-md-3" id="ahli-majlis-container"></div>
                    </div>
                </section>
                <!-- Step 2 -->
               @include('step2')
                <!-- Step 3 -->
               @include('step3')
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('template/js/wizard.js') }}"></script>
<script src="{{ asset('template/js/append-ahli-majlis.js') }}"></script>
<script src="{{ asset('template/js/append/elemen1.js') }}"></script>
<script src="{{ asset('template/js/append/elemen2.js') }}"></script>
<script src="{{ asset('template/js/append/elemen3.js') }}"></script>
<script src="{{ asset('template/js/append/elemen4.js') }}"></script>
<script src="{{ asset('template/js/append/elemen5.js') }}"></script>
<script src="{{ asset('template/js/append/elemen6.js') }}"></script>
<script src="{{ asset('template/js/append/elemen7.js') }}"></script>
<script src="{{ asset('template/js/append/elemen8.js') }}"></script>
<script src="{{ asset('template/js/get-aset.js') }}"></script>
<script src="{{ asset('template/js/append/elemen2027.js') }}"></script>
<script>
      window.APP = {
        validateStep1Url: "{{ route('pencadang.validatestep1') }}",
        validateStep2Url: "{{ route('pencadang.validatestep2') }}",
        getAsetUrl: "{{ route('pencadang.getaset') }}",
        csrfToken: "{{ csrf_token() }}"
    };


    $(document).on('input', '.cadangan', function(){

        let words = $(this).val().trim().split(/\s+/).filter(Boolean);
        let count = words.length;

        if(count > 300){
            words = words.slice(0,300);
            $(this).val(words.join(" "));
            count = 300;
        }

        $(this).closest('.form-group').find('.charCount').text(count);

    });

   //count char for lokasi spesifik
    $(document).on('input', '.lokasi_spesifik', function(){

        let words = $(this).val().trim().split(/\s+/).filter(Boolean);
        let count = words.length;

        if(count > 150){
            words = words.slice(0,150);
            $(this).val(words.join(" "));
            count = 150;
        }

        $(this).closest('.form-group').find('.lokasi_charCount').text(count);

    });

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berjaya!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: true
        });        
    @endif
</script>

@endpush
