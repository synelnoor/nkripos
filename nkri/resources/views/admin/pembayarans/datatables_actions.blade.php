{!! Form::open(['route' => ['pembayarans.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
 <a href="{{ url('pembayarans/create/'.$id) }}" class='btn btn-default btn-xs'><i class="fa fa-paypal" style="font-size:18px"></i></a>
    <a href="{{ route('pembayarans.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('pembayarans.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
