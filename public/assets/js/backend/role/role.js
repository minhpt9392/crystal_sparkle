/**
 * Created by ThanhMinh92it on 9/8/2017.
 */
$(function () {
   $(document).on('click','.delete_role', function (e) {
       e.preventDefault();
       console.log($(this).attr('role_name'));
       var role_name = $(this).attr('role_name');
       var role_id = $(this).attr('role_id');
       $.confirm({
           title: 'Confirm!',
           content: 'Are you delete role: '+ role_name +'?',
           buttons: {
               confirm: function () {
                   $.ajax({
                       type: 'GET',
                       url: '/admin/role/delete/' + role_id,
                       success: function (result) {
                           location.href = '/admin/role'
                       }

                   });
               },
               cancel: function () {

               }

           }
       });
   })
});