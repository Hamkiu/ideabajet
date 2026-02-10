document.addEventListener('DOMContentLoaded', function () {

    let appended = false;

    let elemenOptions = `<option value="">--Sila Pilih Sub Elemen--</option>`;
    elemenList1.forEach(item => {
        elemenOptions += `
            <option value="${item.elemen_1}">
                ${item.elemen_1}
            </option>`;
    });

    let lokasiOptions = `<option value="">--Sila Pilih Lokasi--</option>`;
    lokasiList.forEach(item => {
        lokasiOptions += `
            <option value="${item.lokasi}">
                ${item.lokasi}
            </option>`;
    });

    
    document.getElementById('btnAddElemen1').addEventListener('click', function () {
    
        const pilihan = document.getElementById('pilihan_e1').value;
        const lokasi  = document.getElementById('bangsa_e1').value;
        const butiran = document.getElementById('butiran_e1').value;
    
        // ❌ Validate input atas dulu
        if (!pilihan || !lokasi || !butiran) {
            Swal.fire({
                icon: 'warning',
                title: 'Maklumat tidak lengkap',
                text: 'Sila lengkapkan semua maklumat sebelum menambah.'
            });
            return;
        }
    
        // 🔒 Limit sekali
        if (appended) {
            Swal.fire({
                icon: 'info',
                title: 'Had Tambahan',
                text: 'Sub elemen hanya boleh ditambah sekali sahaja.'
            });
            return;
        }
    
        // ✅ Append input boleh edit
        const html = `
        <div class="card mt-3" id="elemen1-extra">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                    <button type="button"
                            class="btn btn-sm btn-danger"
                            id="btnDeleteElemen1">
                        <i class="fas fa-trash" title="Hapus Elemen"></i>
                    </button>
                </div>
        
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Pilihan :</label>
                            <select class="custom-select form-control"
                                    name="pilihan_e1_extra">
                                ${elemenOptions}
                            </select>
                        </div>
                    </div>
        
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Lokasi :</label>
                            <select class="custom-select form-control"
                                    name="bangsa_e1_extra">
                                ${lokasiOptions}
                            </select>
                        </div>
                    </div>
        
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Butiran :</label>
                            <input type="text"
                                   class="form-control"
                                   name="butiran_e1_extra"
                                   placeholder="Masukkan Butiran">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
        
    
        document.getElementById('elemen1-append')
                .insertAdjacentHTML('beforeend', html);
    
        appended = true;
    
        // 🗑 Delete handler
        document.getElementById('btnDeleteElemen1')
            .addEventListener('click', function () {
    
                document.getElementById('elemen1-extra').remove();
                appended = false;
            });
    });
    
});