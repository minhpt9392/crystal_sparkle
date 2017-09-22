function editPromotion(id){
    var url = window.location.href;
    url = url + '/edit';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {id: id},
        cache: false,
        type: "POST",
        success: function (data) {
            alert('REJECTED');
            console.log(data);
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}


function deletePromotion(id){
    var url = window.location.href;
    url = url + '/delete';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {id: id},
        cache: false,
        type: "POST",
        success: function (data) {
            alert('DELETED');
            location.reload();
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}

function deleteRoom(id){
    var url = window.location.href;
    url = url + '/delete';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {id: id},
        cache: false,
        type: "POST",
        success: function (data) {
            alert('DELETED');
            location.reload();
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}
function getInfoPackage() {
    var id = $('#type').val();
    var start = $('#start-date').val();
    var url = window.location.href;
    url = url + '/get-package-information';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {id: id},
        cache: false,
        type: "POST",
        success: function (data) {
                $('#start-prepaid').val(data[0]['price']);
                $('#bonus-value').val(data[0]['bonus_value']);
                $('#balance-bonus-value').val(data[0]['bonus_value']);
            if(start != '')
            {
                getTimePeriod();
            }
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}

function getTimePeriod(){
    var id = $('#type').val();
    var url = window.location.href;
    url = url + '/get-time-period';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {id: id},
        cache: false,
        type: "POST",
        success: function (data) {
            $('#start-date').datepicker( 'option', 'dateFormat', 'yy-mm-dd' );
            var date = $('#start-date').datepicker('getDate');
            date.setFullYear(date.getFullYear() + data[0]['time_period']);
            $('#expried').val($.datepicker.formatDate('mm-dd-yy', new Date(date)));
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}

function setPaymentMonthly(){
    var date = $('#set-day').val();
    var url = window.location.href;
    url = url + '/set-payment-mounthly';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {date: date},
        cache: false,
        type: "POST",
        success: function (data) {
            alert('Set day of payment monthly successfully');
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}

function setPaymentBiMonthly(){
    var date1 = $('#set-day-2-1').val();
    var date2 = $('#set-day-2-1').val();
    var url = window.location.href;
    url = url + '/set-payment-bi-mounthly';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {date1: date1, date2: date2},
        cache: false,
        type: "POST",
        success: function (data) {
            alert('Set day of payment bi-monthly successfully');
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}

function setPaymentTriMonthly(){
    var date1 = $('#set-day-3-1').val();
    var date2 = $('#set-day-3-2').val();
    var date3 = $('#set-day-3-3').val();
    var url = window.location.href;
    url = url + '/set-payment-tri-mounthly';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {date1: date1, date2: date2, date3: date3},
        cache: false,
        type: "POST",
        success: function (data) {
            alert('Set day of payment tri-monthly successfully');
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}

$('#start-date').datepicker({
    autoclose: true,
    todayHighlight: true
})
//show datepicker when clicking on the icon
    .next().on(ace.click_event, function(){
    $(this).prev().focus();
});
$('#end-date').datepicker({
    autoclose: true,
    todayHighlight: true
})
//show datepicker when clicking on the icon
    .next().on(ace.click_event, function(){
    $(this).prev().focus();
});

function deletePackageType(id){
    var url = window.location.href;
    url = url + '/delete';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {id: id},
        cache: false,
        type: "POST",
        success: function (data) {
            alert('Deleted Package Type');
            location.reload();
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}


function deleteRefundPackage(id)
{
    var url = window.location.href;
    url = url + '/delete';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {id: id},
        cache: false,
        type: "POST",
        success: function (data) {
            alert('Deleted Refund Package');
            location.reload();
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}

function deleteOnGoingPromotion(id)
{
    var url = window.location.href;
    url = url + '/delete';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {id: id},
        cache: false,
        type: "POST",
        success: function (data) {
            alert('Deleted On Going Promotion');
            location.reload();
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}

function deleteOperatingHours(id)
{
    var url = window.location.href;
    url = url + '/delete';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {id: id},
        cache: false,
        type: "POST",
        success: function (data) {
            alert('Deleted');
            location.reload();
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}
function validateBaseModel(type){
    var component = $('#fixed-component'+type).val();
    var massage   = $('#massage-item'+type).val();
    var package   = $('#package-item'+type).val();
    var product   = $('#product-item'+type).val();

        if(component == '' || isNaN(component))
        {
            alert('Fixed Component cannot be null and must be number');
            $('#fixed-component'+type).focus();
            return false;
        }
        if(massage == '' || isNaN(massage))
        {
            alert('Massage Items cannot be null and must be number');
            $('#massage-item'+type).focus();
            return false;
        }
        if(package == '' || isNaN(package))
        {
            alert('Packages Items cannot be null and must be number');
            $('#package-item'+type).focus();
            return false;
        }
        if(product == '' || isNaN(product))
        {
            alert('Product Items cannot be null and must be number');
            $('#product-item'+type).focus();
            return false;
        }
        return true;
}

function setBaseModel(type){
    var vali = validateBaseModel(type);
    if(vali)
    {
        var role      = $('#role'+type).val();
        var component = $('#fixed-component'+type).val();
        var massage   = $('#massage-item'+type).val();
        var package   = $('#package-item'+type).val();
        var product   = $('#product-item'+type).val();
        var url = window.location.href;
        url = url + '/setBaseModel';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            data: {type: type, role: role, component: component, massage: massage,
                package: package, product: product},
            cache: false,
            type: "POST",
            success: function (data) {
                alert('Set Base Model '+type+' successfully !');
            },
            error: function (reponse) {
                alert("error : " + reponse);
            }
        });
    }
}

function getBaseInfo(type){
    var role = $('#role'+type).val();
    var url  = window.location.href;
    url = url + '/getBaseInfo';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {type: type, role: role},
        cache: false,
        type: "POST",
        success: function (data) {
            $('#fixed-component'+type).val(data[0]['fixed_component']);
            $('#massage-item'+type).val(data[0]['massage']);
            $('#package-item'+type).val(data[0]['package']);
            $('#product-item'+type).val(data[0]['product']);
        },
        error: function (reponse) {
            alert("error : " + reponse);
        }
    });
}