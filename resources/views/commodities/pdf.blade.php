<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
  body {
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif;
  }
  th{
    text-align: start;
  }
  .page-break {
    page-break-after: always;
  }
</style>

<body>
  <table>
  <tr>
    <td>
 
      <table class="center" border="1" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
        <th>No</th>
          <th>Kode Barang</th>
          <th>Merk</th>
          <th>Nama Barang</th>
          <th>Tanggal Pembelian</th>
        </tr>
        </thead>
        <tbody>
        @php $no = 1; @endphp
        @foreach($commodities as $key => $commodity)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $commodity->item_code }}</td>
          <td>{{ $commodity->brand }}</td>
          <td>{{ $commodity->name }}</td>
          <td>{{ $commodity->date_of_purchase }}</td>
          @endforeach
        </tr>
        </tbody>
      </table>
      
    </td>
  </tr>
  </table>
</body>

</html>