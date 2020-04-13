$(document).ready(function () {


    //deleting photos
    $('a.delete-photo').click(function () {

        var id = $(this).attr('data-photo-id');
        var input = '<input type="hidden" name="photo_ids[]" value='+id+'>';
        $('#photos-to-be-deleted').append(input);
        $(this).parents('.col-md-3').remove();

    });

    //are you sure
    $('.danger-alert').click(function (e) {
        var target = $(this).attr("data-target");
        $('#are_you_sure #yes').attr('data-target', target);
        $('#are_you_sure').slideDown();
    });

    $('#are_you_sure #no').click(function () {
        $('#are_you_sure').slideUp();
    });

    $('#are_you_sure #yes').click(function () {
        var id = $(this).attr("data-target");
        var form = $('#'+id);
        form.submit();
    });

});

//clone action

$(document).on('click' , '#cloner' , function () {
        var row = $('.clone-row').first();
        var count = $('.clone-row').length;
        var cloned = row.clone() ;
        cloned.find('input[type!=file], textarea').val('');
        cloned.find('input#position').val(count+1);
        cloned.appendTo('#clone-box');
        $('.delete-clone-row').show();
})

$(document).on('click' , '.delete-clone-row' , function () {
       var row = $(this).parents('.clone-row');
       row.remove();
       var count = $('.clone-row').length;
       if (count == 1) {
       $('.delete-clone-row').hide();
       }
});

function deleteBrandPicture(id) {
    var formData = {
        myId : id
    }
    $('.delete-brand').remove();
    sendAjax('delete_brand', formData, null);
}

// ajax function
function sendAjax(method,formData,target){

    var token = $('input[name="_token"]').val();
    formData._token = token;

    var url = documentRoot+'/ajax/'+method;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function(data) {
            if(target && data){
                target.html(data);
            }
        }
    });
}