<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>{{ $patient->name.' Address' }}</title>
  <style media="screen">
    body{
      font-family: 'Roboto', sans-serif;
    }

    ul{
      display: inline-block;
      list-style: none;
      padding-left: 0px;
    }
    ul > li{
      padding-left: 20px;
    }

    .text-indent{
      text-indent: 40px;
    }

    .text-right{
      text-align: right;
    }
  </style>
</head>
<body>
  <main>
      {{-- <p >
        <strong>From :</strong>
        <ul>
          <li>{{ $patient->address1 }},</li>
          <li>{{ ($patient->address2 == '') ? '' : $patient->address2 }},</li>
          <li>{{ $patient->city, $patient->district }},</li>
          <li>{{ $patient->state .' - '. $patient->pincode }}.</li>
        </ul>
      </p> --}}
      <p>
        <strong>To :</strong>
        <ul>
          <li>{{ $patient->father->name }},</li>
          <li>{{ $patient->address->address1 }},</li>
          <li>{{ ($patient->address->address2 == '') ? '' : $patient->address->address2 }},</li>
          <li>{{ $patient->address->city, $patient->address->district }},</li>
          <li>{{ $patient->address->state .' - '. $patient->address->pincode }}.</li>
        </ul>
      </p>
  </main>
</body>
</html>
