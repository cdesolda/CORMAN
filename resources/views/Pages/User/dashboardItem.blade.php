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
            @if(!$item['imagePath'] && $item['item']) 
                <div class="item-text no-image col-12" data-toggle="modal" data-target="#modalPublication_{{ $item['item']->id }}">
                    <div id="title">{{ $item['title'] }}</div>
                    <div id="subtitle">{{ $item['subtitle'] }}</div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalPublication_{{ $item['item']->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
            @if(!$item['imagePath'] && !$item['item']) 
                <div class="item-text no-image col-12">
                    <div id="title">{{ $item['title'] }}</div>
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