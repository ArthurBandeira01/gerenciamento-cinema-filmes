<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contato - Alpha Castt</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
  <h1>Redefinir senha - Jetmovie</h1>
  <p>Nome: {{$data->name}}</p>
  <p>E-mail: {{$data->email}}</p>
  <a href="http://localhost:8000/redefinir-senha/{{$token}}" target="_blank" style="text-decoration:none;font-size:15px;font-family:Arial;width:340px;height:50px;color:#fff;border-color:#18ab29;font-weight:bold;border-top-left-radius:28px;border-top-right-radius:28px;  border-bottom-left-radius:28px;  border-bottom-right-radius:28px;  text-shadow: 1px 1px 0px #2f6627;background:#44c767;padding:6px" target="_blank">Redefina sua senha aqui</p>
</body>
</html>
