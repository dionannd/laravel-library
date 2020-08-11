<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $header }}</h3>
        <div class="box-tools pull-right" data-toggle="tooltip" title="Kembali">
            {{ $right }}
        </div>
    </div>
    <div class="box-body">
        {{ $slot }}
    </div>
    <div class="box-footer">
        {{ $footer }}
    </div>
</div>