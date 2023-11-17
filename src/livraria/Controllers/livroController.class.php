<?php
require_once "Models/conexao.class.php";
require_once "Models/autorDAO.class.php";

class livroController
{
    public function listar()
    {
        //rota do serviço a ser executado 
        // $opcao = array 
        // ("location"=>"http://localhost/SoapService/editora/services/editoraSoap.class.php",
        //  "uri"=>"http://localhost");

        //o client vira o editoraSoap, já que ele é quem faz a conexão com as funções do serviço
        //$client = new soapClient(null, $opcao);

        $client = new soapClient("http://localhost/SoapService/editora/services/editoraSoap.class.php?wsdl");

        $retorno = $client->buscar_catalogo();
        $retorno = json_decode($retorno);
        require_once "Views/listar_livros.php";
    }

    public function buscar_livros_autor()
    {
        if ($_POST) {
            $client = new soapClient("http://localhost/SoapService/editora/services/editoraSoap.class.php?wsdl");

            $aut_parm = new stdClass();
            $aut_parm->username = "adm";
            $aut_parm->password = "123";

            $header_parm = new soapVar($aut_parm, SOAP_ENC_OBJECT);

            $header = new soapHeader("editora", "security", $header_parm, false);

            $client->__setSoapHeaders(array($header));

            $retorno = $client->buscar_livros_autor($_POST["autor"]);
            $retorno = json_decode($retorno);
            require_once "Views/listar_livros.php";
        }

        $autorDAO = new autorDAO();
        $retorno = $autorDAO->buscar_autores();
        require_once "Views/listar_autores.php";
    }

    public function listar_livros_rest()
    {
        $retorno = file_get_contents("http://localhost/soapservice/editora/services/editoraRest.class.php?oper=buscar_catalogo");
        $retorno = json_decode($retorno);
        require "Views/listar_livros.php";
    }

    public function listar_livro_autor_rest()
    {
        $autor = urlencode("Autor 1");
        $retorno = file_get_contents("http://localhost/soapservice/editora/services/editoraRest.class.php?oper=buscar_livro_autor&nome=$autor");
        $retorno = json_decode($retorno);
        require "Views/listar_livros.php";
    }

    public function listar_livro_ano_rest() {
        // cria um dictionary com os dados a serem enviados
        $dados = array("oper" => "buscar_livro_ano", "ano" => 2020);

        $curl = curl_init("http://localhost/soapservice/editora/services/editoraRest.class.php");
        curl_setopt($curl, CURLOPT_POST, true); // definir o método como POST
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dados); // preencher o body com os dados
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // definir que o retorno será armazenado em uma variável

        $retorno = curl_exec($curl);

        curl_close($curl);

        $retorno = json_decode($retorno);

        require "Views/listar_livros.php";
    }
}
