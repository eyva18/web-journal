@extends('settingjournal.settingissue.layout.issuelayout')
@section('content')
<div id="aboutsetting" class="tab-pane in active">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="form-card">
                <h3 class="mt-0 mb-4 text-center">Edit Issue Journal</h3>
                <form action="/{{ $account->id }}/dashboard/{{ $journal->id }}/issue/save/{{ $issue->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no" name="titleissue" placeholder="Your Journal Title" value="{{ $issue->judul }}"> <label>TITLE ISSUE</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group"> <input type="text" name="volume" id="exp" placeholder="Example: Vol. 00 No. 00 (2022)" value="{{ $issue->volume }}"> <label>VOLUME</label> </div>
                            <label for="published">Published</label>
                            <input type="date" class="form-control" name="published" placeholder=" " value="{{$issue->published}}" min="2022-01-01" max="2030-12-31" />
                        </div>
                        <div class="col-6">
                            <div class="input-group"> <input type="file" name="image" class="placeicon" style="height: 300px;"> <label style="margin-top: -5px; text-transform: uppercase;">Your Old Thumbnail: {{$issue->image ?? 'none'}}</label><img src="/image/Issue/{{$issue->image ?? 'none'}}" alt="" style="margin-top: -250px;
                            margin-left: 24px;" height="200px"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: -90px; margin-left: -35px;">
                        <div class="col-1">
                            <input type="checkbox" id="vehicle1" name="current" value="active" style="margin-top: -50px;" {{ ($issue->current) == "active" ? 'checked' : '' }}>
                        </div>
                        <div class="col-5" style="margin-top: -3px; margin-left: -30px;">
                            <p>Current Issue</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-md-12"> <input type="submit" value="SAVE" class="btn btn-success placeicon"> </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <center>
                            <div class="col-md-12"><a href="/{{ $account->id }}/dashboard/{{ $journal->id }}/issue">Back</a>  / <a href="/{{$account->id}}/journal">Go To Home</a> / <a href="/{{ $account->id }}/journal/{{$pathjournal}}">Go To Journal</a> </div>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection