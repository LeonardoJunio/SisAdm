<?php
$active = 'link';
include_once '../header.php';
        
if ((int) Dbcommand::get('up') < 1 || (int) Dbcommand::get('up') > $company->links->size) {
    header("Location: index.php");
} else {
    /*   =============   Editar nome e/ou foto   ===============     */
    $i = Dbcommand::get('up') - 1;
    $company->links->link[$i]->get();
    if (@$_POST) {
        if ($_FILES['photo']['name'] != '') {     /* Atualiza apenas o nome e foto nova     */
            $name = Photo::getSendName();       /* Guarda diretorio com novo nome   */
            if (is_int($name)) {    /* Verificando se eh o nome da imagem ou a mensagem de erro (inteiro)   */
                header("Location: view.php?up=" .($i+1). "&msg=" .$name);        
            }else {
                for ($j = 0; $j < $company->links->link[$i]->album->size; $j++) {
                    unlink(".." .$company->links->link[$i]->album->photo[$j]->getDir());    /* Deletando arquivo em "../components/img"  */
                }
                header("Location: view.php?up=" .($i+1). "&msg=" .$company->links->link[$i]->update($user->getId(), $server.$name));    /* Adiciona nova foto com novo endereco     */
            }
        }else {     /* Atualiza apenas o nome passando a url antiga     */
            header("Location: view.php?up=" .($i + 1). "&msg=" .$company->links->link[$i]->update($user->getId()));
        }        
        
    }
?>
        <!-- Servicos -->
                <div class="span9">
                    <div class="hero-unit">
                        <a href="./"><h1>Links</h1></a>
                        <br/>
                        <?php include("../components/msg.php"); ?>                
                        <form enctype="multipart/form-data" action="view.php?up=<?php echo $i + 1; ?>" method="post">
                            <fieldset>
                                <div>Novo Nome:
                                    <input type="text" name="name_link" value="<?php echo $company->links->link[$i]->name; ?>" class="form-control" pattern="^[^<>]{0,255}$" required/> 
                                </div>
                                <div>Novo Link:                                   
                                    <table>
                                        <tr>
                                            <td>http://</td>
                                            <td class="width-full"><input type="text" name="url_link" value="<?php echo $company->links->link[$i]->url; ?>" class="form-control" pattern="^[^<>]{0,255}$" required/></td>
                                        </tr>
                                    </table>                                    
                                </div>
                                <div>Nova Descrição:
                                    <textarea name="about_link" class="ckeditor" placeholder="Detalhes" required><?php echo $company->links->link[$i]->about; ?></textarea>
                                </div>
                                <br/>
                                <?php for ($j = 0; $j < $company->links->link[$i]->album->size; $j++) { ?>
                                    <div>
                                        <img src="<?php echo $company->links->link[$i]->album->photo[$j]->url; ?>" alt="<?php echo $company->links->link[$i]->name; ?>">
                                    </div>
                                    <br/>
                                <?php } ?>
                                <div>
                                    <p>Imagem (.png, .jpeg, .jpg):          
                                    <input name="photo" id="photo" type="file" />                                
                                    </p> 
                                    *Tamanho recomendado: 500x500
                                </div>
                                <br/>
                                <a class="btn btn-primary" href="index.php?del=<?php echo $i + 1; ?>">Deletar</a>
                                <button type="submit" class="btn btn-primary pull-right">Salvar</button>                        
                                <a href='./' class="btn btn-primary pull-right">Voltar</a>                               
                            </fieldset>
                        </form>                
                    </div>
                    <?php include 'table.php'; ?>
                </div>
                <!-- // Fim Banner -->
            <!-- // Fim Conteudo -->
            </div>
            <!-- // Fim Corpo --> 
        </div>
<!--  Rodape -->
<?php
    include_once '../footer.php';
}