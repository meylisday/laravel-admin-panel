@foreach($tiles as $tile)
    <div class="col-md-4">
        <div class="row space-16">&nbsp;</div>
        <div class="thumbnail">
            <div class="caption text-center">
                <div class="position-relative">
                    <img src="https://az818438.vo.msecnd.net/icons/slack.png" style="width:72px;height:72px;" />
                </div>
                <h4 id="thumbnail-label"><a href="#" target="_blank">{{$tile->name}}</a></h4>
            </div>
        </div>
    </div>
@endforeach
