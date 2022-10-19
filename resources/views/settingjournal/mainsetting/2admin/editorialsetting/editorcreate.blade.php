@extends('settingjournal.mainsetting.2admin.layout.layoutsetting')
@section('content')
<div id="aboutsetting" class="tab-pane in active">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="form-card">
                <h3 class="mt-0 mb-4 text-center">Add Editorial Team</h3>
                <form action="/{{ $account->id }}/dashboard/edit/{{$journal->id}}/category/{{$journalcategory}}/editorialteam/save/neweditorialteam" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no" name="name"  placeholder="Name Editor"> <label>EDITOR NAME</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group"> <input type="text" name="affiliation" id="affiliation" placeholder="Affiliation Editor"> <label>AFFILIATION</label> </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group"> <input type="text" name="from" id="from" placeholder="Where Editor From?"> <label>FROM</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <div class="input-group"> <input type="file" name="image" class="placeicon"> <label style="margin-top: -5px">IMAGE</label> </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-12"> <input type="submit" value="SAVE" class="btn btn-success placeicon"> </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                    <center>
                        <div class="col-md-12"><a href="/{{ $account->id }}/dashboard/{{ $journal->id }}/editorialteam">Back</a>  / <a href="/{{$account->id}}/journal">Go To Home</a> / <a href="/{{ $account->id }}/journal/{{$pathjournal}}">Go To Journal</a> </div>
                    </center>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection