<?php namespace monochrome; ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>création d'une classe «Personne» en PHP</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>

  <style>
    .borded {
        display: inline-block;

        border: 1px solid black;
        border-radius: 1em;
        
        margin: 2em;
        padding:2em;
    }

    .unknown {
        color: red;
    }
  </style>   

  <body>
<?php
    require 'class/monochrome/autoload.php';
    autoload::on();

    $personne = new Personne( 'Poutine', 'Vladimir',
                     "58, route du Kremlin\n55666 MOSCOU",
                     new \DateTime('1958-05-12')
                 );

    #show the whole datas
    $personne->print_infos('borded', 'unknown');
    #show the age
    echo '<div class="borded">Âge actuel&nbsp;: ' . $personne->get_age() . "</div>\n";

    echo "<hr>\n<p>Même objet après modifications&nbsp;:</p>\n";


    #modify the address and show it
    $personne->set_address('23, rue de la Bouse, 57845 TRIPOUILLY-EN-CAMBROUSE');
    $personne->print_infos('borded', 'unknown');
    #show the age again
    echo '<div class="borded">Âge actuel&nbsp;: ' . $personne->get_age() . "</div>\n";

?>
  </body>
</html>