@extends('settingjournal.mainsetting.admin.layout.layoutadmin')
@section('content')
<div id="aboutsetting" class="tab-pane in active">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="form-card">
                <h3 class="mt-0 mb-4 text-center">Add New Account</h3>
                <form action="/{{ $account->id }}/dashboard/admin/account/newaccount" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no" name="username" placeholder="USERNAME ACCOUNT"> <label>USERNAME</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group"> <input type="text" id="cr_no" name="password" placeholder="PASSWORD ACCOUNT"> <label>PASSWORD</label> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" style="margin-bottom: 20px;">
                            <div class="input-group"> <select class="form-select" name="role" aria-label="Default select example">
                                    <option value="" selected>
                                        CHOOSE THE ROLE ACCOUNT
                                    </option>
                                    <option value="guest">
                                        GUEST
                                    </option>
                                    <option value="member">
                                        MEMBER
                                    </option>
                                    <option value="admin">
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
                                    <option value="{{$item->id}}">{{$item->title}}</option>
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