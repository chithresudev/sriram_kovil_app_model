<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>{{ $patient->name.' Letter' }}</title>
  <style media="screen">
    body{
      font-family: 'Roboto', sans-serif;
    }

    header{
      width:100%;
    }

    header > p{
     float: right;
     margin-top: -10px;
    }

    img{
      width:100px;
      float: left;
      margin-right: 25px;
    }

     h3{
      font-family: 'Roboto', sans-serif;
      font-size: 25px;
      line-height: 1.2em;
      padding: 10px 0px 3px 25px;
      text-align: justify;
    }

    ul{
      display: inline-block;
      list-style: none;
      padding-left: 0px;
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
  <header>
    <p>Ref.No : {{ $patient->letter_code }}</p>
    <img src="images/logo.png" alt="">
    <h3>Molecular Diagnostics, Counseling, Care and Research Centre</h3>
    <hr>
  </header>
  <main>
      <p>
        <ul>
          <li><strong>{{ date('M d, Y') }}</strong></li>
          <li><strong>Mr/Ms.  {{ $patient->father->name }}</strong>,</li>
          <li>{{ $patient->address->address1 }},</li>
          <li>{{ ($patient->address->address2 == '') ? '' : $patient->address->address2 }},</li>
          <li>{{ $patient->address->city, $patient->address->district }},</li>
          <li>{{ $patient->address->state .' - '. $patient->address->pincode }}.</li>
        </ul>
      </p>
      <p>
        <strong>Dear Mr/Ms.  {{  $patient->father->name }}</strong>,<br><br>
I       was pleased to learn of your need for an ICU Staff Nurse, as my career goals and
        expertise are directly in line with this opportunity.  My experience and eduation
        have provided me with excellent knowledge of ICU practices, acute patient care,
        family relations, staff development, and other relevant skills required of an
        effective team member.
      </p>
      <p>
         My strong initiative and exceptional organizational skills, combined with my ability
         to work well under pressure, will enable me to make a substantial contribution to
         St. Marie's hospital.  I believe that a challenging environment such as yours will
         provide an excellent opportunity for me to best utilize my skills while contributing
         to the healthcare community, patients, and their families.

         Enclosed is my resume for your review.  I welcome the opportunity to discuss with you
         personally how my skills and strengths can best serve your hospital.
      </p>

      <ul>
        <li>Sincerely,</li>
        <li>Beverly M. Jones</li>
        <li><br><strong>MDCRC</strong></li>
      </ul>
  </main>
</body>
</html>
