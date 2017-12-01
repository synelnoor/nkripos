

jQuery(document).ready(function() {
        var id = 0;
      jQuery("#addrow").click(function() {
        id++;           
        var row = jQuery('.samplerow tr').clone(true);
        row.find("input:text").val("");
        row.attr('id',id); 
        row.appendTo('#dynamicTable1');        
        return false;
    });        
        
  $('.remove').on("click", function() {
  $(this).parents("tr").remove();
});
});


// <script >
//          $('#searchname').autocomplete({
//         source:'{!!URL::route('orders.barangAr')!!}',
//           minlength:1,
//           autoFocus:true,
//           select:function(e,ui)
//           {
//               $('#searchname').val(ui.item.value);
//           }
//       });
//     </script>