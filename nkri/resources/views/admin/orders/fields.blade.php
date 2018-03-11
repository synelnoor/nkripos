<!-- Nama Customer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_customer', 'Nama Customer:') !!}
    {!! Form::text('nama_customer', null, ['class' => 'form-control']) !!}
</div>
<!-- dd({{$action}});
 -->@if ($action=='edit')
<div class="form-group col-sm-6">
    {!! Form::label('code_order', 'Code Order:') !!}
    {!! Form::text('code_order', null, ['class' => 'form-control','readonly']) !!}
   <!--  dd({{$action}}); -->
</div>
@else
<!-- Code Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_order', 'Code Order:') !!}
    {!! Form::text('code_order', $code, ['class' => 'form-control','readonly']) !!}
</div>

@endif
<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', [ 'pending' => 'pending','cash' => 'cash'], null, ['class' => 'form-control']) !!}
</div>
@if ($action=='edit')
<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', $order->tanggal, ['class' => 'form-control']) !!}
</div>
@else
<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', $now, ['class' => 'form-control']) !!}
</div>
@endif


<div class="form-group col-sm-12" style="overflow:hidden;">
    <div class="box-body table-responsive no-padding"  >
      <table class="table table-bordered" id="crud_table" border="3">
            <thead>
               
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>total</th>
                <th>Aksi</th>
            </thead>
          <tr class="trbody">
            
            <td  class="barang_id" style="display: none;">
             {!! Form::text('row[0][id]', null, ['class' => 'form-control id ','id'=>'id']) !!}
            {!! Form::text('row[0][barang_id]', null, ['class' => 'form-control barang_id search_text ','id'=>'barang_id']) !!}</td>
             <td  class="nama_barang" >{!! Form::text('row[0][nama_barang]', null, ['class' => 'form-control search_text ','id'=>'nama_barang']) !!}</td>
            <td  class="code_barang">
               {!! Form::text('row[0][code_barang]',null,['class'=>'form-control search_text ','id'=>'code_barang','readonly']) !!}
            </td>
            
            <td  class="qty">
              {!! Form::text('row[0][qty]',null,['class'=>'form-control qty','id'=>'qty'])!!}
            </td>
            <td  class="harga">
              {!! Form::text('row[0][harga]',null,['class'=>'form-control harga  ','id'=>'harga','readonly'])!!}
             </td>
           <td class="harga_beli" style="display:none" ><input type="hidden" name="row[0][harga_beli]" class="form-control harga_beli" id="harga_beli" readonly/></td>
            <td  class="subtotal">
                  {!! Form::text('row[0][subtotal]',null,['class'=>'form-control subtotal ','id'=>'subtotal','readonly'])!!}
                 </td>
            <td>
            <td class="laba" style="display:none">
              <input type="hidden" name="row[0][laba]" class="form-control laba" id="laba">
            </td>
              <button type='button' id="testbtn" name='test' class='btn btn-danger btn-xs test' style="display:none;">
                <i class='fa fa-trash'></i></button>
            </td>
          </tr>

    </table>
     <div>
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>

    </div>
    <br />
    
      
    </div>
</div>



<div class="form-group col-sm-6 pull-right">
  @if ($action =='edit')
 
