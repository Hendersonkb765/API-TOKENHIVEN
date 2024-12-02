<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite(['resources/js/app.js','resources/css/login.css'])

    <title>Document</title>
</head>
<body>
    <div class="container-form">
        <div>
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <h1 >Regitrar</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome </label>
                    <input name="name" type="text" class="form-control">
                  </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email </label>
                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Senha</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>

           
                <button type="submit" class="btn btn-success">Registrar-se</button>
              </form>
        </div>
        
    
    </div>

    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>