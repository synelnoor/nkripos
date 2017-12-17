
<!-- In Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('in_code', 'Nomor Surat:') !!}
    {!! Form::text('in_code',null, ['class' => 'form-control'] ) !!}
</div>

<!-- In Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('in_date', 'Tanggal:') !!}
    {!! Form::date('in_date',@$itemin->in_date, ['class' => 'form-control']) !!}
</div>

<!-- Source Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source_id', 'Sumber Penerimaan:') !!}
    {!! Form::select('source_id', $source->pluck('source_name','id'),null, ['class' => 'form-control select2 ']) !!}
</div>

<div class="form-group col-sm-12" style="overflow:hidden;">
    <div class="box-body table-responsive no-padding"  >
      <table class="table table-bordered" id="crud_table" border="3">
            <thead>
               
               <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Kode Produksi</th>
                <th>Expired Date</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Total</th>
                <th>Aksi</th>
            </thead>
           
          <tr class="trbody">
           <td contenteditable="true" class="item_name" style="display: none;">
               {!! Form::text('row[0][id]', null, ['class' => 'form-control id ','id'=>'id']) !!}
               {!! Form::text('row[0][id]', null, ['class' => 'form-control in_id ','id'=>'in_id']) !!}
                {!! Form::text('row[0][item_id]', null, ['class' => 'form-control item_id search_text ','id'=>'item_id']) !!}
            </td>
                <td contenteditable="true" class="item_name">
                {!! Form::text('row[0][item_name]',null, ['class' => 'form-control search_text ','id'=>'item_name']) !!}
                </td>
                <td contenteditable="true" class="unit_name">
                   {!! Form::text('row[0][unit_name]',null,['class'=>'form-control','id'=>'id_unit']) !!}
                </td>
                <td contenteditable="true" class="batch_no">
                  {!! Form::text('row[0][batch_no]',null, ['class' => 'form-control', 'id'=>'batch_no']) !!}
                </td>
                <td contenteditable="true" class="expired_date" >{!! Form::date('row[0][expired_date]',null, ['class' => 'form-control', 'id'=>'expired_date']) !!}
                </td>
               
                <td contenteditable="true" class="qty">
                  {!! Form::text('row[0][qty]',null,['class'=>'form-control qty','id'=>'qty'])!!}
                </td>
                <td contenteditable="true" class="unit_price">
                  {!! Form::text('row[0][unit_price]',null,['class'=>'form-control unit_price ','id'=>'unit_price'])!!}
                 </td>
                 <td contenteditable="true" class="row_total">
                  {!! Form::text('row[0][row_total]',null,['class'=>'form-control row_total ','id'=>'row_total'])!!}
                 </td>
                <td><button type='button' id="testbtn" name='test' class='btn btn-danger btn-xs test' style="display:none;">
                <i class='fa fa-trash'></i></button>
                </td>
          
    </table>
     <div>
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+ Barang</button>
    </div>
   

    </div>
  
    </div>
</div>

<div class="form-group col-sm-6 pull-right">
  
<!-- Jumlah barang  -->
<div class="form-group col-sm-6 ">
    {!! Form::label('total_qty', 'Jumlah Barang:') !!}
    {!! Form::text('total_qty',null, ['class' => 'form-control jumlah','id'=>'jumlah','readonly'] ) !!}  
</div>


<!-- TOTAL Harga -->
<div class="form-group col-sm-6 ">
    {!! Form::label('subtotal', 'Total Harga:') !!}
    {!! Form::text('subtotal',null, ['class' => 'form-control total','id'=>'total','readonly'] ) !!}
</div>


<!-- PPN -->
<div class="form-group col-sm-6" >
    {!! Form::hidden('ppn', 'PPN :') !!}
    {!! Form::hidden('ppn',null, ['class' => 'form-control ppn','id'=>'ppn','readonly'] ) !!}
</div>


<!-- total -->
<div class="form-group col-sm-6 ">
    {!! Form::hidden('total', 'Total :') !!}
    {!! Form::hidden('total',null, ['class' => 'form-control grandtotal','id'=>'total','readonly'] ) !!}
</div>


</div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
     <input type="hidden" id="action" value = "{!!@$action!!}" />
        <input type="hidden" id="countdetail" value = "0" />
        {!! Form::hidden('delete_row',null, ['class' => 'form-control','id'=>'delete_row'] ) !!}
    {!! Form::submit('Save', ['class' => 'btn btn-primary','id'=>'save']) !!}
    <a href="{!! route('itemins.index') !!}" class="btn btn-default">Cancel</a>
</div>


<?php 

$listoutcode = json_encode(@$outcode);
$listinitems = json_encode(@$data);
?>
 
@section('scripts')

