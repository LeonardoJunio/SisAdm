<?php

class Message {
    private static $msg = array(
        "entrada usuario" => "Entre com seu usuário e senha.", //1
        "erro entrada usario" => "Login e/ou senha incorretos.", //2
        "usuario inativo" => "Usuario não ativo", //3
        "erro acesso" => "Falha ao acessar o banco de dados", //4
        "sucesso alterar dados" => "Dados alterados com sucesso", //5
        "sucesso cadastro" => "Cadastrado com sucesso", //6
        "erro campos" => "Há campos não preenchidos", //7
        "campos cadastrados" => "Login e/ou email já cadastrados", //8
        "erro senha" => "As senhas inseridas não conferem", //9
        "sucesso deletar" => "Dados apagados com sucesso", //10
        "arquivo invalido" => "Arquivo inválido", //11
        "erro senha" => "Senha incorreta", //12
        "nome repetido" => "Nome de arquivo já utilizado, por favor insira outro", //13
        "inserir email" => "Insira seu Email abaixo", //14
        "erro email" => "Email não cadastrado", //15
        "sucesso recuperacao" => "Email de recuperação de senha enviado com sucesso", //16
        "erro recuperacao" => "Falha ao enviar email de recuperação, favor tentar novamente", //17
        "erro campo" => "Um dos campos não está no padrão definido!" //18
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
        "" => "-danger" //18
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
