<li class="{{ Request::is('barangs*') ? 'active' : '' }}">
    <a href="{!! route('barangs.index') !!}"><i class="fa fa-edit"></i><span>Barang</span></a>
</li>



<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>

<li class="{{ Request::is('pembayarans*') ? 'active' : '' }}">
    <a href="{!! route('pembayarans.index') !!}"><i class="fa fa-edit"></i><span>Pembayarans</span></a>
</li>


<!-- 
<li class="{{ Request::is('orderItems*') ? 'active' : '' }}">
    <a href="{!! route('orderItems.index') !!}"><i class="fa fa-edit"></i><span>Order Items</span></a>
</li>
 -->