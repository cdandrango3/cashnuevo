
function switchview() {
    var type = $('#person-person_type_id').val();
    switch (type) {
        case '1':
            $("label[for='person-name']").html('Nombre');
            $('div .grupo').show();
            break;
        case '2':
            $("label[for='person-name']").html('Razón Social');
            $('div .grupo').show();
            break;
        case '3':
            $('div .grupo').hide();
            $("label[for='person-name']").html('Nombre');
            break;
    }
}
function togglecontent(el) {
    var id = $(el).prop('name');
    $('#' + id).collapse('toggle');
}