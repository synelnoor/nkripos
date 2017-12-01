<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $order->id !!}</p>
</div>

<!-- Nama Customer Field -->
<div class="form-group">
    {!! Form::label('nama_customer', 'Nama Customer:') !!}
    <p>{!! $order->nama_customer !!}</p>
</div>

<!-- Code Order Field -->
<div class="form-group">
    {!! Form::label('code_order', 'Code Order:') !!}
    <p>{!! $order->code_order !!}</p>
</div>

<!-- Jumlah Barang Field -->
<div class="form-group">
    {!! Form::label('jumlah_barang', 'Jumlah Barang:') !!}
    <p>{!! $order->jumlah_barang !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{!! $order->total !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $order->status !!}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{!! $order->tanggal !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $order->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $order->updated_at !!}</p>
</div>

