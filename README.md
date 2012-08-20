About
-----

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


Requirements
------------

 * PHP >= 5.1.2 with GD
 * MySQL >= 4


Installing and Configuring
--------------------------

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


Data Format and Certificate Templates
-------------------------------------

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
