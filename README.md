# KwValidator
Weryfikacja numeru księgi wieczystej

Walidator służący do weryfikacji numeru księgi wieczystej obowiązujący na terenie Polski. Jest on rozszerzeniem dostępnych walidatorów dla <b>Laminas Framework</b> (dawniej <b>Zend Frameworok</b>).

Weryfikacja poprawności podanego numeru księgi wieczystej obowiązujący na terenie Polski udostępnionych przez Ministerstwo Sprawiedliwości

Treść wybranej księgi na podstawie numeru możemy sprawdzić pod adresem https://przegladarka-ekw.ms.gov.pl/eukw_prz/KsiegiWieczyste/wyszukiwanieKW

Każdy wpis do rejestru posiada swój unikalny identyfikator, czyli numer księgi wieczystej, składający się z 3 części oddzielonych znakiem ukośnika: XXXX/XXXXXXXX/X. 
 - ierwsza część składa się z 4 znaków, które identyfikują sąd prowadzący daną księgę wieczystą.
 - Druga część składa się z 8 cyfr, które identyfikują nieruchomość w księdze wieczystej.
 - Ostatnia, trzecia część to tzw. cyfra kontrolna.

Możliwa jest walidacja zarówno krótkiego jak i pełnego numeru kśiegi. Jest to uzależnione od ustawienia opcji 
 - <b>allowShortNumber</b> - domyślnie wartość jest ustawiona na <b>true</b> co zezwala na podawanie skróconego numeu 

Użycie walidatora dla krótkiego mumeru

```php

<?php

declare(strict_types = 1);
use Application\Validator\KwValidator;

include __DIR__ . '/vendor/autoload.php';

$kaNumber = 'WA1P/122758/6';

$validator = new KwValidator();
if ($validator->isValid($kwNunumber) !== false) {
    echo 'Podany numer księgi wieczystej jest prawidłowy!';
} else {
    echo 'Podany numer księgi wieczystej jest nie prawidłowy!<br/>';
    $messages = $validator->getMessages();
    foreach ($messages as $key => $value) {
        echo $key . ' => ' . $value . '<br/>';
    }
}
```
Użycie walidatora dla pełneo mumeru

```php
<?php

declare(strict_types = 1);
use Application\Validator\KwValidator;

include __DIR__ . '/vendor/autoload.php';

$kaNumber = 'WA1P/00122758/6';

$validator = new KwValidator([
    'allowShortNumber' => false
]);
if ($validator->isValid($kwNunumber) !== false) {
    echo 'Podany numer księgi wieczystej jest prawidłowy!';
} else {
    echo 'Podany numer księgi wieczystej jest nie prawidłowy!<br/>';
    $messages = $validator->getMessages();
    foreach ($messages as $key => $value) {
        echo $key . ' => ' . $value . '<br/>';
    }
}
```
Wartości dla kluczy tłumaczeń walidatora
 - kwMontageRegisterNumberNotScalar - Numer księgi wieczystej musi być wartością skalarną
 - kwInvalidMontageRegisterNumberValue - Nie prawidłowa wartość numeru księgi wieczystej
 - kwInvalidDistritCourtDivisionCodeValue - Nie prawidłowa wartość Kod wydziału Sądu Rejenowego
 - kwInvalidDistritCourtDivisionCode - Nieprawidłowy Kod wydziału Sądu Rejonowego
 - kwInvalidMontageRegisterNumber - Nieprawidłowy numer księgi wieczystej
 - kwInvalidCheckDigitMontageRegisterNumber - Nieprawidłowa cyfra kontrolna dla numeru księgi wieczystej
