<head>
  <script>
  var arCust = new Array();
  arCust.push({kode:"C001",nama:"PT Maju"});
  arCust.push({kode:"C002",nama:"PT Sukasuka"});
  arCust.push({kode:"C003",nama:"PD Bangun"});
  arCust.push({kode:"C004",nama:"PD Jaya"});
  
  function cari_cust() {
    var kode = document.getElementById('txtKode').value;
    var nama = "";
    
    for(var a=0; a < arCust.length; a++) {
      if(arCust[a].kode.toLowerCase()==kode.toLowerCase()) {
        nama = arCust[a].nama;
      }
    }
    document.getElementById("txtNama").value = nama;
  }
  
  
  </script>
</head>
  
<body>
  <table border='0' >
  <tr>
    <td>No.Faktur</td>
    <td>: <input type='text' id='txtFaktur' ></td>
  </tr>
  
  <tr>
    <td>Kode Customer</td>
    <td>: <input type='text' id='txtKode' onblur='cari_cust()' ></td>
  </tr>
  
  <tr>
    <td>Nama Customer</td>
    <td>: <input type='text' id='txtNama' readonly ></td>
  </tr>
  
  <tr>
    <td>Ongkos Kirim</td>
    <td>: <input type='text' id='txtOngkir' ></td>
  </tr>
  </table>
  
  
  <table border='1' rules='all' width='100%'>
    <tr align='center' > 
    <td>No.</td>
    <td>Kode barang</td>
    <td>Nama Barang</td>
    <td>Harga</td>
    <td>Qty</td>
    <td>Jumlah</td>
    </tr>
    
    <tbody id='isi_trx' >
    </tbody>
    
    <tr>
      <td colspan="5">
      <input type='button' value='Tambah' onclick='tambah_baris()' >
      <input type='button' value='Kurang' onclick='kurang_baris()' >
      </td>
      <td>
        <input type="text" id="txtGrandTotal" ></input>
      </td>
    </tr>
  <table>

<script>
var arBarang = new Array();
arBarang.push({kode:"B001",nama:"pensil",harga:"1000"});
arBarang.push({kode:"B002",nama:"pulpen",harga:"2000"});
arBarang.push({kode:"B003",nama:"penggaris",harga:"3500"});
arBarang.push({kode:"B004",nama:"penghapus",harga:"1500"});

var nomor = 1;
function tambah_baris() {
  var str = "";
  
  str += "<tr>";
  str += "<td>" + nomor + "</td>";
  str += "<td><input type='text' id='txtKdBrg"+nomor+"' onblur='cari_barang("+nomor+")' ></td>";
  str += "<td><input type='text' id='txtNmBrg"+nomor+"' ></td>";
  str += "<td><input type='text' id='txtHarga"+nomor+"'  ></td>";
  str += "<td><input type='text' id='txtQty"+nomor+"' onblur='hitung_total("+nomor+")' ></td>";
  str += "<td><input type='text' id='txtJml"+nomor+"' ></td>";
  str += "</tr>";
  
  document.getElementById("isi_trx").innerHTML += str;
  nomor = nomor+1;
}

function cari_barang(nomor) {
  var kode = document.getElementById('txtKdBrg'+nomor).value;
  var nama = "";
  var harga = "";
    
  for(var a=0; a < arBarang.length; a++) {
    if(arBarang[a].kode.toLowerCase()==kode.toLowerCase()) {
      nama = arBarang[a].nama;
      harga = arBarang[a].harga;
      break;
    }
  }
  document.getElementById("txtNmBrg"+nomor).value = nama;
  document.getElementById("txtHarga"+nomor).value = harga;
}

tambah_baris();

function kurang_baris() {
  if(nomor>2) {
    nomor--;
    document.getElementById('isi_trx').deleteRow((nomor-1));
  }
}



function hitung_total(no) {
  var harga= document.getElementById("txtHarga"+no).value;
  var qty= document.getElementById("txtQty"+no).value;
  var hasil= harga*qty;
  document.getElementById('txtJml'+no).value=hasil;

  var GrandTotal= 0;
  var jmlbaris= nomor-1;
  for (var i = 1; i >=jmlbaris; i++) {
    var total= document.getElementById('txtJml'+i).value;

    //GrandTotal+= Number(total);
    alert(total);
  }
 //document.getElementById("txtGrandTotal").value=GrandTotal;

}

hitung_total();
</script>

</body>