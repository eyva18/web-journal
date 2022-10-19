@extends('settingjournal.mainsetting.2admin.layout.layoutsetting')
@section('content')
<div id="aboutsetting" class="tab-pane in active">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="form-card">
                <h3 class="mt-0 mb-4 text-center">Edit Editorial Team</h3>
                <form action="/{{ $account->id }}/dashboard/edit/{{$journal->id}}/category/{{$journalcategory}}/editorialteam/save/{{ $editorialteam->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no" value="{{$editorialteam->name}}" name="name" placeholder="Name Editor"> <label>NAME EDITOR</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group"> <input type="text" name="affiliation" id="exp" value="{{$editorialteam->affiliation}}" placeholder="Affiliation Editor"> <label>AFFILIATION</label> </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group"> <input type="text" name="from" id="exp" value="{{$editorialteam->from}}" placeholder="Where Editor From?"> <label>FROM</label> </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12">
                            <div class="input-group"> <input type="file" name="image" class="placeicon" style="height: 300px;"> <label style="margin-top: -5px; text-transform: uppercase;">Your Old Thumbnail: {{$editorialteam->image ?? 'none'}}</label><img src="/image/editors/{{$editorialteam->image ?? 'none'}}" alt="" style="margin-top: -250px;
                            margin-left: 24px;" height="200px"></div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-12"> <input type="submit" value="SAVE" class="btn btn-success placeicon"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection