<!-- Nama Customer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_customer', 'Nama Customer:') !!}
    {!! Form::text('nama_customer', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_order', 'Code Order:') !!}
    {!! Form::text('code_order', $code, ['class' => 'form-control','readonly']) !!}
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['cash' => 'cash', 'pending' => 'pending'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', null, ['class' => 'form-control']) !!}
</div>


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
            
            <td contenteditable="true" class="barang_id" style="display: none;">{!! Form::text('row[0][barang_id]', null, ['class' => 'form-control barang_id search_text ','id'=>'barang_id']) !!}</td>
             <td contenteditable="true" class="nama_barang" >{!! Form::text('row[0][nama_barang]', null, ['class' => 'form-control search_text ','id'=>'nama_barang']) !!}</td>
            <td contenteditable="true" class="code_barang">
               {!! Form::text('row[0][code_barang]',null,['class'=>'form-control search_text ','id'=>'code_barang']) !!}
            </td>
            
            <td contenteditable="true" class="qty">
              {!! Form::text('row[0][qty]',null,['class'=>'form-control qty','id'=>'qty'])!!}
            </td>
            <td contenteditable="true" class="harga">
              {!! Form::text('row[0][harga]',null,['class'=>'form-control harga  ','id'=>'harga'])!!}
             </td>
            <td contenteditable="true" class="ptotal">
                  {!! Form::text('row[0][ptotal]',null,['class'=>'form-control ptotal ','id'=>'ptotal'])!!}
                 </td>
            <td></td>
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


</div>

  <div class="form-group col-sm-12">
      {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
      <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
  </div>


</div>


<?php 

$listoutcode = json_encode($outcode);
$listinitems = json_encode($data);
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
     var count = 0;
     $('#add').click(function(){
      count++;
      var html_code = "<tr id='row"+count+"' class='trbody'>";
       html_code += "<td contenteditable='true' class='barang_id' style='display:none;'><input type='text' name='row["+count+"][barang_id]' class='form-control barang_id'/></td>";
       html_code += "<td contenteditable='true' class='nama_barang'><input type='text' name='row["+count+"][nama_barang]' class='form-control search_text'/> </td>";
       html_code += "<td contenteditable='true' class='code_barang'><input type='text' name='row["+count+"][code_barang]' class='form-control'/></td>";

       html_code += "<td contenteditable='true' class='qty' ><input type='text' name='row["+count+"][qty]' class='form-control qty' id='qty'  /></td>";
       html_code += "<td contenteditable='true' class='harga' ><input type='text' name='row["+count+"][harga]' class='form-control harga search_text' id='harga'/></td>";
       html_code += "<td contenteditable='true' class='ptotal' ><input type='text' name='row["+count+"][ptotal]' class='form-control ptotal' id='ptotal'/></td>";
       html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
       html_code += "</tr>";  
       $('#crud_table').append(html_code);


         function insertDetail()
    {
        
        details = <?php echo $listinitems; ?>;
        console.log(details);
        for (i = 0; i < details.length; i++) {
            if (i>0)
            {
                additionalTable();
            }
            $("input[name='row["+i+"][item_name]']").val(details[i]['item_name']);
            $("input[name='row["+i+"][item_id]']").val(details[i]['item_id']);
            $("input[name='row["+i+"][unit_name]']").val(details[i]['unit_name']);
            $("input[name='row["+i+"][batch_no]']").val(details[i]['batch_no']);
            $("input[name='row["+i+"][expired_date]']").val(details[i]['expired_date']);
            $("input[name='row["+i+"][qty]']").val(details[i]['qty']);
            $("input[name='row["+i+"][unit_price]']").val(details[i]['unit_price']);
            $("input[name='row["+i+"][id]']").val(details[i]['id']);
            //$("input[name='row["+i+"][total_individual]']").val(details[i]['unit_price']*details[i]['qty']);
        }

        $('#testbtn').click();



        
    }

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

       $(document).on('click', '.test', function(){
        var row = $(this).closest("table");
         reCalculate.call(row);
       });

     
// <!-- auto hitung -->
    $('#crud_table').on("keyup", "tr", reCalculate);
      function reCalculate() {
          var grandTotal = 0;
          var jumlah=0;
        $(this).closest('#crud_table').find('tr.trbody').each(function() {
              var row =$(this);
              var value = row.find(".form-control.qty").val();
                  value = !isNaN(parseFloat(value)) && isFinite(value) ? parseInt(value) : 0;
              var value2 = row.find(".form-control.harga").val();
              value2 = !isNaN(parseFloat(value2)) && isFinite(value2)  ? parseInt(value2) : 0;
              
              var total = value * value2;
              //console.log(total);
              jumlah += value;
              //console.log(jumlah);
              grandTotal += total;
            $( ".form-control.ptotal",row ).val(total.toFixed(2) );
          });
          $(".jumlah").val(jumlah);
          $(".total").val( grandTotal.toFixed(2));
      }




    });
       
  </script>


  
@stop