@extends('settingjournal.mainsetting.admin.layout.layoutadmin')
@section('content')
<div id="aboutsetting" class="tab-pane in active">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="form-card">
                <h3 class="mt-0 mb-4 text-center">Admin Page Journal</h3>
                <div class="listPanel">
                    <div class="listPanel__header">
                        <div class="pkpHeader -isOneLine"><span class="pkpHeader__title">
                                <h2 style="font-size:30px"><strong>Journal</strong></h2>
                                <!---->
                            </span>
                            <div class="pkpHeader__actions">
                                <a href="/{{ $account->id ?? 'none'}}/dashboard/admin/journal/createnew" class="pkpButton" id="addbutton" style="text-decoration: none; color: #198754 !important;"> Add Journal </a>
                            </div>
                        </div>
                    </div>
                    <div class="listPanel__body">
                        <!---->
                        <div class="listPanel__items">
                            <ul class="listPanel__itemsList">
                                @foreach($journal as $item)
                                <li class="listPanel__item">
                                    <div class="listPanel__itemSummary">
                                        <div class="listPanel__itemIdentity">
                                            <div class="listPanel__itemTitle"> {{$item->title ?? 'none'}} </div>
                                            <!---->
                                        </div>
                                        <div class="listPanel__itemActions">
                                            <a href="/{{ $account->id ?? 'none'}}/dashboard/admin/journal/edit/{{$item->id}}" class="pkpButton" style="text-decoration: none; color: #198754 !important;"> Edit </a> <form action="/{{ $account->id ?? 'none'}}/dashboard/admin/journal/delete/{{$item->id}}" method="post"> @csrf<button class="pkpButton pkpButton--isWarnable" onclick="return confirm('Are you sure you want to Remove?');" style="text-decoration: none; color: red !important;"> Delete </button></form>
                                        </div>
                                    </div>
                                    <!---->
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!---->
                </div>
                <div class="row" style="margin-top: 10px;">
                    <center>
                        <div class="col-md-12"><a href="/{{$account->id ?? 'none'}}/journal">Go To Home</a> </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection