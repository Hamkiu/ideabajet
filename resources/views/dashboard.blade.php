@extends('layout.master')
@section('title', 'Cadangan')
@section('content')
@include('include.error')
<div class="col-12">
    <div class="card">
        <div class="card-body wizard-content">
            <h4 class="card-title">Step wizard with validation</h4>
            <h6 class="card-subtitle">You can us the validation like what we did</h6>
            <form method="POST" action="{{ route('cadangan.store') }}" class="validation-wizard wizard-circle m-t-40">
                @csrf
                <!-- Step 1 -->
                <h6>Step 1</h6>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wfirstName2"> Nama : <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="wfirstName2" name="nama"> </div>
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
<script>
    var form = $(".validation-wizard").show();

    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanging: function (event, currentIndex, newIndex) {

        // Boleh undur
        if (currentIndex > newIndex) {
            return true;
        }

        // VALIDATE STEP 1
        if (currentIndex === 0 && newIndex === 1) {

            let isValid = false;

            $.ajax({
                url: '{{ route("cadangan.validatestep1") }}',
                type: 'POST',
                data: $('.validation-wizard').serialize(),
                async: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function () {
                    isValid = true;
                },
                error: function (xhr) {

                    let errors = xhr.responseJSON.errors;
                    let html = '<ul style="text-align:left;">';

                    Object.values(errors).forEach(messages => {
                        messages.forEach(msg => {
                            html += `<li>${msg}</li>`;
                        });
                    });

                    html += '</ul>';

                    Swal.fire({
                        icon: 'error',
                        title: 'Maklumat Tidak Lengkap',
                        html: html,
                        confirmButtonText: 'OK'
                    });
                }
            });

            return isValid;
        }

        return true;
        },



        onFinishing: function(event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function(event, currentIndex) {
            // swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
            $(".validation-wizard").submit();
        }
        }), $(".validation-wizard").validate({
        ignore: "input[type=hidden]",
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element)
        },
        rules: {
            email: {
                email: !0
            }
        }
    })

    // append ahli majlis
    $(document).ready(function () {

        $('#pekerjaan').on('change', function () {

            const value = $(this).val();
            const container = $('#ahli-majlis-container');

            // Clear dulu (penting!)
            container.empty();

            if (value === 'ahli_majlis') {

                const html = `
                    <div class="form-group">
                        <label>
                                Zon
                            <span class="text-danger">*</span>
                        </label>

                        <select class="custom-select form-control"
                                name="zon_ahli_majlis">
                            <option value="">Pilih Zon</option>
                            <option value="zon_1">Zon 1</option>
                            <option value="zon_2">Zon 2</option>
                            <option value="zon_3">Zon 3</option>
                            <option value="zon_4">Zon 4</option>
                            <option value="zon_5">Zon 5</option>
                            <option value="zon_6">Zon 6</option>
                            <option value="zon_7">Zon 7</option>
                            <option value="zon_8">Zon 8</option>
                            <option value="zon_9">Zon 9</option>
                            <option value="zon_10">Zon 10</option>
                            <option value="zon_11">Zon 11</option>
                            <option value="zon_12">Zon 12</option>
                            <option value="zon_13">Zon 13</option>
                            <option value="zon_14">Zon 14</option>
                            <option value="zon_15">Zon 15</option>
                            <option value="zon_16">Zon 16</option>
                            <option value="zon_17">Zon 17</option>
                            <option value="zon_18">Zon 18</option>
                            <option value="zon_19">Zon 19</option>
                            <option value="zon_20">Zon 20</option>
                            <option value="zon_21">Zon 21</option>
                            <option value="zon_22">Zon 22</option>
                            <option value="zon_23">Zon 23</option>
                            <option value="zon_24">Zon 24</option>
                        </select>
                    </div>
                `;

                container.append(html);
            }
        });

    });
</script>
@endpush
