<div class="group_item forDashboard col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <a class="black">
            <div class="container">
                <div class="row">
                    <div class="col-9 marginReduced"  style="cursor: pointer;">
                        <span id="title">{{ $researchGroup->name }}</span>
                        <br>
                        <span >{{ $researchGroup->description }}</span>
                        <br>
                    </div>
                    <div class="col-3" id="title" style="cursor: pointer;">
                        <img class="groupImage" src="{{ url($researchGroup->picture_path) }}" alt="Card image cap">
                    </div>
                </div>
            </div>
        </a>
    </div>
    </div>