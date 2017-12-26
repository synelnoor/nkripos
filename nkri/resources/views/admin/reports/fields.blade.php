<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::text('order_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Barang Id:') !!}
    {!! Form::text('barang_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Orderitem Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderItem_id', 'Orderitem Id:') !!}
    {!! Form::text('orderItem_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Pembayaran Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pembayaran_id', 'Pembayaran Id:') !!}
    {!! Form::text('pembayaran_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('reports.index') !!}" class="btn btn-default">Cancel</a>
</div>
