<?php 

//credenciais do banco

$database = 'udemy_loja_online';
$username = 'user_loja_web';
$password = 'tiago';

//iniciando ligação com banco"

$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username, $password);

//carregando os dados (em formato de arry de objetos)
$resultados = $ligacao->query("SELECT * FROM clientes LIMIT 20")->fetchall(PDO::FETCH_OBJ);

//fim da ligação

$ligacao = null;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PFO - apresentação de dados de uma query SQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<div class="container_fluid">
    <div class="row">
        <div class="col">

        <h3>Clientes:</h3>
        <hr>
        <table class="table table-bordered table-striped">
            <thead class="bg-dark text-white">
                <tr>

                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Data Nascimento</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Morada</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($resultados as $cliente): ?>
                    <tr>
                        <td><?= $cliente->nome?></td>
                        <td><?= $cliente->sexo == 'm' ? 'Masculino' : 'Feminino'?></td>
                        <td><?= substr($cliente->data_nascimento, 0, 10)?></td>
                        <td><?= $cliente->email?></td>
                        <td><?= $cliente->telefone?></td>
                        <td><?= $cliente->morada?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>