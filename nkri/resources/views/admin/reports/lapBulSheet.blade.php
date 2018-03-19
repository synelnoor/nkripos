<div class="row print-pdf">
    <div class="report-page">
        <div class="col-md-12">
            <h2 class="text-center" colspan="6"  style="text-transform: uppercase; margin: 30px; text-align: center;">LAPORAN PENJUALAN BULANAN</h2>
      <tr>
        <td colspan="3">Penjualan dari Tanggal {{ $start}} s/d {{$end}}</td>
      </tr>
       <table class="table table-bordered" >
            <tr>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid "><b>No</b></th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Nama Customer</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Kode Order</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">QTY</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Status</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Tanggal</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Tipe</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Total</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Total Laba</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">code barang</th> 
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">nama barang</th> 
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">qty</th> 
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">harga </th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">subtotal </th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">laba</th> 
            </tr>

            @foreach($lapBulEx as $key=> $item)
            <tr>
            <td colspan="1" style="border:1px solid ">{{ $key+1 }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->nama_customer}}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->code_order }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->jumlah_barang  }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->status  }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->tanggal }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->Pembayaran->tipe_pembayaran }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->total }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->total_laba }}</td>

            @foreach($item->OrderItem as $cek=>$val)
              @if($cek == 0)
              <td colspan="1"  style="border:1px solid " >{{$val->code_barang}}</td>
              <td colspan="1"  style="border:1px solid " >{{$val->nama_barang}}</td>
              <td colspan="1"  style="border:1px solid " >{{$val->qty}}</td>
              <td colspan="1"  style="border:1px solid " >{{$val->harga}}</td>
              <td colspan="1"  style="border:1px solid " >{{$val->subtotal}}</td>
              <td colspan="1"  style="border:1px solid " >{{$val->laba}}</td>

              

              @elseif($cek > 0)

                <tr>

                    <td colspan="1"  style="border:1px solid "></td>
                    <td colspan="1" style="border:1px solid "></td>
                    <td colspan="1" style="border:1px solid "></td>
                    <td colspan="1" style="border:1px solid "></td>
                    <td colspan="1" style="border:1px solid "></td>
                    <td colspan="1" style="border:1px solid "></td>
                    <td colspan="1" style="border:1px solid "></td>
                    <td colspan="1" style="border:1px solid "></td>
                    <td colspan="1" style="border:1px solid "></td>
                    <td colspan="1"  style="border:1px solid " >{{$val->code_barang}}</td>
                    <td colspan="1"  style="border:1px solid " >{{$val->nama_barang}}</td>
                    <td colspan="1"  style="border:1px solid " >{{$val->qty}}</td>
                    <td colspan="1"  style="border:1px solid " >{{$val->harga}}</td>
                    <td colspan="1"  style="border:1px solid " >{{$val->subtotal}}</td>
                    <td colspan="1"  style="border:1px solid " >{{$val->laba}}</td>
                    
                  </tr>
                  @endif
                
                @endforeach
                </tr>
                @endforeach
                <tr>
                  <th  colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Jumlah</th>
                  <th  colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Total</th>
                  <th  colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Total Laba</th>
                </tr>
                <tr>
                  <td colspan="1"  style=" border:1px solid ">{{$totBar}}</td>
                  <td colspan="1"  style=" border:1px solid ">{{number_format($totHar, 2)}}</td>
                  <td colspan="1"  style=" border:1px solid ">{{number_format($totLab, 2)}}</td>
                </tr>

           </table>
         </div>
    </div>
</div>