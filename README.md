## Sobre

Este é um script PHP bem simples que usa algumas funções GD para gerar
certificados de eventos. Como normalmente os eventos no Brasil precisam deste
tipo de material, propomos três tipos de certificado com estas informações:

 * Nome do participante e horas totais de participação
 * Nome do palestrante e o título da apresentação
 * Nome do organizador e horas totais gastas na organização do evento

Será pedido ao usuário que ele digite seu endereço de e-mail para visualizar
uma lista com seus certificados.

![Certificate Example](https://github.com/vmassuchetto/certificate-generator/raw/master/doc/certificate-example.png)

Estes scripts foram até então usados nos WordCamps
[WordCamps](http://wordcamp.org) no Brasil.

## Softwares necessários

 * PHP >= 5.1.2 com a extensão GD
 * MySQL >= 4


## Instalando e configurando

Clone este repositório para um servidor web.

    git clone https://github.com/WP-Brasil/gerador-de-certificados.git .

Crie um banco para o gerador usando o schema do arquivo `dbschema.sql`.

    mysql -u <user> -p<pass> <database> < dbschema.sql

Crie um arquivo `config.php` usando `config-sample.php`, e o edite de acordo
com as instruções dentro dele.

    cp config-sample.php config.php

Crie uma pasta `cache` e certifique-se que o usuário web tem permissão de
escrita nela. Em todo caso:

    mkdir cache
    chmod 777 cache

Você provavelmente vai querer mudar as mensagens no `index.php` também.

## Formato dos dados e templates de certificados

Um template de certificado é nada mais do que uma imagem de fundo com os locais
pré-definidos para inserção dos dados em forma de texto. Estes templates
precisam ficar na pasta `img/bg-<certificate type>.png`. A localização em que o
texto fica na imagem está no arquivo `config.php` nas constantes `IMG_NAME_*` e
`IMG_DATA_*`.

![Certificate Template](https://github.com/vmassuchetto/certificate-generator/raw/master/doc/certificate-template.png)

Para preencher o banco de dados, você precisa de uma planilha com este formato:

<table>
  <tr>
    <td>id</td>
    <td>name</td>
    <td>email</td>
    <td>type</td>
    <td>data</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Some Person's Name</td>
    <td>someperson@email.com</td>
    <td>attendee</td>
    <td>5 hours</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Another Person's Name</td>
    <td>anotherperson@email.com</td>
    <td>speaker</td>
    <td>Presentation Title</td>
  </tr>
  <tr>
    <td>3</td>
    <td>One More Person's Name</td>
    <td>onemoreperson@email.com</td>
    <td>organizer</td>
    <td>20 hours</td>
  </tr>
</table>

Depois disto, basta importar a planilha no formato `csv` por algum gestor de
banco como o phpMyAdmin. Para este exemplo, certifique-se que você possui os
templates `bg-attendee.png`, `bg-speaker.png` e `bg-organizer.png` no diretório
`img`.

# English

## About

This is a very simple PHP script that uses some GD functions to generate event
attendance certificates. As naturally required for any academic-like event in
Brazil, we would like to generate documents with:

 * Name of the attendee and total hours of attendance
 * Name of the speaker and title of the presentation
 * Name of the organizer and total hours spent in the organization

The user is requested to visit a page and to type an e-mail address to get a
list of certificates like this in PNG format:

![Certificate Example](https://github.com/vmassuchetto/certificate-generator/raw/master/doc/certificate-example.png)

This application was initially used for [WordCamps](http://wordcamp.org) in Brazil.

## Requirements

 * PHP >= 5.1.2 with GD
 * MySQL >= 4

## Installing and Configuring

Clone the repo to a web host directory.

    cd DIRECTORY
    git clone https://github.com/vmassuchetto/certificate-generator.git .

Create a database with the schema in the `dbschema.sql` file.

    mysql -u <user> -p<pass> <database> < dbschema.sql

Create a `config.php` using `config-sample.php`, and edit it following the
instructions in the file.

    cp config-sample.php config.php

Create a `cache` directory and give it write permission. You can change this
location in `config.php`.

    mkdir cache
    chmod 777 cache

You'll propably want to edit `index.php` messages for your language and
context. It's all in Portuguese now.

## Data Format and Certificate Templates

A template certificate is pretty much a background image with proper locations
to have a name and description inserted. They need to be located at
`img/bg-<certificate type>.png`. The location of the name and description can
be set in `config.php` throught the `IMG_NAME_*` and `IMG_DATA_*` constants.

![Certificate Template](https://github.com/vmassuchetto/certificate-generator/raw/master/doc/certificate-template.png)

To fill the database you'll need a spreadsheet with the following format:

<table>
  <tr>
    <td>id</td>
    <td>name</td>
    <td>email</td>
    <td>type</td>
    <td>data</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Some Person's Name</td>
    <td>someperson@email.com</td>
    <td>attendee</td>
    <td>5 hours</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Another Person's Name</td>
    <td>anotherperson@email.com</td>
    <td>speaker</td>
    <td>Presentation Title</td>
  </tr>
  <tr>
    <td>3</td>
    <td>One More Person's Name</td>
    <td>onemoreperson@email.com</td>
    <td>organizer</td>
    <td>20 hours</td>
  </tr>
</table>

After that, you can easily import this spreadsheet via phpMyAdmin or other
MySQL manager.  For this example, make sure you have the `bg-attendee.png`,
`bg-speaker.png` and `bg-organizer.png` template files properly placed in the
`img` directory.
