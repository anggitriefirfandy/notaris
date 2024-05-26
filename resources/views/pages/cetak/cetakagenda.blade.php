<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Cetak Jadwal</title>
   <style>
      table {
         border-collapse: collapse;
      }
      .table {
         width: 100%;
         margin-bottom: 1rem;
         color: #212529;
         margin-top: 60px;
      }
      .table th,
      .table td {
         padding: 5pt;
         vertical-align: top;
         border-top: 1px solid #dee2e6;
         text-align: left;
         width: 50%;
      }
      .table-bordered {
         border: 1px solid #000000;
      }
      .table-bordered th,
      .table-bordered td {
         border: 1px solid #000000;
      }
      .table-bordered thead th,
      .table-bordered thead td {
         border-bottom-width: 2px;
      }
      .page-break {
         page-break-after: always;
      }
      @page {
         margin: 0cm 0cm;
      }
      body {
         margin-top: 60pt;
         margin-left: 30pt;
         margin-right: 30pt;
         font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
            "Helvetica Neue", Arial, "Noto Sans", sans-serif,
            "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
            "Noto Color Emoji";
         font-size: 6pt;
         font-weight: 400;
         line-height: 1.5;
         color: #212529;
         text-align: left;
         background-color: #fff;
      }
      .text-center {
         text-align: center !important;
      }
      b,
      strong {
         font-weight: bolder;
      }
      .text-uppercase {
         text-transform: uppercase !important;
      }
      .text-left {
         text-align: left;
      }
      .text-right {
         text-align: right;
      }
      html {
         font-family: sans-serif;
         line-height: 1.15;
         -webkit-text-size-adjust: 100%;
         -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      }
      .float-left {
         float: left !important;
      }
      .float-right {
         float: right !important;
      }
      .float-none {
         float: none !important;
      }
      .fw-bold {
         font-weight: 700 !important;
      }
      h1,
      .h1 {
         font-size: 2.5rem;
      }
      h2,
      .h2 {
         font-size: 2rem;
      }
      h3,
      .h3 {
         font-size: 1.75rem;
      }
      h4,
      .h4 {
         font-size: 1.5rem;
      }
      h5,
      .h5 {
         font-size: 1.25rem;
      }
      h6,
      .h6 {
         font-size: 1rem;
      }
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      .h1,
      .h2,
      .h3,
      .h4,
      .h5,
      .h6 {
         margin-bottom: 0.5rem;
         font-weight: 500;
         line-height: 1.2;
      }
      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
         margin-top: 0;
         margin-bottom: 0.5rem;
      }
      .d-flex {
         display: -ms-flexbox !important;
         display: flex !important;
      }
      .flex-row {
         -ms-flex-direction: row !important;
         flex-direction: row !important;
      }
      .flex-column {
         -ms-flex-direction: column !important;
         flex-direction: column !important;
      }
      .flex-row-reverse {
         -ms-flex-direction: row-reverse !important;
         flex-direction: row-reverse !important;
      }
      .flex-column-reverse {
         -ms-flex-direction: column-reverse !important;
         flex-direction: column-reverse !important;
      }
      .p-2 {
         padding: 0.5rem !important;
      }
      header {
         position: fixed;
         top: 10pt;
         left: 0pt;
         right: 55pt;
         height: 1cm;
         background-color: #ffffff;
         text-align: center;
         line-height: 1.5pt;
      }
      /** Define the footer rules **/
      footer {
         position: fixed;
         bottom: 0cm;
         left: 0cm;
         right: 0cm;
         height: 2cm;
         background-color: #ffffff;
         text-align: center;
         line-height: 1.5cm;
      }
      .img {
         margin-left: 60px;
      }
      .bordin {
         border: 2px solid rgb(5, 5, 5);
         padding: 2pt;
         width: 90px;
         height: 90px;
      }
      .center-div {
         display: flex;
         justify-content: center;
         align-items: center;
      }
   </style>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<header>
         <div class="center-div">
            <img
               src="https://res.cloudinary.com/dk55ik2ah/image/upload/v1716350971/logonotaris_etgr2e.png"
               class="img float-left"
               width="90"
               alt=""
            />
            <!-- <h6 style="background-color: aqua !important;">FORMULIR 6C CHARACTER</h6> -->
            <p
               style="
                  font-size: 20px;
                  margin-left: 15px;
                  margin-top: 10px;
                  font-weight: bold;
               "
               class="float-left mr-4"
            >
            <br>
            <br>
            <br>
            <br>

               <br />
               <br />
               <br />
               <br />
               <br />
               <br />
               Daftar Agenda
               <br />
               <br />
               <br />
               <br />
               <br />
               <br />
               <br />
               <br />
               <br />
               <br />
               Tahun {{\Carbon\Carbon::now()->subyear()->format('Y')}}
               <br />
               <br />
               <br />
               <br />
               <br />
               <br />
               <br />
               <br />
               <br />
               NOTARIS HEPPY BANDARANAIKE, SH, MKn
               <br />
               <br />
               <br />
               <br />
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>
               <br>

               <br />
               <br />
               <br />
               <br />
               <br />
            </p>
         </div>
      </header>

      <table class="table table-bordered" width="50%" border="1">
    <thead>
        <tr style="background-color: darkgray">
            <th style="text-align:center" colspan="2">daftar proses agenda</th>
        </tr>
    </thead>
    <tbody>
        @php
            function formatValue($key, $value) {
                // Ubah "checked" menjadi "sudah" dan "unchecked" menjadi "belum"
                if ($value === "checked") {
                    return "sudah";
                }
                if ($value === "unchecked") {
                    return "belum";
                }
                // Jika nilai null, kembalikan string kosong
                if ($value === null) {
                    return '';
                }
                // Format tanggal menggunakan Carbon
                //try {
                  //  $date = \Carbon\Carbon::parse($value);
                    //return $date->isoFormat('D MMMM Y');
                //} catch (Exception $e) {

                //}
                // Format angka menjadi format Rupiah kecuali untuk key yang mengandung "berkas" atau "sertifikat"
                if (is_numeric($value) && !preg_match('/berkas|sertifikat/i', $key)) {
                    return number_format($value, 0, ',', '.');
                }
                return $value;
            }
        @endphp
        @foreach($agd as $agenda)
            <tr>
                <th>Nama Pemilik</th>
                <td>{{ $agenda->nama_pemilik }}</td>
            </tr>
            <tr>
                <th>No Hp</th>
                <td>{{ $agenda->no_hp }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $agenda->alamat }}</td>
            </tr>
            <tr>
                <th>jenis layanan</th>
                <td>{{ $agenda->jenis_layanan }}</td>
            </tr>
            @php
                $content = json_decode($agenda->content, true);
            @endphp
            @foreach($content as $key => $value)
                <tr>
                    <th>{{ $key }}</th>
                    <td>{{ formatValue($key, $value) }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>



</body>
</html>
