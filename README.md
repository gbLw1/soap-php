# SOAP PHP

Um sistema de livraria desenvolvido em PHP com SOAP e WSDL.

SOAP (Simple Object Access Protocol) é um protocolo de comunicação baseado em
XML usado para a troca de informações estruturadas entre sistemas operacionais
diferentes via HTTP e XML.

WSDL (Web Services Description Language) é uma linguagem baseada em XML para
descrever serviços web e como acessá-los.

## Instalação

A maneira mais simples de usar o Livraria é através do
[XAMPP](https://www.apachefriends.org/download.html).

### Habilite o SOAP no XAMPP

1. Abra a pasta de instalação do XAMPP, que normalmente é C:\xampp por padrão,
   mas pode variar dependendo da sua configuração.
2. Navegue até a pasta php dentro da pasta do XAMPP.
3. Procure o arquivo php.ini. Isso é o arquivo de configuração do PHP.
4. Abra o arquivo php.ini em um editor de texto de sua preferência.
5. Busque pela linha que contém `;extension=soap`, que é a extensão SOAP
   desativada por padrão.
6. Remova o ponto e vírgula no início da linha para habilitar a extensão SOAP. Deve ficar assim: `phpextension=soap`
7. Salve e feche o arquivo php.ini após fazer essa alteração.
8. Reinicie o servidor Apache do XAMPP para aplicar as alterações.

### Setup do banco de dados

1. Certifique-se de estar com o Apache e MySQL rodando no XAMPP
2. Abra o [phpMyAdmin](http://localhost/phpmyadmin)
3. Utilize os arquivos SQL da pasta [`./docs/sql`](./docs/sql) para criar as tabelas e inserir os dados

## Rodando o projeto

1. Copie os arquivos da pasta `src` para a pasta `C:/xamp/htdocs/SoapService`
2. Abra o navegador e acesse o projeto em: `localhost/SoapService/livraria`
