@extends('settingjournal.settingissue.layout.issuelayout')
@section('content')
<div id="aboutsetting" class="tab-pane in active">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="form-card">
                <h3 class="mt-0 mb-4 text-center">Add Article Journal</h3>
                <form action="/{{ $account->id }}/dashboard/{{ $journal->id }}/article/save/newarticle" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no" name="titlearticle" placeholder="Your Article Title"> <label>TITLE ARTICLE</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group"> <input type="text" name="author" id="exp" placeholder="Author Article"> <label>AUTHOR</label> </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group"> <input type="file" name="image" class="placeicon"> <label style="margin-top: -5px">IMAGE</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <div class="input-group"> <select class="form-select" name="idissue" aria-label="Default select example">
                            <option selected value=" ">Open this select menu</option>
                                    @foreach($issue as $item)
                                    <option value="{{$item->id}}">{{$item->volume ?? 'Volume'}}: {{$item->judul}}</option>
                                    @endforeach
                                </select> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <textarea name="abstract" placeholder="ABSTRACT ARTICLE" id="" cols="30" rows="5"></textarea> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <textarea name="isi" placeholder="FULL ARTICLE" id="" cols="30" rows="10"></textarea> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <label for="">File Article Journal :</label>
                            <div class="input-group"> <input class="form-control" type="file" name="filearticle" id="filearticle"> <label style="margin-top: -5px; text-transform: uppercase;">Your Old File: NONE</label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> <input type="submit" value="SAVE" class="btn btn-success placeicon"> </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                    <center>
                        <div class="col-md-12"><a href="/{{ $account->id }}/dashboard/{{ $journal->id }}/Article">Back</a>  / <a href="/{{$account->id}}/journal">Go To Home</a> / <a href="/{{ $account->id }}/journal/{{$pathjournal}}">Go To Journal</a> </div>
                    </center>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection