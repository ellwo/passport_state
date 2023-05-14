function ajxaproform(e, th, urll) {

    e.preventDefault();

    $(":submit").attr('disable', 'disable');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var formData = new FormData(th);



    $.ajax({
        method: 'post',
        url: urll,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        crossDomain: true,
        success: function(data) {
            console.log(data);
            $("#search_con").html(data.resulteView);
        },
        error: (data) => {

            console.log(data.responseJSON.errors);
            console.log('error');
            //$(".addpro").prepend("<div class='m-4 rounded-lg text-white bg-red-700 '> " + data.message + "</div>");

            // if(dA)

            //  $(".addpro ").addClass("border-red-800 rounded-lg border ");
        }

    });


}