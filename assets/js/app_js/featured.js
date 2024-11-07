$(document).ready(function () {

    var url = window.location.href;

// Create a URL object
    var urlObj = new URL(url);

// Get the value of the 'cat' parameter
    var catValue = urlObj.searchParams.get('cat');

    var limit = 7;
    var start = 0;
    var action = 'inactive';

    function lazzy_loader(limit)
    {
        var output = '';
        for(var count=0; count<limit; count++)
        {
            output += '<div class="post_data">';
            output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
            output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
            output += '</div>';
        }
        $('#load_data_message').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start)
    {
        $.ajax({
            url:"fetch_job_controller",
            method:"POST",
            data:{limit:limit, start:start, cat:catValue},
            cache: false,
            success:function(data)
            {
                if(data == '')
                {
                    $('#load_data_message').html('<h3>No Job vacancies found</h3>');
                    action = 'active';
                }
                else
                {
                    $('#load_data').append(data);
                    $('#load_data_message').html("");
                    action = 'inactive';
                }
            }
        })
    }

    if(action == 'inactive')
    {
        action = 'active';
        load_data(limit, start);
    }

    $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
        {
            lazzy_loader(limit);
            action = 'active';
            start = start + limit;
            setTimeout(function(){
                load_data(limit, start);
            }, 1000);
        }
    });
    //$('#update_pri_btn').hide();
}); //end of document ready

