<!-- Jumlah barang  -->
<div class="form-group col-sm-6 ">
    {!! Form::label('jumlah_barang', 'Jumlah Barang:') !!}
    {!! Form::text('jumlah_barang',$order->jumlah_barang, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  
</div>


<!-- TOTAL Harga -->
<div class="form-group col-sm-6 ">
    {!! Form::label('total', 'Total Harga:') !!}
    {!! Form::text('total',$order->total, ['class' => 'form-control total','id'=>'total','readonly'] ) !!}

</div>
<!-- TOTAL Laba -->
{!! Form::hidden('total_laba',$order->total_laba, ['class' => 'form-control totalLaba','id'=>'totalLaba'] ) !!}
 
    
@else
{{'coba'}}
<!-- Jumlah barang  -->
<div class="form-group col-sm-6 ">
    {!! Form::label('jumlah_barang', 'Jumlah Barang:') !!}
    {!! Form::text('jumlah_barang',null, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  
</div>


<!-- TOTAL Harga -->
<div class="form-group col-sm-6 ">
    {!! Form::label('total', 'Total Harga:') !!}
    {!! Form::text('total',null, ['class' => 'form-control total','id'=>'total','readonly'] ) !!}

</div>
<!-- TOTAL Laba -->
  {!! Form::hidden('total_laba',$order->total_laba, ['class' => 'form-control totalLaba','id'=>'totalLaba'] ) !!}
@endif

</div>

  <div class="form-group col-sm-12">
      <input type="hidden" id="action" value = "{!!@$action!!}" />
      <input type="hidden" id="countdetail" value = "0" />
      {!! Form::hidden('delete_row',null, ['class' => 'form-control','id'=>'delete_row'] ) !!}
      {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
      <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
  </div>


</div>

<?php 

$listoutcode = json_encode(@$outcode);
$listinitems = json_encode(@$data);
$listOrder = json_encode(@$order);
?>


@section('scripts')

<!-- autocomplete -->
   <script>
  
    $(document).on('input', '.search_text', function() {
        // console.log("test")
        src = "{{ route('searchajax') }}";
//console.log(this)
        $(this).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: src,
                        dataType: "json",
                        data: {
                            term : request.term
                        },
                        success: function(data) {
                            response($.map(data,function(item){
                              return{
                                value:item.value,
                                id:item.id,
                                harga_jual:item.harga_jual,
                                harga_beli:item.harga_beli,
                                code_barang:item.code_barang

                              }
                            }));
                          },
                    });
                },
                minLength: 2,
               select: function(event,ui){
                if(ui.item){
                  $this=$(this);
                //console.log($this.parents('.trbody').find('.form-control.barang_id'))
                  $this.val(ui.item.value);
                  $this.parents('.trbody').find('.code_barang > input').val(ui.item.code_barang);
                  $this.parents('.trbody').find('.form-control.barang_id').val(ui.item.id);
                  $this.parents('.trbody').find('.harga > input').val(ui.item.harga_jual);
                  $this.parents('.trbody').find('.harga_beli > input').val(ui.item.harga_beli);
                  // $('.form-control.item_id').val(ui.item.id);
                   // $this('.form-control.item_id').val(ui.item.id);
                   //$this.parents('.trbody').find('.item_id > input').val(ui.item.id);
                  return false;
                  }
                 }
              });
  
  });
       
   </script>

 <!--add row new -->
  <script>
    $(document).ready(function(){
     //var count = 0;

    var action = document.getElementById("action");

     $('#add').click(function(){
       var count = parseInt(document.getElementById("countdetail").value);
       console.log(count)
       count++;   
      document.getElementById("countdetail").value = count;

      var html_code = "<tr id='row"+count+"' class='trbody'>";
       html_code += "<td ' class='barang_id' style='display:none;'><input type='hidden' name='row["+count+"][id]' class='form-control id'/><input type='text' name='row["+count+"][barang_id]' class='form-control barang_id'/><input type='text' name='row["+count+"][order_id]' class='form-control order_id'/></td>";
       html_code += "<td ' class='nama_barang'><input type='text' name='row["+count+"][nama_barang]' class='form-control search_text'/> </td>";
       html_code += "<td ' class='code_barang'><input type='text' name='row["+count+"][code_barang]' class='form-control' readonly/></td>";

       html_code += "<td ' class='qty' ><input type='text' name='row["+count+"][qty]' class='form-control qty' id='qty'  /></td>";
       html_code += "<td ' class='harga' ><input type='text' name='row["+count+"][harga]' class='form-control harga search_text' id='harga' readonly/></td>";
       html_code += "<td ' class='harga_beli' style='display:none' ><input type='hidden' name='row["+count+"][harga_beli]' class='form-control harga_beli' id='harga_beli' readonly/></td>";
       html_code += "<td ' class='subtotal' ><input type='text' name='row["+count+"][subtotal]' class='form-control subtotal' id='subtotal' readonly/></td>";
       html_code += "<td ' class='laba' style='display:none'  ><input type='hidden' name='row["+count+"][laba]' class='form-control laba' id='laba' readonly/></td>";
       html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
       html_code += "</tr>";  
       $('#crud_table').append(html_code);

       //console.log(count)
      
     });
     
      $(document).on('click', '.remove', function(){
        var delete_row = $(this).closest("table");
        var a = $(this).parents('tr').find('.id').val();
       
        var deleted = document.getElementById("delete_row");
      
        if (a != '')
        {
          if (deleted.value == '')
          {
          deleted.value = a;
          }
          else
          {
          deleted.value += '|'+a;
          }
           
        }


        $(this).parents('tr').remove();
        
         reCalculate.call(delete_row);
       });

       $(document).on('click', '#test', function(){
        var row = $(this).closest("table");
         reCalculate.call(row);
       });


     
// <!-- auto hitung -->
    $('#crud_table').on("keyup", "tr", reCalculate);
     // console.log($data)

    var action = '<?php echo @$action; ?>';
            if (action == 'edit')
            {
                
                insertDetail();
            }
      function reCalculate() {
          var grandTotal = 0;
          var grandLaba=0;
          var jumlah=0;
        $(this).closest('#crud_table').find('tr.trbody').each(function() {
              var row =$(this);
              var value = row.find(".form-control.qty").val();
                  value = !isNaN(parseFloat(value)) && isFinite(value) ? parseInt(value) : 0;
              var value2 = row.find(".form-control.harga").val();
              value2 = !isNaN(parseFloat(value2)) && isFinite(value2)  ? parseInt(value2) : 0;
              var value3 = row.find(".form-control.harga_beli").val();
              value3 = !isNaN(parseFloat(value3)) && isFinite(value3) ? parseInt(value3):0;
              
              var total = value * value2;
              var laba = value * value3;
              console.log(total);
              jumlah += value;
              console.log(jumlah);
              grandTotal += total;
              grandLaba += laba;
            $( ".form-control.subtotal",row ).val(total.toFixed(2) );
            $( ".form-control.laba",row ).val(laba.toFixed(2) );
          });

          $(".form-control.jumlah").val(jumlah);
          $(".form-control.total").val( grandTotal.toFixed(2));
          $(".form-control.totalLaba").val(grandLaba.toFixed(2));
      }

       function additionalTable()
     {
      var count = parseInt(document.getElementById("countdetail").value);
      count++;
      document.getElementById("countdetail").value = count;
        var html_code = "<tr id='row"+count+"' class='trbody'>";
       html_code += "<td ' class='barang_id' style='display:none;'><input type='hidden' name='row["+count+"][id]' class='form-control id'/><input type='text' name='row["+count+"][barang_id]' class='form-control barang_id'/><input type='text' name='row["+count+"][order_id]' class='form-control order_id'/></td>";
       html_code += "<td ' class='nama_barang'><input type='text' name='row["+count+"][nama_barang]' class='form-control search_text'/> </td>";
       html_code += "<td ' class='code_barang' readonly><input type='text' name='row["+count+"][code_barang]' class='form-control' readonly/></td>";

       html_code += "<td ' class='qty' ><input type='text' name='row["+count+"][qty]' class='form-control qty' id='qty'  /></td>";
       html_code += "<td ' class='harga' ><input type='text' name='row["+count+"][harga]' class='form-control harga search_text' id='harga' readonly/></td>";
       html_code += "<td ' class='harga_beli' style='display:none'  ><input type='hidden' name='row["+count+"][harga_beli]' class='form-control harga_beli' id='harga_beli' readonly/></td>";
       html_code += "<td ' class='subtotal' ><input type='text' name='row["+count+"][subtotal]' class='form-control subtotal' id='subtotal' readonly/></td>";
        html_code += "<td ' class='laba' style='display:none'  ><input type='hidden' name='row["+count+"][laba]' class='form-control laba' id='laba' readonly/></td>";
       html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
       html_code += "</tr>";  
       $('#crud_table').append(html_code);
     }

 function insertDetail()
    {
        
        details = <?php echo $listinitems; ?>;
        order = <?php echo $listOrder; ?>;
        console.log(order)
        for (i = 0; i < details.length; i++) {
            if (i>0)
            {
                additionalTable();
            }
            $("input[name='row["+i+"][id]']").val(details[i]['id']);
            $("input[name='row["+i+"][barang_id]']").val(details[i]['barang_id']);
            $("input[name='row["+i+"][nama_barang]']").val(details[i]['nama_barang']);
            $("input[name='row["+i+"][code_barang]']").val(details[i]['code_barang']);
            $("input[name='row["+i+"][qty]']").val(details[i]['qty']);
            $("input[name='row["+i+"][harga]']").val(details[i]['harga']);
             $("input[name='row["+i+"][harga_beli]']").val(details[i]['harga_beli']);
            $("input[name='row["+i+"][subtotal]']").val(details[i]['subtotal']);
            $("input[name='row["+i+"][laba]']").val(details[i]['laba']);
            $("input[name='row["+i+"][order_id]']").val(details[i]['order_id']);
            //$("input[name='row["+i+"][total_individual]']").val(details[i]['unit_price']*details[i]['qty']);
        }


        $('#testbtn').click();



        
    }



    });
       
  </script>


  
@stop