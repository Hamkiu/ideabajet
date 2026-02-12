document.addEventListener('DOMContentLoaded', function () {

    let appended = false;

    let elemenOptions = `<option value="">--Sila Pilih Sub Elemen--</option>`;
    elemenList7.forEach(item => {
        elemenOptions += `
            <option value="${item.elemen_7}">
                ${item.elemen_7}
            </option>`;
    });

    let lokasiOptions = `<option value="">--Sila Pilih Lokasi--</option>`;
    lokasiList.forEach(item => {
        lokasiOptions += `
            <option value="${item.lokasi}">
                ${item.lokasi}
            </option>`;
    });

    
    document.getElementById('btnAddElemen7').addEventListener('click', function () {
    
        const pilihan = document.getElementById('pilihan_e7').value;
        const lokasi  = document.getElementById('lokasi_e7').value;
        const butiran = document.getElementById('butiran_e7').value;
    
        // ❌ Validate input atas dulu
        if (!pilihan || !lokasi || !butiran) {
            Swal.fire({
                icon: 'warning',
                title: 'Elemen 7 tidak lengkap',
                text: 'Sila Lengkapkan Pilihan Pertama Dahulu.'
            });
            return;
        }
    
        // 🔒 Limit sekali
        if (appended) {
            Swal.fire({
                icon: 'info',
                title: 'Had Tambahan',
                text: 'Maksimum 2 Pilihan Sahaja Bagi Setiap Pilihan'
            });
            return;
        }
    
        // ✅ Append input boleh edit
        const html = `
        <div class="card mt-3" id="elemen7-extra">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                    <button type="button"
                            class="btn btn-sm btn-danger"
                            id="btnDeleteElemen7">
                        <i class="fas fa-trash" title="Hapus Elemen"></i>
                    </button>
                </div>
        
                <div class="row elemen7-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Pilihan :</label>
                            <select class="custom-select form-control"
                                    name="pilihan_e7_extra">
                                ${elemenOptions}
                            </select>
                        </div>
                    </div>
        
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Lokasi :</label>
                            <select class="custom-select form-control"
                                    name="lokasi_e7_extra">
                                ${lokasiOptions}
                            </select>
                        </div>
                    </div>
        
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Butiran :</label>
                            <input type="text"
                                   class="form-control"
                                   name="butiran_e7_extra"
                                   placeholder="Masukkan Butiran">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
        
    
        document.getElementById('elemen7-append')
                .insertAdjacentHTML('beforeend', html);
    
        appended = true;
    
        // 🗑 Delete handler
        document.getElementById('btnDeleteElemen7')
            .addEventListener('click', function () {
    
                document.getElementById('elemen7-extra').remove();
                appended = false;
            });
    });
    
});