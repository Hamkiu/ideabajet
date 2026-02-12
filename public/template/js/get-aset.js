document.getElementById('pilihan_e5').addEventListener('change', function() {

    let id_elemen5 = this.value;
    let asetDropdown = document.getElementById('aset_e5');

    asetDropdown.innerHTML = '<option value="">Loading...</option>';

    if(id_elemen5 === ''){
        asetDropdown.innerHTML = '<option value="">-- Sila Pilih Aset --</option>';
        return;
    }

    fetch(`${window.APP.getAsetUrl}?id_elemen5=${id_elemen5}`)
    .then(response => response.json())
        .then(data => {

            asetDropdown.innerHTML = '<option value="">-- Sila Pilih Aset --</option>';

            data.forEach(item => {
                let option = document.createElement('option');
                option.value = item.id;   // simpan id aset
                option.textContent = item.nama_aset;
                asetDropdown.appendChild(option);
            });

        })
        .catch(error => {
            console.error(error);
            asetDropdown.innerHTML = '<option value="">Ralat Load Data</option>';
        });

});
