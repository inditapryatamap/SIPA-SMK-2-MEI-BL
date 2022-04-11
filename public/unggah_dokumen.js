$('#select-kegiatan').on('change', function() {
    $('#dokumen-btn-selanjutnya').show();
    console.log('this.value :>> ', $(this).find('option:selected').attr('optionAtribute'));
    handleChangeQuestionReview($(this).find('option:selected').attr('optionAtribute'))
});

console.log('dataQuery :>> ', dataQuery);

function handleChangeQuestionReview(tipe) {
    let html = '';
    let increment = 0;
    for (let i = 0; i < dataQuery.review_pertanyaan.length; i++) {
        if (dataQuery.review_pertanyaan[i].tipe_pertanyaan == tipe || dataQuery.review_pertanyaan[i].tipe_pertanyaan == 'semua') {
            html += '<div class="form-group pb-5">';
            html += '<label>'+ dataQuery.review_pertanyaan[i].pertanyaan +'</label>';
            html += '<div class="border-top mt-3">';
            html += '<div class="kt-radio-inline centered-radio-cs mt-4">';
            html += '<label class="kt-radio">';
            html += '<input class="rd-check" type="radio" value="0" dataRadioName="sangat_rendah" name="question_'+ increment +'"> Sangat Rendah';
            html += '<span></span>';
            html += '</label>';
            html += '<label class="kt-radio">';
            html += '<input class="rd-check" type="radio" value="1" dataRadioName="rendah" name="question_'+ increment +'"> Rendah';
            html += '<span></span>';
            html += '</label>';
            html += '<label class="kt-radio">';
            html += '<input class="rd-check" type="radio" value="2" dataRadioName="tinggi" name="question_'+ increment +'"> Tinggi';
            html += '<span></span>';
            html += '</label>';
            html += '<label class="kt-radio">';
            html += '<input class="rd-check" type="radio" value="3" dataRadioName="sangat_tinggi" name="question_'+ increment +'"> Sangat Tinggi';
            html += '<span></span>';
            html += '</label>';
            html += '</div>';
            html += '<span class="form-text text-muted">Pilih salah satu</span>';
            html += '</div>';
            html += '</div>';
            increment++;
            wizardRadioGlobalCount++;
        }
    }

    $('#increment-question').val(parseInt(increment) - 1);

    $('#generateQuestionReview').html(html);
}

$('.rd-check').on('change', function() {
    console.log('this.value :>> ', $(this).find('option:selected').val());
});

