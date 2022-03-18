template = '';
function deldetail(obj, callback) {
    if (counttr() > 2) {
        $(obj).closest('tr').remove();
    } else {
        alert('Se requieren como mínimo 2 registros.');
    }
    callback();
}

function checkmyform(e) {
    var result = true;
    if (($('.debit_value').html() != $('.credit_value').html())) {
        result = false;
    } else {
        $('#tdetail .account').each(function () {
            var group = $(this).prop('id')+'_group';
            if ($(this).val() < 1) {
                $('#'+group).addClass('has-error');
                result = false; 
            } else $('#'+group).removeClass('has-error');
        });
    }
    if ($('#myform .has-error').length > 0) {
        result = false;
    }
    if (result) {
        $('#tdetail input').prop('disabled', false);
        return true;
    } else {
        e.preventDefault();
        return false;
    }
}

function checkval() {
    $('.debit').each(function () {
        var temp = $(this).val();
        if (Number.isNaN(temp)) {
            $(this).val(0);
            $(this).closest('tr').find('.credit').prop("disabled", false);
        } else if (temp > 0) {
            $(this).closest('tr').find('.credit').prop("disabled", true);
        } else {
            $(this).val(0);
            $(this).closest('tr').find('.credit').prop("disabled", false);
        }
    });

    $('.credit').each(function () {
        var temp = $(this).val();
        if (Number.isNaN(temp)) {
            $(this).val(0);
            $(this).closest('tr').find('.debit').prop("disabled", false);
        } else if (temp > 0) {
            $(this).closest('tr').find('.debit').prop("disabled", true);
        } else {
            $(this).val(0);
            $(this).closest('tr').find('.debit').prop("disabled", false);
        }
    });

    caltotal();
}

function caltotal() {
    var debit = credit = 0.0;
    $('.debit').each(function () {
        var temp = $(this).val();
        if (!Number.isNaN(temp)) {
            temp = parseFloat(temp);
            debit += temp;
        }
    });
    $('.credit').each(function () {
        var temp = $(this).val();
        if (!Number.isNaN(temp)) {
            temp = parseFloat(temp);
            credit += temp;
        }
    });
    debit = (Math.round(debit * 100) / 100).toFixed(2);
    credit = (Math.round(credit * 100) / 100).toFixed(2);
    if (credit==debit){
        $('.debit_value').html('$' + debit.toString());
        $('.credit_value').html('$' + credit.toString());
    } else {
        $('.debit_value').html('<div class="text-danger">$' + debit.toString()+'</div>');
        $('.credit_value').html('<div class="text-danger">$' + credit.toString()+'</div>');
    }
}

function counttr() {
    return $('#tdetail tr').length;
}

function adddetail() {
    last_id = $("#tdetail tr").last().prop("id");
    last_id = last_id.split('row');
    last_id = parseInt(last_id[1]);
    $('#account' + last_id).select2("destroy");
    $('#costcenter' + last_id).select2("destroy");
    $('#account' + last_id).removeAttr("style");
    $('#account' + last_id).removeAttr("data-s2-options");
    $('#account' + last_id).removeAttr("data-krajee-select2");
    $('#costcenter' + last_id).removeAttr("data-s2-options");
    $('#costcenter' + last_id).removeAttr("data-krajee-select2");
    $('#costcenter' + last_id).removeAttr("style");
    var data = $("#tdetail tr").last().prop("outerHTML");
    var $dat
    data = data.replace('account' + last_id+'_group', 'account' + (last_id + 1)+'_group');
    data = data.replace('row' + last_id, 'row' + (last_id + 1));
    data = data.replace('account' + last_id, 'account' + (last_id + 1));
    data = data.replace('costcenter' + last_id, 'costcenter' + (last_id + 1));
    $('#tdetail').append(data);
    jQuery.when(jQuery('#account' + last_id).select2(s2account_data)).done(initS2Loading('account' + last_id,'s2options'));
    jQuery.when(jQuery('#costcenter' + last_id).select2(s2costcenter_data)).done(initS2Loading('costcenter' + last_id,'s2options'));
    last_id++;
    jQuery.when(jQuery('#account' + last_id).select2(s2account_data)).done(initS2Loading('account' + last_id,'s2options'));
    jQuery.when(jQuery('#costcenter' + last_id).select2(s2costcenter_data)).done(initS2Loading('costcenter' + last_id,'s2options'));
    assignKeypress();
}
function assignKeypress() {
    $('.debit').keyup(caltotal);
    $('.credit').keyup(caltotal);
    $('.debit').blur(checkval);
    $('.credit').blur(checkval);
}
