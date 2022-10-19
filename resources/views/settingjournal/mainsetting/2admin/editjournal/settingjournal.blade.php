@extends('settingjournal.mainsetting.2admin.layout.layoutsetting')
@section('content')
<div id="journalsetting" class="tab-pane in active">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="form-card">
                <h3 class="mt-0 mb-4 text-center">Journal Setting</h3>
                <form action="/{{ $account->id }}/dashboard/edit/{{$journal->id}}/category/{{$journalcategory}}/save" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no" name="title" placeholder="Your Journal Title" value="{{ $journal->title ?? null }}"> <label>JOURNAL TITLE</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group"> <textarea name="desc" placeholder="Description Your Journal" id="" cols="30" rows="13">{{ $journal->desc ?? null }}</textarea> </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group"> <input type="file" name="image" class="placeicon" style="height: 300px;"> <label style="margin-top: -5px; text-transform: uppercase;">Your Old Thumbnail: {{$journal->thum ?? null}}</label><img src="/image/cover/{{$journal->thum ?? null}}" alt="" style="margin-top: -250px;
                            margin-left: 24px;" height="200px"></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" name="path" id="exp" placeholder="This will Be Your Journal Domain (Path)" value="{{ $journal->path ?? ' '}}"> <label>JOURNAL PATH</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" name="issn" id="exp" placeholder="Your Journal ISSN" value="{{ $journal->issn ?? ' '}}"> <label>ISSN</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="">Category Journal :</label>
                            <select class="form-select" name="category" id="">
                                <option value=" ">Select The Category</option>
                                <option value="ekonomi" {{ "ekonomi" == $journal->category ? 'selected="selected"' : '' }}>Ekonomi</option>
                                <option value="sport" {{ "sport" == $journal->category ? 'selected="selected"' : '' }}>Sport</option>
                                <option value="computer" {{ "computer" == $journal->category ? 'selected="selected"' : '' }}>Computer</option>
                                <option value="politik" {{ "politik" == $journal->category ? 'selected="selected"' : '' }}>Politik</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="margin-top: 20px;">
                        <label for="">Journal Theme:</label>
                            <div class="input-group"> <select class="form-select" name="theme" aria-label="Default select example">
                                    <option value="" {{ "" == $journal->theme ? 'selected="selected"' : '' }}>
                                        SELECT THEME FOR JOURNAL
                                    </option>
                                    <option value="classy" {{ "classy" == $journal->theme ? 'selected="selected"' : '' }}>
                                        CLASSY
                                    </option>
                                    <option value="novelty" {{ "novelty" == $journal->theme ? 'selected="selected"' : '' }}>
                                        NOVELTY
                                    </option>
                                </select> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-4">
                            <label for="">File Indexing you Journal :</label>
                            <div class="input-group"> <input class="form-control" type="file" name="filejournal" id="filejournal"> <label style="margin-top: -5px; text-transform: uppercase;">Your Old File: {{$journal->filejr ?? null}}</label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4"> <input type="submit" value="SAVE" class="btn btn-success placeicon"> </div>
                    </div>
                    <div class="row">
                        <center>
                            <div class="col-md-12"><a href="/{{$account->id}}/journal">Go To Home</a> / <a href="/{{ $account->id }}/journal/{{$journal->path}}">Go To Journal</a> </div>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- 'ekonomi','sport','computer','politik' -->