<!DOCTYPE html>
<html>
<head>
    <style>
    body {
      
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }
    .example-element {
  margin-bottom: 1rem;
}

@font-face {
   font-family: myFirstFont;
   src: url(sansation_light.woff);
}

* {
   font-family: myFirstFont;
}

@media print
   {
      .noprint { display: none; }
   }
    </style>

    

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


  </head>
<body>

<!-- logo -->

<h6 class="text-center"> MINIT CURAI</h6>
<h6 class="text-center"> MESYUARAT LUAR / BENGKEL / KURSUS / PROGRAM </h6>
<h6 class="text-center">  JABATAN PENDIDIKAN NEGERI MELAKA</h6>

<br>
</br>


<div class="container">

  
  <dl>
    <dt>  &nbsp;&nbsp;&nbsp;&nbsp;1. Mesyuarat luar / Bengkel / Kursus / Program: {{ $minitcurai->tajuk}} </dt>
    <dd>- </dd>

    <dt>  &nbsp;&nbsp;&nbsp;&nbsp;2. Anjuran: {{ $minitcurai->anjuran}}</dt>
    <dd>- </dd>

    <dt>  &nbsp;&nbsp;&nbsp;&nbsp;3. Tarikh / Masa / Tempat: {{ $minitcurai->tarikh}}</dt>
    <dd>- </dd>

    <dt>  &nbsp;&nbsp;&nbsp;&nbsp;4. Pegawai Yang Terlibat: {{ $minitcurai->pegawai_terlibat}}</dt>
    <dd>- </dd>

    <dt>  &nbsp;&nbsp;&nbsp;&nbsp;5. Isu / Isu Penting Mesyuaray luar / Bengkel / Kursus / Program: {{ $minitcurai->isu}}

    <dt>  &nbsp;&nbsp;&nbsp;&nbsp;6. Nyatakan Tindakan Yang Mesti / Perlu Diambil: {{ $minitcurai->tindakan}}</dt>

    <dd>- </dd>



    <p> Tandatangan:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Tarikh: </p>
  
  
   
    <table class="table">
                                <tr>
                                    <td colspan = '2' height='0'>
                                </tr>
                                <tr>
                                    <td scope="col6" width=50% align="center">
                                        ...........................................<br>
                                         {{$guru_kelas::guru_kelas($murid->idsekolah, $murid->darjah,$murid->kelas)}}<br>
                                        Guru Kelas<br>
                                        {{$murid->namasekolah}}
                                    </td>
                                    <td scope="col6" width=50% align="center">
                                        ...........................................<br>
                                        <br>
                                        Guru Besar<br>
                                        {{$murid->namasekolah}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan = '2' height='100'>
                                </tr>
                               
                            </table>
    <dt>  &nbsp;&nbsp;&nbsp;&nbsp;7. Arahan / Cadangan bagi Tindakan / Keputusan oleh Pengarah/Timbalan Pengarah: <dt>  &nbsp;&nbsp;&nbsp;&nbsp;6. Nyatakan Tindakan Yang Mesti / Perlu Diambil: {{ $minitcurai->cadangan}}</dt> </dt>
    <dd>- </dd>

    <p> Tandatangan:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Tarikh: </p>
  
    <table class="table">
                                <tr>
                                    <td colspan = '2' height='0'>
                                </tr>
                                <tr>
                                    <td scope="col6" width=50% align="center">
                                        ...........................................<br>
                                         {{$guru_kelas::guru_kelas($murid->idsekolah, $murid->darjah,$murid->kelas)}}<br>
                                        Guru Kelas<br>
                                        {{$murid->namasekolah}}
                                    </td>
                                    <td scope="col6" width=50% align="center">
                                        ...........................................<br>
                                        <br>
                                        Guru Besar<br>
                                        {{$murid->namasekolah}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan = '2' height='100'>
                                </tr>
                               
                            </table>


  </dl>     
</div>


</body>
</html>
