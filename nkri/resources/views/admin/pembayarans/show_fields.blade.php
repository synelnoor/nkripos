<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pembayaran->id !!}</p>
</div>

<!-- Order Id Field -->
<div class="form-group">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{!! $pembayaran->order_id !!}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{!! $pembayaran->tanggal !!}</p>
</div>

<!-- Bayar Field -->
<div class="form-group">
    {!! Form::label('bayar', 'Bayar:') !!}
    <p>{!! $pembayaran->bayar !!}</p>
</div>

<!-- Kembalian Field -->
<div class="form-group">
    {!! Form::label('kembalian', 'Kembalian:') !!}
    <p>{!! $pembayaran->kembalian !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{!! $pembayaran->total !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pembayaran->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pembayaran->updated_at !!}</p>
</div>

