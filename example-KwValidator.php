<?php

/**
 * @filesource example-KwValidator.php
 * 
 * Message templates
 * kwMontageRegisterNumberNotScalar - Numer księgi wieczystej musi być wartością skalarną
 * kwInvalidMontageRegisterNumberValue - Nie prawidłowa wartość numeru księgi wieczystej
 * kwInvalidDistritCourtDivisionCodeValue - Nie prawidłowa wartość Kod wydziału Sądu Rejenowego
 * kwInvalidDistritCourtDivisionCode - Nieprawidłowy Kod wydziału Sądu Rejonowego
 * kwInvalidMontageRegisterNumber - Nieprawidłowy numer księgi wieczystej
 * kwInvalidCheckDigitMontageRegisterNumber - Nieprawidłowa cyfra kontrolna dla numeru księgi wieczystej
 */
declare(strict_types = 1);
use Application\Validator\KwValidator;

include __DIR__ . '/vendor/autoload.php';

$kwNunumber = 'WA1P/122758/6';

/**
 * Zezwalamy na krótki numer księgi wieczystej
 */

$validator = new KwValidator();

if ($validator->isValid($kwNunumber) !== false) {
    echo 'Podany numer księgi wieczystej jest prawidłowy!<br/>';
} else {
    echo 'Podany numer księgi wieczystej jest nie prawidłowy!<br/>';
    $messages = $validator->getMessages();
    foreach ($messages as $key => $value) {
        echo $key . ' => ' . $value . '<br/>';
    }
}

/**
 * Nie zezwalamy na krótki numer księgi wieczystej
 */

$validator = new KwValidator([
    'allowShortNumber' => false
]);

if ($validator->isValid($kwNunumber) !== false) {
    echo 'Podany numer księgi wieczystej jest prawidłowy!<br/>';
} else {
    echo 'Podany numer księgi wieczystej jest nie prawidłowy!<br/>';
    $messages = $validator->getMessages();
    foreach ($messages as $key => $value) {
        echo $key . ' => ' . $value . '<br/>';
    }
}