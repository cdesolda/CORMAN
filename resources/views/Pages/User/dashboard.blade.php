@extends('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/Publication/publications.css') }}">
    <link rel="stylesheet" href="{{ url('css/Group/groups.css') }}">
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-7 col-md-7 col-lg-7">
                <div id="titleActivitiesDash">Recent Activities</div>

            </div>
            <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                @foreach($items as $item)
                    <div class="row">
                        <div class="item-title mb-3">
                            {{ $item['groupTitle'] }}
                        </div>
                        <div class="item-container mb-4">
                            <div class="row">
                                @if($item['imagePath']) 
                                    <div class="item-text image col-8">
                                        <div id="title">{{ $item['title'] }}</div>
                                        <div id="subtitle">{{ $item['subtitle'] }}</div>
                                    </div>
                                    <div class="item-image col-4">
                                        <img class="groupImage" src="{{ url($item['imagePath']) }}" alt="Card image cap">
                                    </div>
                                @endif
                                @if(!$item['imagePath']) 
                                    <div class="item-text no-image col-12" data-toggle="modal" data-target="#modalPublication_{{ $item['item']->id }}">
                                        <div id="title">{{ $item['title'] }}</div>
                                        <div id="subtitle">{{ $item['subtitle'] }}</div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalPublication_{{ $item['item']->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="modalPublicationTitle">Publication' View</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @include('Pages.Publication.modal', ['publication'=>$item['item']])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="btn-toolbar justify-content-between">
                                <a id="specialButton" dusk="{{ $item['duskID'] }}" role="button" class="btn btn-warning pull-left"
                                    href="{{ route($item['createRoute']) }}">
                                    <span class="ion-plus-circled ion-plus"> {{ $item['createName'] }}</span>
                                </a>
                                <a href="{{ route($item['viewMoreRoute']) }}" class="btn btn-outline-primary pull-right" role="button">View More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection