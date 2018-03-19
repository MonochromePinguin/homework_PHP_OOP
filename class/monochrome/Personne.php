<?php

namespace monochrome;

/**
* Class Personne
* You do know what it's about
*/

class Personne
{
    /**
    *   @var string $nom
    *   @var string $surname
    */
    private $nom, $surname;

    /**
    * @var string $adresse store the people's known address as a string
    */
    private $adresse;

    /**
    * @var Datetime $birthDate
    */
    private $birthDate;


    /**
    * @param string $name
    * @param string $surname
    * @param string $adr    store the known address of the people. NULL accepted
    * @param birth_date      birth date as a DateTime . NULL accepted
    */
    function __construct( string $name, string $surname,
                         string $adr = NULL,
                         \DateTime $birth_date = NULL )
    {
        if ( empty( $name ) || empty( $surname ) )
            throw new Exception(
                    'Les paramètres $nom et $surname ne peuvent être null', 1);
        else
        {
            $this->name = htmlspecialchars( addslashes( $name ) );
            $this->surname = htmlspecialchars( addslashes( $surname ) );
            $this->address = htmlspecialchars( addslashes( $adr ) );
            $this->birth_date = $birth_date;
        }

    }

    /**
    * Output all the available informations of the object into a classed <section> element
    * @param string $class class to apply to the whole <section> element
    * @param string $error_class class to apply to the span telling the property isn't set
    */ 
    public function print_infos( string $class = '', string $error_class = '' )
    {
        echo '<section class="' . $class . "\">\n<h1>" . $this->name
            . ' ' . $this->surname
            . "</h1>\n<p>Adresse&nbsp;:<br>\n"
            . ( $this->address ?? '<span class="' . $error_class
                . '">non renseignée</span>' )
            .  "</p>\n<p>Date de naissance&nbsp;:"
            . ( $this->birth_date ?
                    $this->birth_date->format('d/m/Y')
                    : '<span class="' . $error_class . '">inconnue</span>' )
            . "\n</p>\n</section>\n";
    }


    /**
    * change the address field
    * @param string $newAdr
    */
    public function set_address( string $new_adr )
    {
        $this->address = htmlspecialchars( addslashes( $new_adr ) );
    }


    /**
    * return the person's age, in years, calculated from current system date, as int, or the string "inconnu" if the birth date is unknown
    * @return int
    */
    public function get_age()
    {
        if ( isset( $this->birth_date ) )
            return  date('Y') - $this->birth_date->format('Y');
        else
            return 'inconnu';
    }

}