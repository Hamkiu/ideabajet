function getWordCount(text){
    return text.trim().split(/\s+/).filter(Boolean).length;
}

function wordCounter(element, limit, counterClass){

    let words = element.val().trim().split(/\s+/).filter(Boolean);
    let count = words.length;

    let counter = element.closest('.form-group').find(counterClass);

    counter.text(count);

    counter.removeClass('text-danger text-warning');

    if(count >= limit){
        counter.addClass('text-danger');
    }
}

// BLOCK typing jika dah capai limit
$(document).on('keydown', '.cadangan2027, .lokasi_spesifik', function(e){

    let limit = $(this).hasClass('cadangan2027') ? 300 : 150;

    let words = getWordCount($(this).val());

    // allow backspace delete arrow keys
    if(
        e.key === "Backspace" ||
        e.key === "Delete" ||
        e.key === "ArrowLeft" ||
        e.key === "ArrowRight" ||
        e.key === "Tab"
    ){
        return;
    }

    if(words >= limit){
        e.preventDefault();
    }
});


// HANDLE paste
$(document).on('input', '.cadangan2027', function(){

    let limit = 300;
    let words = $(this).val().trim().split(/\s+/).filter(Boolean);

    if(words.length > limit){
        words = words.slice(0, limit);
        $(this).val(words.join(" "));
    }

    wordCounter($(this), limit, '.cadangan_charCount');

});

$(document).on('input', '.lokasi_spesifik', function(){

    let limit = 150;
    let words = $(this).val().trim().split(/\s+/).filter(Boolean);

    if(words.length > limit){
        words = words.slice(0, limit);
        $(this).val(words.join(" "));
    }

    wordCounter($(this), limit, '.lokasi_charCount');

});