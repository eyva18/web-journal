@extends('settingjournal.mainsetting.admin.layout.layoutadmin')
@section('content')
<div id="aboutsetting" class="tab-pane in active">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="form-card">
                <h3 class="mt-0 mb-4 text-center">Edit Account</h3>
                <form action="/{{ $account->id }}/dashboard/admin/account/save/{{$accountedit->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no" name="username" placeholder="USERNAME ACCOUNT" value="{{$accountedit->username}}"> <label>USERNAME</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no" name="password" placeholder="PASSWORD ACCOUNT" value="{{$accountedit->password}}"> <label>PASSWORD</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <div class="input-group"> <select class="form-select" name="role" aria-label="Default select example">
                                    <option value="" {{ "" == $accountedit->status ? 'selected="selected"' : '' }} selected>
                                        CHOOSE THE ROLE ACCOUNT
                                    </option>
                                    <option value="guest" {{ "guest" == $accountedit->status ? 'selected="selected"' : '' }}>
                                        GUEST
                                    </option>
                                    <option value="member" {{ "member" == $accountedit->status ? 'selected="selected"' : '' }}>
                                        MEMBER
                                    </option>
                                    <option value="admin" {{ "admin" == $accountedit->status ? 'selected="selected"' : '' }}>
                                        ADMIN
                                    </option>
                                </select> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <div class="input-group"> <select class="form-select" name="idjournal" aria-label="Default select example">
                            <option value="" selected>JOURNAL FOR ACCOUNT MEMBER</option>
                                    @foreach($journal as $item)
                                    <option value="{{$item->id}}" {{ $item->id == $accountedit->id_journal  ? 'selected="selected"' : '' }}>{{$item->title}}</option>
                                    @endforeach
                                </select> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> <input type="submit" value="SAVE" class="btn btn-success placeicon"> </div>

                    </div>
                    <div class="row" style="margin-top: 10px;">
                    <center>
                        <div class="col-md-12"><a href="/{{ $account->id }}/dashboard/admin/account">Back</a>  / <a href="/{{$account->id}}/journal">Go To Home</a> </div>
                    </center>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection