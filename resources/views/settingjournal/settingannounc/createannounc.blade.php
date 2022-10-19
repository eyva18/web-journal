@extends('settingjournal.settingannounc.layout.layoutannoun')
@section('content')
<div id="aboutsetting" class="tab-pane in active">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="form-card">
                <h3 class="mt-0 mb-4 text-center">Add Announcement</h3>
                <form action="/{{ $account->id }}/dashboard/{{ $journal->id }}/announcement/save/newannouncement" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no" name="title" placeholder="Announcement Title"> <label>TITLE ANNOUNCEMENT</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="published">Published</label>
                            <input type="date" class="form-control" name="published" placeholder=" " value="2022-09-01" min="2022-01-01" max="2030-12-31"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <textarea name="content" placeholder="What Your Announcement?" id="" cols="30" rows="10"></textarea> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> <input type="submit" value="SAVE" class="btn btn-success placeicon"> </div>

                    </div>
                    <div class="row" style="margin-top: 10px;">
                    <center>
                        <div class="col-md-12"><a href="/{{ $account->id }}/dashboard/{{ $journal->id }}/Announcement">Back</a>  / <a href="/{{$account->id}}/journal">Go To Home</a> / <a href="/{{ $account->id }}/journal/{{$pathjournal}}">Go To Journal</a> </div>
                    </center>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection