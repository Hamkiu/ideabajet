document.addEventListener('DOMContentLoaded', function () {

    let appended = false;

    let elemenOptions = `<option value="">--Sila Pilih Sub Elemen--</option>`;
    elemenList4.forEach(item => {
        elemenOptions += `
            <option value="${item.elemen_4}">
                ${item.elemen_4}
            </option>`;
    });

    let lokasiOptions = `<option value="">--Sila Pilih Lokasi--</option>`;
    lokasiList.forEach(item => {
        lokasiOptions += `
            <option value="${item.lokasi}">
                ${item.lokasi}
            </option>`;
    });

    
    document.getElementById('btnAddElemen4').addEventListener('click', function () {
    
        const pilihan = document.getElementById('pilihan_e4').value;
        const lokasi  = document.getElementById('lokasi_e4').value;
        const butiran = document.getElementById('butiran_e4').value;
    
        // ❌ Validate input atas dulu
        if (!pilihan || !lokasi || !butiran) {
            Swal.fire({
                icon: 'warning',
                title: 'Elemen 4 tidak lengkap',
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
        <div class="card mt-3" id="elemen4-extra">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                    <button type="button"
                            class="btn btn-sm btn-danger"
                            id="btnDeleteElemen4">
                        <i class="fas fa-trash" title="Hapus Elemen"></i>
                    </button>
                </div>
        
                <div class="row elemen4-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Pilihan :</label>
                            <select class="custom-select form-control"
                                    name="pilihan_e4_extra">
                                ${elemenOptions}
                            </select>
                        </div>
                    </div>
        
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Lokasi :</label>
                            <select class="custom-select form-control"
                                    name="lokasi_e4_extra">
                                ${lokasiOptions}
                            </select>
                        </div>
                    </div>
        
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Butiran :</label>
                            <input type="text"
                                   class="form-control"
                                   name="butiran_e4_extra"
                                   placeholder="Masukkan Butiran">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
        
    
        document.getElementById('elemen4-append')
                .insertAdjacentHTML('beforeend', html);
    
        appended = true;
    
        // 🗑 Delete handler
        document.getElementById('btnDeleteElemen4')
            .addEventListener('click', function () {
    
                document.getElementById('elemen4-extra').remove();
                appended = false;
            });
    });
    
});