# Projet_perso

BDD
    file.sql to import de database

Config
    dev.ini
        DB : database authentication parameters
        Installation : absolute webSite path URL

Controllers
    All pages controllers

Framework
    MVC files to charge and generate pages
    Configuration.php : To get the dev.ini configuration
    Controller.php : to find and get all controllers
    Model.php : Maque db connexion (return PDO object)
    Request.php : return $$_GET and $_POST parameters values
    Router.php : centralise the request, redirect to the controller and send all informations to the good view
    View.php : insert the view content to the template
    
Models
    All pages db request (CRUD)

Vendor
    All CSS and JS files

Views
    Templates and HTML code to show all pages