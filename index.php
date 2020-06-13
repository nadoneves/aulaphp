<?php

    // Esse é um comentário
    # Esse é outro comentário
    /*

        Esse é um comentário de multiplas linhas
        Adição: (+) 1 + 1
        Subtração: (-) 5 - 4
        Multiplicação: (*) 8 * 8
        Divisão: / (/) 6 / 3

    */

    if( $_POST ) {
        
        if ( isset($_POST['aluno']) && !empty($_POST['aluno']) ) {        
            $aluno = $_POST['aluno'];        
        } else {
            echo "O campo Aluno é obrigatório!";
        }

        if ( isset($_POST['telefone']) ) {
            $telefone = $_POST['telefone'];
        } 
        if ( isset($_POST['email']) ) {
            $email = $_POST['email'];
        } 
        if ( isset($_POST['senha']) ) {
            $senha = $_POST['senha'];
        } 

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>

        <div class="container-fluid">

            <div class="row" style="border: 1px solid red; height: auto;">
                <form action="index.php" method="POST">
                    <div class="col-md-3">Aluno:</div>
                    <div class="col-md-9">
                        <input type="text" name="aluno" id="">
                        <!-- <input type="text" name="aluno" style="background-color: red;" id=""> -->
                    </div>
                    <div class="col-md-3">Telefone:</div>
                    <div class="col-md-9">
                        <input type="text" name="telefone" id="">
                    </div>
                    <div class="col-md-3">Email:</div>
                    <div class="col-md-9">
                        <input type="text" name="email" id="">
                    </div>
                    <div class="col-md-3">Senha:</div>
                    <div class="col-md-9">
                        <input type="password" name="senha" id="">
                    </div>
                    <div class="col-md-12">
                        <button type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>

            <div class="row" style="border: 1px solid blue; height: 500px;"></div>

        </div>

        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
