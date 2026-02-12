document.addEventListener('DOMContentLoaded', function () {

    let appended = false;

    let elemenOptions = `<option value="">--Sila Pilih Sub Elemen--</option>`;
    elemenList2.forEach(item => {
        elemenOptions += `
            <option value="${item.elemen_2}">
                ${item.elemen_2}
            </option>`;
    });

    let lokasiOptions = `<option value="">--Sila Pilih Lokasi--</option>`;
    lokasiList.forEach(item => {
        lokasiOptions += `
            <option value="${item.lokasi}">
                ${item.lokasi}
            </option>`;
    });

    
    document.getElementById('btnAddElemen2').addEventListener('click', function () {
    
        const pilihan = document.getElementById('pilihan_e2').value;
        const lokasi  = document.getElementById('lokasi_e2').value;
        const butiran = document.getElementById('butiran_e2').value;
    
        // ❌ Validate input atas dulu
        if (!pilihan || !lokasi || !butiran) {
            Swal.fire({
                icon: 'warning',
                title: 'Elemen 2 tidak lengkap',
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
        <div class="card mt-3" id="elemen2-extra">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                    <button type="button"
                            class="btn btn-sm btn-danger"
                            id="btnDeleteElemen2">
                        <i class="fas fa-trash" title="Hapus Elemen"></i>
                    </button>
                </div>
        
                <div class="row elemen2-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Pilihan :</label>
                            <select class="custom-select form-control"
                                    name="pilihan_e2_extra">
                                ${elemenOptions}
                            </select>
                        </div>
                    </div>
        
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Lokasi :</label>
                            <select class="custom-select form-control"
                                    name="lokasi_e2_extra">
                                ${lokasiOptions}
                            </select>
                        </div>
                    </div>
        
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Butiran :</label>
                            <input type="text"
                                   class="form-control"
                                   name="butiran_e2_extra"
                                   placeholder="Masukkan Butiran">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
        
    
        document.getElementById('elemen2-append')
                .insertAdjacentHTML('beforeend', html);
    
        appended = true;
    
        // 🗑 Delete handler
        document.getElementById('btnDeleteElemen2')
            .addEventListener('click', function () {
    
                document.getElementById('elemen2-extra').remove();
                appended = false;
            });
    });
    
});