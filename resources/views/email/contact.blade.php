<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    
<div style="max-width:550px; min-width:320px;  background-color: white; border: 1px solid #DDDDDD; margin-right: auto; margin-left: auto;">
    <div style="margin-left:30px;margin-right:30px">
      <p>&nbsp;</p>
      <p><a href="https://logico.com.ar" style="text-decoration:none;font-family:Verdana, Geneva, sans-serif;font-weight: bold; color: #3D3D3D;font-size: 12px">Subject: {{ $title }}</a></p>
      {{-- <hr style="margin-top:10px;margin-bottom:65px;border:none;border-bottom:1px solid gray"/> --}}
      <p><a href="https://logico.com.ar" style="text-decoration:none;font-family:Verdana, Geneva, sans-serif;font-weight: bold; color: #3D3D3D;font-size: 12px">From: {{ $name }}</a></p>
      <p><a href="https://logico.com.ar" style="text-decoration:none;font-family:Verdana, Geneva, sans-serif;font-weight: bold; color: #3D3D3D;font-size: 12px">Email: {{ $email }}</a></p>
      <hr style="margin-top:10px;margin-bottom:65px;border:none;border-bottom:1px solid gray"/>
      {{-- <h1 style="font-family: Tahoma, Geneva, sans-serif; font-weight: normal; color: #2A2A2A; text-align: center; margin-bottom: 65px;font-size: 20px; letter-spacing: 6px;font-weight: normal; border: 2px solid black; padding: 15px;">THANK YOU FOR THE FEEDBACK!</h1> --}}
      {{-- <h3 style="font-family:Palatino Linotype, Book Antiqua, Palatino, serif;font-style:italic;font-weight:500">Your opinion is <span style="border-bottom: 1px solid red">very important</span> to us:</h3> --}}
    <p style="font-family:Palatino Linotype, Book Antiqua, Palatino, serif;font-size: 15px; margin-left: auto; margin-right: auto; text-align: justify;color: #666;line-height:1.5;margin-bottom:75px">{{ $msg }}</p>
      <table style="width:100%;">
        <th>
          <td style="width:25%"></td>
          <td style="background-color:black;with:50%;text-align:center;padding:15px"><a href="https://supermart-test.herokuapp.com/#/" style="margin-left: auto; margin-right: auto;text-decoration:none;color: white;text-align:center;font-family:Courier New, Courier, monospace;font-weight:600;letter-spacing:2px;background-color:black;padding:15px">Visit Shop</a></td>
          <td style="width:25%"></td>
        </th>
      </table>
      <hr style="margin-top:10px;margin-top:75px"/>
      <p style="text-align:center;margin-bottom:15px"><small style="text-align:center;font-family:Courier New, Courier, monospace;font-size:10px;color#666;"><a href="https://supermart-test.herokuapp.com/#/" style="color:#666">2K Supertmart </a> <span style="color:red">&hearts;</span> We care!</small></p>
      <p>&nbsp;</p>
    </div>
  </div>
</body>
</html>