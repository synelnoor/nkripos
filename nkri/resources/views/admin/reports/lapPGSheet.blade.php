<div class="row print-pdf">
    <div class="report-page">
        <div class="col-md-12">
            <h2 class="text-center" colspan="6"  style="text-transform: uppercase; margin: 30px; text-align: center;">LAPORAN PENGELUARAN</h2>
      <tr>
        <td colspan="3">Pengeluaran dari Tanggal {{ $start}} s/d {{$end}}</td>
      </tr>
       <table class="table table-bordered" >
            <tr>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid "><b>No</b></th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Nama Supplier</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Kode Supplier</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">QTY</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Status</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Tanggal</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Deskripsi</th>
            <th colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Total</th>
            </tr>

            @foreach($lapPGEx as $key=> $item)
            <tr>
            <td colspan="1" style="border:1px solid ">{{ $key+1 }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->nama_supplier}}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->code_supplier }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->jumlah_barang  }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->status  }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->tanggal }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->deskripsi }}</td>
            <td colspan="1" style="border:1px solid ">{{ $item->total }}</td>
           
          
                @endforeach
                <tr>
                  <th  colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Jumlah</th>
                  <th  colspan="1"  style="background-color: #d1e0e0; border:1px solid ">Total</th>
                 
                <tr>
                  <td colspan="1"  style=" border:1px solid ">{{$totBar}}</td>
                  <td colspan="1"  style=" border:1px solid ">{{number_format($totHar, 2)}}</td>
                 

           </table>
         </div>
    </div>
</div>s