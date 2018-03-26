@extends('Layout.main')

@section('head')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/User/jtable.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/sync.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
    <meta name="csrf-token" content="{{ csrf_token()}}">
@endsection

@section('content')
    <!-- info row -->
    <div class="container">
    <div id="table-container" class="row col-lg-12" align="center">
        <div id="message_info" class="col-11 col-sm-11 col-md-8 col-lg-8 col-xl-8" align="center">
            <span>Hi</span> 
            <strong><span id="first_name">{{$user->first_name}}</span> <span id="last_name">{{$user->last_name}}</span></strong>
            <div> We found some publications may related to you, 
                maybe you want add these to Corman! Don't worry you can always edit later</div>
        </div>
    </div>
    
    <!-- loading bar row -->
    <div id="progBar" class="row col-lg-12">
        <div class="progress col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 mb-2" align="center">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span>Please wait, we are syncing publications on your profile...<span class="dotdotdot"></span></span>
            </div>
        </div>
    </div>

    <!-- table row -->
    <div class="row col-lg-12">
        <div id="pub-table" class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11" align="center">
        <a href="{{route('users.index')}}"  >
            <input class="btn btn-primary btn-sm" type="button" value="Skip"> 
        </a>  
        <table id="table">
                
                <input id="addTo" class="btn btn-primary btn-sm" type="button" value="Add to my CORMAN publications">
            </table>
            <div id="PublicationsTableContainer"></div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="">Confirm Syncronize</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">Publications Added</div>
                        <a href="{{route('users.index')}}"><input id="confirmAdd" class="btn btn-primary btn-sm" type="button" value="OK"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="js/jquery-ui.js"></script>
    <script src="js/User/jquery.jtable.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/locale/bootstrap-table-en-US.min.js"></script>
    <script src="js/User/sync.js"></script>
@endsection
