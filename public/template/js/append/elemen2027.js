$('#btnAddElemen2027').click(function () {

    let lastRow = $('.elemen-row').last();

    let elemen = lastRow.find('.elemen_2027').val();
    let zon = lastRow.find('.zon_2027').val();
    let lokasi = lastRow.find('.lokasi_spesifik').val().trim();
    let cadangan = lastRow.find('.cadangan2027').val().trim();

    if(elemen === '' || zon === '' || lokasi === '' || cadangan === ''){
        Swal.fire({
            icon: 'warning',
            title: 'Maklumat Tidak Lengkap',
            text: 'Sila lengkapkan maklumat semasa sebelum menambah elemen baru.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6'
        });        
        return;
    }

    let clone = lastRow.clone();

    clone.find('select').val('');
    clone.find('input').val('');
    clone.find('textarea').val('');

    // tambah delete button jika tiada
    if(clone.find('.btn-delete-elemen').length === 0){
        clone.prepend(`
            <div class="col-md-12 text-end mb-2">
                <button type="button" class="btn btn-danger btn-delete-elemen">
                    Padam
                </button>
            </div>
        `);
    }

    $('#elemen2027-container').append('<hr>');
    $('#elemen2027-container').append(clone);

});

$(document).on('click', '.btn-delete-elemen', function(){

    // if(confirm('Padam elemen ini?')){
    //     $(this).closest('.elemen-row').prev('hr').remove();
    //     $(this).closest('.elemen-row').remove();
    // }

        $(this).closest('.elemen-row').prev('hr').remove();
        $(this).closest('.elemen-row').remove();

});