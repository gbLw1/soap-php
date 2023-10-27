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
}
