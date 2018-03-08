@section('css')
    @include('layouts.datatables_css')
@endsection
<div class="table-responsive">
  <table class="table">
{!! $dataTable->table(['width' => '100%']) !!}
	</table>
</div>
@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection