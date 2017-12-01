<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::text('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', null, ['class' => 'form-control']) !!}
</div>

<!-- Bayar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bayar', 'Bayar:') !!}
    {!! Form::text('bayar', null, ['class' => 'form-control']) !!}
</div>

<!-- Kembalian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kembalian', 'Kembalian:') !!}
    {!! Form::text('kembalian', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pembayarans.index') !!}" class="btn btn-default">Cancel</a>
</div>
