<?php
include "conexao.php";

//$query = "select * from perguntas p inner join alternativas a on (p.id = a.id_pergunta) "


$query = "select * from perguntas";
$resultado = mysqli_query($conexao, $query);
?>
<form action="resultado.php" method="post">

<?php
while($linha = mysqli_fetch_array($resultado))
{
    echo "<h2>".$linha["id"]. "  -  ".$linha["pergunta"]."</h2>";
    $query2 = "select * from alternativas where pergunta_id = ".$linha["id"];
    $resultado2 = mysqli_query($conexao,$query2);
    $contagem = 1;
    while($linha2 = mysqli_fetch_array($resultado2)){
        ?>
            <p>
                <input type="radio" 
                        name="<?php echo $linha["id"];?>" 
                        value="<?php echo $contagem; ?>" >
                        <?php echo $linha2["alternativa"]; ?>
            </p>
        <?php
        $contagem++;
    }

}
?>
<button type="submit">Enviar Questionario</button>
</form>
