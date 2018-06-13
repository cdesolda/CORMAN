@extends('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/ResearchGroup/researchGroup.css') }}">
    <link rel="stylesheet" href="{{ url('css/ResearchGroup/newCard.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="btn-toolbar justify-content-between col-lg-12">
            <div class="input-group">
                <input id="searchQuery" type="text" class="search-query" placeholder="Search research groups by name..." />
                <a class="searchButton" href="#" id="searchButton">
                    <i class="ion-search"></i> Search
                </a>
            </div>
            <a id="specialButton" role="button" class="btn btn-warning" href="{{ route('researchGroups.create') }}">
                <span class="ion-plus-circled ion-plus"> New Research Group</span>
            </a>
        </div>
        <div id="list_container" class="row no-gutters">
            @foreach($researchGroupList as $researchGroup)
            <div class="col-12 col-md-6">
                @include('Pages.ResearchGroup.single', ['researchGroup'=>$researchGroup, 'isEven'=>$loop->iteration  % 2 == 0])
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle=popover]').popover();
        })
    </script>
@endsection