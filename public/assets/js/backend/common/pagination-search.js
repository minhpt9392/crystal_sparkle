/**
 * Created by ThanhMinh92it on 9/6/2017.
 */
$(function () {
    $(document).on('click','.pagination li', function (e) {
        e.preventDefault();
        var active = $(this).hasClass('active');
        var page = $(this).attr('value');
        var records = $('#show-records').val();
        if(page != "..." && !active)
        {
            $('.pagination li').each(function () {
                var element = $(this);
                if($(element).hasClass('active'))
                {
                    $(element).removeClass('active');
                    return false;
                }
            });
            $(this).addClass('active');

            ajaxLoadData(records,page);
        }
    });
    $('#show-records').bind('change', function () {
        var per_page = $(this).val();
        ajaxLoadData(per_page,1)
    });
    $('#nav-search-input').keyup(function () {
        var records = $('#show-records').val();
        ajaxLoadData(records,1,$(this).val());
    });
});
function ajaxLoadData(records,current_page,search) {
    var url_controller = $('#url-ajax').val();
    var url = url_controller + records +"?page=" + current_page;
    if(search != null)
    {
        url = url_controller + records +"/"+search+"?page=" + current_page;
    }
    $.ajax({
        type: 'GET',
        url: url ,
        beforeSend: function () {
            $('#spiner-load-ajax').modal({backdrop: 'static', keyboard: false, show:'show'});
        },
        success: function (result) {
            //append data in table
            $('.results-table').empty();
            $('.results-table').append(result);

            //append pagination
            $.ajax({
                type: 'GET',
                url: "/admin/pagination/" + current_page + "/" + $('#total-pages-current').val(),
                success: function (re) {
                    $('.widget-page div').empty();
                    $('.widget-page div').append(re);
                    $('#spiner-load-ajax').modal('hide');
                }
            });

        }
    });
}
