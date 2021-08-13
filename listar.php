<style>
    table{
        border: 1px solid black;
        margin: auto;
    }
    td{
        border:1px solid black;
    }
    table {
        text-align: center;
        font-family: Montserrat, Arial, sans-serif;
        background:#fafafa ;
        margin: 0 auto;
        width: 80%;
    }

    td:nth-child(even) {
        background:lightblue;
    }

   
</style>
<table>
    <thead>
        <td>Id</td>
        <td>Nome</td>
        <td>Ano</td>
        <td>Cadastro</td>
        <td>Exemplares</td>
        <td>Controles</td>
    </thead>
<tbody>
<?php
include('conexao.php');

$sql = 'SELECT * FROM tb_livro ORDER BY nm_livro ASC';
$executa = $GLOBALS['con']->query($sql);
/*
    repare que sempre que formos enviar um comando para o mysql, usaremos a linha
    acima, da mesma forma que usamos no cadastro.. nao muda nada

    .. como podemos ter mais de uma linha de resultados nesta consulat, iremos criar
    um laço de forma que ele percorra todos os resultados obtidos, linha a linha:
*/

while($livro = $executa->fetch_array()){    //convertemos a linha percorrida em array
    // agora acessamos os dados do livro, associando o nome da coluna desejada na tabela

    echo '<tr>
          <td>'.$livro['id_livro'].'</td>';
    echo '<td>'.$livro['nm_livro'].'</td>';
    echo '<td>'.$livro['dt_ano'].'</td>';
    echo '<td>'.date('Y',strtotime($livro['dt_cadastro'])).'</td>';
    echo '<td>'.$livro['dt_exemplares'].'</td>';
    echo '<td>
            <a href="excluir.php?id_livro='.$livro['id_livro'].'">Excluir</a>
          </td>
          </tr>';
}

?>
    </tbody>
</table>
<a href='cadastrar.php' style=" padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #DDD;
    border-radius: 5px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    cursor: pointer;
    background: linear-gradient(90deg, #3F2B96 0%, #A8C0FF 100%);
    text-decoration: none;
    color:black;
    
    ">Cadastrar Livros</a>