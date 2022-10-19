@extends('settingjournal.layout')
@section('content')
<div id="aboutsetting" class="tab-pane in active">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="form-card">
                <h3 class="mt-0 mb-4 text-center">About Journal Setting</h3>
                <form action="/{{ $account->id }}/dashboard/{{ $journal->id }}/aboutjournal/save/{{$about->id ?? 'none'}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no"  name="titleabout" placeholder="Your About Journal Title" value="{{$about->title_about ?? '' }}"> <label>ABOUT JOURNAL TITLE</label> </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <textarea name="content" placeholder="About Your Journal" id="" cols="30" rows="10">{{$about->about ?? ''}}</textarea> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> <input type="submit" value="SAVE" class="btn btn-success placeicon"> </div>
                    </div>
                    <div class="row">
                        <center><div class="col-md-12"><a href="/{{$account->id}}/journal">Go To Home</a> / <a href="/{{ $account->id }}/journal/{{$pathjournal}}">Go To Journal</a> </div></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection