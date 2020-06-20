<?php

    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if(!$conn) {
        die("Conexão falhou: ". mysqli_connect_error());
    }

    $sql = "SELECT * FROM alunos";
    $result = mysqli_query($conn, $sql);
?>

<div class="row" style="border: 1px solid blue; height: 500px;">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Aluno</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($linha = mysqli_fetch_assoc($result)) {
                        $linhaTabela = "<tr>";
                            $linhaTabela .= '<th scope="row">'. $linha['id'] .'</th>';
                            $linhaTabela .= '<td>'. $linha['nome'] .'</td>';
                            $linhaTabela .= '<td>'. $linha['telefone'] .'</td>';
                            $linhaTabela .= '<td>'. $linha['email'] .'</td>';
                            $linhaTabela .= '<td>'. $linha['senha'] .'</td>';
                            $linhaTabela .= '<td>';
                                $linhaTabela .= '<button onclick="window.location=\'index.php?action=editar&id='.$linha['id'].'\'">EDITAR</button>';
                                $linhaTabela .= ' ';
                                $linhaTabela .= '<button onclick="window.location=\'index.php?action=remover&id='.$linha['id'].'\'">REMOVER</button>';
                            $linhaTabela .= '</td>'; 
                        $linhaTabela .= "</tr>";
                        echo $linhaTabela;
                    }
                    
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</div>