<?php

class Message {
    private static $msg = array(
        "entra_user" => "Entre com seu usuário e senha.", //1
        "Erro_Entra_user" => "Login e/ou senha incorretos.", //2
        "User_inativo" => "Usuario não ativo", //3
        "Erro_Acess" => "Falha ao acessar o banco de dados", //4
        "Sucess_AlterarDados" => "Dados alterados com sucesso", //5
        "Sucess_Cadastro" => "Cadastrado com sucesso", //6
        "Erro_Campos" => "Há campos não preenchidos", //7
        "Campos_Cadastrados" => "Login e/ou email já cadastrados", //8
        "Erro_senhas" => "As senhas inseridas não conferem", //9
        "Sucess_Deletar" => "Dados apagados com sucesso", //10
        "Arquivo_Invalido" => "Arquivo inválido", //11
        "Erro_Senha" => "Senha incorreta", //12
        "Nome_Repetido" => "Nome de arquivo já utilizado, por favor insira outro", //13
        "Inserir_Email" => "Insira seu Email abaixo", //14
        "Erro_Email" => "Email não cadastrado", //15
        "Email_Recuperacao" => "Email de recuperação de senha enviado com sucesso", //16
        "Erro_Email_Recuperacao" => "Falha ao enviar email de recuperação, favor tentar novamente", //17
        "Erro_Campo" => "Um dos campos não está no padrão definido!" //18
    );
    private static $type = array(
        "" => "-info", //1
        "" => "-danger", //2
        "" => "-warning", //3
        "" => "-danger", //4
        "" => "-success", //5
        "" => "-success", //6
        "" => "-danger", //7
        "" => "-danger", //8
        "" => "-warning", //9
        "" => "-success", //10
        "" => "-danger", //11
        "" => "-danger", //12
        "" => "-warning", //13
        "" => "-info", //14
        "" => "-danger", //15
        "" => "-success", //16
        "" => "-danger", //17
        "" => "-danger" //8
    );

    /*
     * Function get()
     *      Seleciona o indice o array, retornando a mensagem
     * param void
     * return object
     */
    public static function get() {
        if (@$_GET["msg"] && $_GET["msg"] != '' && $_GET["msg"] > 0 && $_GET["msg"] <= 18) {
            return '<div class="alert alert' . self::$type[$_GET["msg"]] . '">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        ' . self::$msg[$_GET["msg"]] . '
                        </div>';
        }
    }

}
