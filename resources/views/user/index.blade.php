<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }
        table, .btn{
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>USERS</h1>
        <a type="button" href="{{route('user.create')}}" class="btn btn-primary">Adicionar Usuário</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td style="min-width: 200px; display: flex; flex-direction: row; align-items: center; gap: 5px">
                    <a type="button" href="{{route('user.show', $user->id)}}" class="btn btn-success">Ver</a>
                    <a type="button" href="{{route('user.edit', $user->id)}}" class="btn btn-warning">Editar</a>
                    <form method="post" action="{{route('user.destroy', $user->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
