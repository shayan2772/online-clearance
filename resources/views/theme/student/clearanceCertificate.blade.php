<!DOCTYPE html>
<html>
<head>
    <title>Clearance Certificate</title>
</head>
<body>
    <div style="width:650px; height:800px; padding:20px; text-align:center; border: 10px solid #787878;">
        <div style="width:600px; height:750px; padding:20px; text-align:center; border: 5px solid #787878;">
                {{-- <img alt="" style="background:url('{{ asset('theme/img/logo.png') }}'); background-repeat: no-repeat; width:100%; height:100%;"> --}}
                <img src="{{ asset('theme/img/logo.png') }}" alt="">
                <br><br>
                <span style="font-size:50px; font-weight:bold">Clearance Certificate</span>
               <br><br>
               <span style="font-size:25px"><i>This is to certify that</i></span>
               <br><br>
               <span style="font-size:30px"><b>{{ $name }}</b></span><br/><br/>
               <span style="font-size:25px"><i>is cleared from all the departments</i></span> <br/><br/> <br/><br/> <br/>
               {{-- <span style="font-size:30px">$course.getName()</span> <br/><br/> --}}
               {{-- <span style="font-size:20px">with score of <b>$grade.getPoints()%</b></span> <br/><br/><br/><br/> --}}
               <span style="font-size:25px"><i>dated</i></span><br>
              {{-- #set ($dt = $DateFormatter.getFormattedDate($grade.getAwardDate(), "MMMM dd, yyyy")) --}}
              <span style="font-size:30px">{{ $date }}</span>

        </div>
    </div>
</body>
</html>
