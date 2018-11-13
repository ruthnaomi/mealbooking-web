@if(session()->has("success"))
    <div class="ui success message">
        <i class="checkmark box icon"></i>{{session()->get("success")}}
    </div>
@elseif(session()->has("warning"))
    <div class="ui warning message">
        <i class="exclamation icon"></i>{{session()->get("warning")}}
    </div>
@elseif(session()->has("error"))
    <div class="ui error message">
        <i class="exclamation triangle icon"></i>{{session()->get("error")}}
    </div>
@elseif(session()->has("info"))
    <div class="ui info message">
        <i class="exclamation circle icon"></i>{{session()->get("info")}}
    </div>
@else
@endif