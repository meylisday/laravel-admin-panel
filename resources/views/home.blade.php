@extends('layouts.admin')
@section('content')
<div class="content">
@foreach($tiles as $tile)
    <div class="col-md-4">
        <div class="row space-16">&nbsp;</div>
            <div class="thumbnail">
                <div class="caption text-center" onclick="location.href='https://flow.microsoft.com/en-us/connectors/shared_slack/slack/'">
                <div class="position-relative">
                    <img src="https://az818438.vo.msecnd.net/icons/slack.png" style="width:72px;height:72px;" />
                </div>
                <h4 id="thumbnail-label"><a href="https://flow.microsoft.com/en-us/connectors/shared_slack/slack/" target="_blank">{{$tile->name}}</a></h4>           
            </div>  
        </div>
    </div>
@endforeach
</div>
@endsection
@section('scripts')
@parent

@endsection