<!-- autocomplete -->
   <script>
   
    $(document).on('input', '.search_text', function() {
        // console.log("test")
        src = "{{ route('searchajax') }}";
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
                                unit_id:item.unit_id,
                                unit_name:item.unit_name
                              }
                            }));
                           
                        },
                    });
                },
                minLength: 2,
               select: function(event,ui){
              if(ui.item){
                $this=$(this);
              // console.log()
                $this.val(ui.item.value);
                 $this.parents('.trbody').find('.unit_name > input').val(ui.item.unit_name);
                $this.parents('.trbody').find('.form-control.item_id').val(ui.item.id);
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

      Number.prototype.format_angka = function(n, x, s, c) {
                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                    num = this.toFixed(Math.max(0, ~~n));
                return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
            };
    var action = document.getElementById("action");
            
     // var count = 0;
     $('#add').click(function(){
       var count = parseInt(document.getElementById("countdetail").value);
         document.getElementById("countdetail").value = count;
      count++;
       var html_code = "<tr id='row"+count+"' class='trbody'>";
       html_code += "<td contenteditable='true' style='display:none;' class='item_id'><input type='hidden' name='row["+count+"][id]' class='form-control id'/><input type='text' name='row["+count+"][item_id]' class='form-control item_id search_text '/></td>";
       html_code += "<td contenteditable='true' class='item_name'><input type='text' name='row["+count+"][item_name]' class='form-control search_text '/></td>";
       html_code += "<td contenteditable='true' class='unit_name'><input type='text' name='row["+count+"][unit_name]' class='form-control'/></td>";
       
       html_code += "<td contenteditable='true' class='batch_no' ><input type='text' name='row["+count+"][batch_no]' class='form-control'/></td>";
       html_code += "<td contenteditable='true' class='expired_date' ><input type='date' name='row["+count+"][expired_date]' class='form-control'/></td>";
       
       html_code += "<td contenteditable='true' class='qty' ><input type='text' name='row["+count+"][qty]' class='form-control qty' id='qty'/></td>";
       html_code += "<td contenteditable='true' class='unit_price' ><input type='text' name='row["+count+"][unit_price]' class='form-control unit_price' id='unit_price'/></td>";

        html_code += "<td contenteditable='true' class='row_total' ><input type='text' name='row["+count+"][row_total]' class='form-control row_total' id='row_total'/></td>";
       html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'><i class='fa fa-trash'></i></button></td>";   
       html_code += "</tr>";  
       $('#crud_table').append(html_code);

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

        var action = '<?php echo @$action; ?>';
            if (action == 'edit')
            {
                
                insertDetail();
            }

      function reCalculate() {
          var grandTotal = 0;
          var jumlah=0;
          var total=0;
          var ppn = 0;
          var ppnperc = 0.1;
          var totalppn = 0;
        $(this).closest('#crud_table').find('tr.trbody').each(function() {
              var row =$(this);
              var value = row.find(".form-control.qty").val();
                  value = !isNaN(parseFloat(value)) && isFinite(value) ? parseInt(value) : 0;
              var value2 = row.find(".form-control.unit_price").val();
              value2 = !isNaN(parseFloat(value2)) && isFinite(value2)  ? parseInt(value2) : 0;
              
              var total = value * value2;
              //console.log(total);
              jumlah += value;
              //console.log(jumlah);
              grandTotal += total;
              ppn= grandTotal * ppnperc;
              totalppn = grandTotal +ppn;
            $( ".form-control.row_total",row ).val( total.format_angka(0, 3, ',', ',') );
             $(".total").val(grandTotal.format_angka(0, 3, ',', ','));
          });
          $(".jumlah").val(jumlah);
          $(".ppn").val(ppn.format_angka(0, 3, ',', ','));
          $(".grandtotal").val(totalppn.format_angka(0, 3, ',', ','));
      }


    function additionalTable()
     {
      var count = parseInt(document.getElementById("countdetail").value);
      count++;
      document.getElementById("countdetail").value = count;
        var html_code = "<tr id='row"+count+"' class='trbody'>";
       html_code += "<td contenteditable='true' style='display:none;' class='item_id'><input type='hidden' name='row["+count+"][id]' class='form-control id'/><input type='text' name='row["+count+"][item_id]' class='form-control item_id search_text '/></td>";
       html_code += "<td contenteditable='true' class='item_name'><input type='text' name='row["+count+"][item_name]' class='form-control search_text '/></td>";
       html_code += "<td contenteditable='true' class='unit_name'><input type='text' name='row["+count+"][unit_name]' class='form-control'/></td>";
       
       html_code += "<td contenteditable='true' class='batch_no' ><input type='text' name='row["+count+"][batch_no]' class='form-control'/></td>";
       html_code += "<td contenteditable='true' class='expired_date' ><input type='date' name='row["+count+"][expired_date]' class='form-control'/></td>";
       
       html_code += "<td contenteditable='true' class='qty' ><input type='text' name='row["+count+"][qty]' class='form-control qty' id='qty'/></td>";
       html_code += "<td contenteditable='true' class='unit_price' ><input type='text' name='row["+count+"][unit_price]' class='form-control unit_price' id='unit_price'/></td>";

        html_code += "<td contenteditable='true' class='row_total' ><input type='text' name='row["+count+"][row_total]' class='form-control row_total' id='row_total'/></td>";
       html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'><i class='fa fa-trash'></i></button></td>";   
       html_code += "</tr>";  
       $('#crud_table').append(html_code);
     }


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
       
  </script>


 

@stop