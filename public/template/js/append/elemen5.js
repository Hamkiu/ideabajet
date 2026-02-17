document.addEventListener('DOMContentLoaded', function () {

    let appended = false;

    const container = document.getElementById('elemen5-append');

    // Tambah row
    document.getElementById('btnAddElemen5').addEventListener('click', function () {

        const pilihan = document.getElementById('pilihan_e5').value;
        const aset    = document.getElementById('aset_e5').value;
        const butiran = document.getElementById('butiran_e5').value;

        if (!pilihan || !aset || !butiran) {
            Swal.fire({
                icon: 'warning',
                title: 'Elemen 5 tidak lengkap',
                text: 'Sila Lengkapkan Pilihan Pertama Dahulu.'
            });
            return;
        }

        if (appended) {
            Swal.fire({
                icon: 'info',
                title: 'Had Tambahan',
                text: 'Maksimum 2 Pilihan Sahaja Bagi Setiap Pilihan'
            });
            return;
        }
        const html = `
        <div class="card mt-3 elemen5-row">
            <div class="card-body">

                <div class="d-flex justify-content-end mb-2">
                    <button type="button" class="btn btn-sm btn-danger btn-delete-elemen5" title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>

                <div class="row elemen5-row">

                    <div class="col-md-4">
                        <label>Pilihan :</label>
                        <select class="custom-select form-control pilihan-extra" name="pilihan_e5[]">
                            ${generateElemenOptions()}
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Aset :</label>
                        <select class="custom-select form-control aset-extra" name="aset_e5[]">
                            <option value="">--Sila Pilih Aset--</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Butiran :</label>
                        <input type="text"
                               class="form-control"
                               name="butiran_e5[]"
                               placeholder="Masukkan Butiran">
                    </div>

                </div>
            </div>
        </div>`;

        // container.insertAdjacentHTML('beforeend', html);
        document.getElementById('elemen5-append').insertAdjacentHTML('beforeend', html);

        appended = true;
    });


    // 🗑 Event Delegation (Delete)
    container.addEventListener('click', function(e) {

        if (e.target.closest('.btn-delete-elemen5')) {
            e.target.closest('.elemen5-row').remove();
            appended = false;
        }

    });


    // 🔄 Dynamic Aset for Extra Rows
    container.addEventListener('change', function(e) {

        if (e.target.classList.contains('pilihan-extra')) {

            const id_elemen5 = e.target.value;
            const row = e.target.closest('.elemen5-row');
            const asetDropdown = row.querySelector('.aset-extra');

            asetDropdown.innerHTML = '<option>Loading...</option>';

            if (!id_elemen5) {
                asetDropdown.innerHTML = '<option value="">--Sila Pilih Aset--</option>';
                return;
            }

            fetch(`${window.APP.getAsetUrl}?id_elemen5=${id_elemen5}`)
                .then(res => res.json())
                .then(data => {

                    asetDropdown.innerHTML = '<option value="">--Sila Pilih Aset--</option>';

                    data.forEach(item => {
                        asetDropdown.innerHTML += 
                            `<option value="${item.id}">${item.nama_aset}</option>`;
                    });

                });

        }

    });

});


// Generate Option Function
function generateElemenOptions() {

    let options = `<option value="">--Sila Pilih Sub Elemen--</option>`;

    elemenList5.forEach(item => {
        options += `<option value="${item.id_elemen5}">
                        ${item.elemen_5}
                    </option>`;
    });

    return options;
}
