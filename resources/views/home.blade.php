@extends('layouts.admin')
@section('content')
<div class="content" id="user-data">
    @include('data')
</div>
<div class="infinite-scroll text-center">
    <button type="submit" class="more-tails">Show More</button>
</div>
@endsection
@section('scripts')
@parent
<script>
    let defaultPage = 1;
    $(".more-tails").on('click', function () {
        defaultPage++;
        loadMoreData(defaultPage);
    });
    function loadMoreData(defaultPage){
        $.ajax(
            {
                type: "get",
                data: {
                    page: defaultPage,
                },
                beforeSend: function()
                {
                    $('.infinite-scroll').show();
                }
            })
            .done(function(data)
            {
                defaultPage = data.page + 1;
                if(data.html === ""){
                    $('.infinite-scroll').hide();
                    $('.infinite-scroll').html("No more Any records found");
                    return;
                }
                $("#user-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                console.log('server not responding...');
            });
    }
</script>
@endsection
