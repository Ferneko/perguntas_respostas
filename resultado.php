<?php include "conexao.php";

if(isset($_POST) && !empty($_POST))
{
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    foreach ($_POST as $chave => $valor)
    {
        $respostaUsuario = $valor;
        $query = "select * from alternativas where pergunta_id = ".$chave;
        $resultado = mysqli_query($conexao, $query);
        $contagem = 1;
        while($linha2 = mysqli_fetch_array($resultado)){
            echo "<p>";
                if($linha2["correta"] == 1 )
                {
                    if($respostaUsuario== $contagem)
                    {
                        echo "Parabens vc acertou";
                    }
                    else
                    {           
                        echo "alternativa correta";
                    }
                    
                }
                else
                {
                    if($respostaUsuario== $contagem)
                    {
                        echo "VocÊ chutou essa:";
                    }
                }
           
            ?>
            
                <input type="radio" 
                        name="<?php echo $linha2["pergunta_id"];?>" 
                        value="<?php echo $contagem; ?>" >
                        <?php echo $linha2["alternativa"]; ?>
            </p>
            
        <?php
        $contagem++;
        }
       echo " <br><br><br>";

    }
   
}

?>