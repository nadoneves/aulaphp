<?php 

    $aluno = null;
    $telefone = null;
    $email = null;
    $senha = null;

    $urlAction = "index.php";

    if( $_POST ) {

        $continuaCadastro = TRUE;
        
        if ( isset($_POST['aluno']) && !empty($_POST['aluno']) ) {        
            $aluno = $_POST['aluno'];        
        } else {
            echo "O campo Aluno é obrigatório!<br>";
            $continuaCadastro = FALSE;
        }

        if ( isset($_POST['telefone']) && !empty($_POST['telefone']) ) { 
            $telefone = $_POST['telefone'];
        } else {
            echo "O campo Telefone é obrigatório!<br>";
            $continuaCadastro = FALSE;
        }
        
        if ( isset($_POST['email']) && !empty($_POST['email']) ) { 
            $email = $_POST['email'];
        } else {
            echo "O campo Email é obrigatório!<br>";
            $continuaCadastro = FALSE;
        }
        
        if ( isset($_POST['senha']) && !empty($_POST['senha']) ) { 
            $senha = $_POST['senha'];
        } else {
            echo "O campo Senha é obrigatório!<br>";
            $continuaCadastro = FALSE;
        }

        if($continuaCadastro) {
            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
            if(!$conn) {
                die("Conexão falhou: ". mysqli_connect_error());
            }

            if(isset($_GET['action']) && $_GET['action'] == 'editar') {
                $sql = "UPDATE alunos SET ";
                $sql .= "nome='". $_POST['aluno'] . "',";
                $sql .= "telefone='". $_POST['telefone'] . "',";
                $sql .= "email='". $_POST['email'] . "',";
                $sql .= "senha='". $_POST['senha'] . "' ";
                $sql .= "WHERE id=". $_GET['id'];
            } else {
                $sql = "INSERT INTO alunos (nome, telefone, email, senha) VALUES ";
                $sql .= "(";
                $sql .= "'". $aluno ."',";
                $sql .= "'". $telefone ."',";
                $sql .= "'". $email ."',";
                $sql .= "'". $senha ."')";
            }            

            $result = mysqli_query($conn, $sql);
            if($result) {
                echo "Aluno foi cadastrado com sucesso!!!";
                $aluno = null;
                $telefone = null;
                $email = null;
                $senha = null;
            } else {
                echo "Erro ao cadastrar o aluno. ". mysqli_error($conn);
            }
        }

    }

    if($_GET) {
        if($_GET['action'] == 'remover') {
            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
            if(!$conn) {
                die("Conexão falhou: ". mysqli_connect_error());
            }
            $sql = "DELETE FROM alunos WHERE id = ". $_GET['id'];
            if(mysqli_query($conn, $sql)) {
                echo "Aluno removido com sucesso!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_close($conn);
        } else {
            $urlAction = $urlAction . "?action=" . $_GET['action'] . "&id=" . $_GET['id'];

            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
            if(!$conn) {
                die("Conexão falhou: ". mysqli_connect_error());
            }
            $sql = "SELECT * FROM alunos WHERE id = ". $_GET['id'];
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $aluno = $row['nome'];
                    $telefone = $row['telefone'];
                    $email = $row['email'];
                    $senha = $row['senha'];
                }
            }
        }
    }

?>

<div class="row" style="border: 1px solid red; height: auto;">
    <form action="<?php echo $urlAction; ?>" method="POST">
        <div class="col-md-3">Aluno:</div>
        <div class="col-md-9">
            <input type="text" name="aluno" id="" value="<?php echo $aluno; ?>">
            <!-- <input type="text" name="aluno" style="background-color: red;" id=""> -->
        </div>
        <div class="col-md-3">Telefone:</div>
        <div class="col-md-9">
            <input type="text" name="telefone" id="" value="<?php echo $telefone ?>">
        </div>
        <div class="col-md-3">Email:</div>
        <div class="col-md-9">
            <input type="text" name="email" id="" value="<?php echo $email ?>">
        </div>
        <div class="col-md-3">Senha:</div>
        <div class="col-md-9">
            <input type="password" name="senha" id="" value="<?php echo $senha ?>">
        </div>
        <div class="col-md-12">
            <button type="submit">Cadastrar</button>
            <button type="button" onclick="window.location='index.php';">Limpar</button>
        </div>
    </form>
</div>