<div class="publication_item forDashboard col-lg-12">
        <!-- first row -->
            <div class="row">
                <div class="col-9 col-sm-9 col-md-10 col-lg-10 col-xl-11" id="title" style="cursor: pointer;" data-toggle="modal" data-target="#modalPublication_{{$publication->id}}">{{$publication->title}}</div>
            </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="modalPublication_{{$publication->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalPublicationTitle">Publication' View</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('Pages.Publication.modal', ['publication'=>$publication])
                </div>
            </div>
        </div>
    </div>
    