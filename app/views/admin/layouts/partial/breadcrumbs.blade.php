<div class="container-fluid padded">
    <div class="row-fluid">
        <div id="breadcrumbs">
            <div class="breadcrumb-button blue">
                <span class="breadcrumb-label">
                    <i class="icon-home"></i> Home
                </span>
                <span class="breadcrumb-arrow"><span></span></span>
            </div>
            @foreach($bread as $t)
                <div class="breadcrumb-button">
                    <span class="breadcrumb-label">
                        <i class="{{ $t['icon_set'] }}"></i> {{ $t['name'] }}
                    </span>
                    <span class="breadcrumb-arrow"><span></span></span>
                </div>
            @endforeach
        </div>
    </div>
</div>
