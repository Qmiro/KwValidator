<?php

/**
 * @name KwValidator
 * @package Validator
 * @version 1.3.0
 * @author Miroslaw Kukuryka
 * @copyright (c) 2023 (https://www.appsonline.eu)
 * @link https://www.appsonline.eu
 */
declare(strict_types = 1);
namespace Application\Validator;

use Laminas\Validator\AbstractValidator;
use Laminas\Stdlib\ArrayUtils;
use Traversable;

class KwValidator extends AbstractValidator
{

    /**
     *
     * @var array
     */
    protected $options = [
        'allowShortNumber' => true
    ];

    /**
     *
     * @var string
     */
    private const KW_MORTGAGE_REGISTER_NUMBER_NOT_SCALAR = 'kwMontageRegisterNumberNotScalar';

    /**
     *
     * @var string
     */
    private const KW_INVALID_MORTGAGE_REGISTER_NUMBER_VALUE = 'kwInvalidMontageRegisterNumberValue';

    /**
     *
     * @var string
     */
    private const KW_INVALID_DISTRICT_COURT_DIVISION_CODE_VALUE = 'kwInvalidDistritCourtDivisionCodeValue';

    /**
     *
     * @var string
     */
    private const KW_INVALID_DISTRICT_COURT_DIVISION_CODE = 'kwInvalidDistritCourtDivisionCode';

    /**
     *
     * @var string
     */
    private const KW_INVALID_MORTGAGE_REGISTER_NUMBER = 'kwInvalidMontageRegisterNumber';

    /**
     *
     * @var string
     */
    private const KW_INVALID_CHECK_DIGIT_MORTGAGE_REGISTER_NUMBER = 'kwInvalidCheckDigitMontageRegisterNumber';

    /**
     *
     * @var array
     */
    protected $messageTemplates = [
        self::KW_MORTGAGE_REGISTER_NUMBER_NOT_SCALAR => 'The land and mortgage register number must be a scalar value',
        self::KW_INVALID_MORTGAGE_REGISTER_NUMBER_VALUE => 'Invalid land and mortgage register number value',
        self::KW_INVALID_DISTRICT_COURT_DIVISION_CODE_VALUE => 'Invalid Value District Court Division Code',
        self::KW_INVALID_DISTRICT_COURT_DIVISION_CODE => 'Invalid District Court Division Code',
        self::KW_INVALID_MORTGAGE_REGISTER_NUMBER => 'Invalid land and mortgage register number',
        self::KW_INVALID_CHECK_DIGIT_MORTGAGE_REGISTER_NUMBER => 'Invalid check digit for land and mortgage register number'
    ];

    /**
     *
     * @name constructor
     * @access public
     * @param array $options
     */
    public function __construct($options = null)
    {
        if ($options instanceof Traversable) {
            $options = ArrayUtils::iteratorToArray($options);
        }

        parent::__construct($options);
    }

    /**
     *
     * @name checkCourtId
     * @access private
     * @param string $value
     * @return boolean
     */
    private function checkCourtId($value): bool
    {
        $courtId = [
            "WL1A",
            "SU1A",
            "OL1Y",
            "PT1B",
            "KA1B",
            "LU1B",
            "RA2G",
            "KO1B",
            "BI1B",
            "BB1B",
            "BI1P",
            "ZA1B",
            "OL1B",
            "TR1O",
            "JG1B",
            "EL1B",
            "TO1B",
            "OP1B",
            "TR1B",
            "LD1B",
            "KS1B",
            "KI1B",
            "BY1B",
            "KA1Y",
            "SL1B",
            "LU1C",
            "TO1C",
            "PO1H",
            "SL1C",
            "KA1C",
            "SZ1C",
            "KR1C",
            "PL1C",
            "BB1C",
            "PO2T",
            "KR1K",
            "CZ1C",
            "SL1Z",
            "KA1D",
            "TR1D",
            "RZ1D",
            "KR2Y",
            "KO1D",
            "EL1D",
            "SW1D",
            "EL1E",
            "OL1E",
            "SI1G",
            "GD1G",
            "GD1Y",
            "OL1G",
            "GL1G",
            "LE1G",
            "OP1G",
            "PO1G",
            "SZ1O",
            "TO1G",
            "NS1G",
            "GW1G",
            "PL1G",
            "PO1Y",
            "LM1G",
            "WA1G",
            "PO1S",
            "RA1G",
            "TO1U",
            "SZ1G",
            "SZ1Y",
            "ZG2K",
            "BI2P",
            "ZA1H",
            "EL1I",
            "BY1I",
            "ZA1J",
            "KZ1J",
            "PR1J",
            "KS1J",
            "GL1J",
            "LE1J",
            "KA1J",
            "JG1J",
            "KI1J",
            "KZ1A",
            "JG1K",
            "SZ1K",
            "GD1R",
            "KA1K",
            "KI1I",
            "OP1K",
            "KZ1E",
            "OL1K",
            "KR2E",
            "KI1L",
            "OP1U",
            "CZ2C",
            "SW1K",
            "TB1K",
            "KO1L",
            "KN1K",
            "KN1N",
            "KI1K",
            "KO1K",
            "PO1K",
            "GD1E",
            "RA1K",
            "KR1P",
            "ZA1K",
            "LU1K",
            "KS1K",
            "ZG1K",
            "KZ1R",
            "KR2K",
            "LD1K",
            "GD1I",
            "WA1L",
            "LE1L",
            "KS1E",
            "PO1L",
            "RZ1E",
            "SL1L",
            "OL1L",
            "NS1L",
            "WL1L",
            "RA1L",
            "PR1L",
            "JG1L",
            "LU1A",
            "LE1U",
            "CZ1L",
            "LU1I",
            "JG1S",
            "RZ1A",
            "SR1L",
            "LD1Y",
            "SZ1L",
            "LM1L",
            "SI2S",
            "LD1O",
            "LD1M",
            "LU1U",
            "GD1M",
            "SL1M",
            "KR1M",
            "TB1M",
            "PO2A",
            "GW1M",
            "KA1M",
            "WR1M",
            "SI1M",
            "PL1M",
            "BY1M",
            "EL2O",
            "OL1M",
            "NS2L",
            "NS1M",
            "KA1L",
            "CZ1M",
            "KR1Y",
            "SZ1M",
            "BY1N",
            "OL1N",
            "KR2I",
            "TB1N",
            "SW2K",
            "ZG1N",
            "EL1N",
            "GD2M",
            "WA1N",
            "NS1S",
            "NS1T",
            "PO1N",
            "OP1N",
            "PO1O",
            "OL1C",
            "OP1L",
            "WR1E",
            "KR1O",
            "OL1O",
            "WR1O",
            "KI1T",
            "PT1O",
            "LU1O",
            "OP1O",
            "OS1O",
            "KI1O",
            "EL1O",
            "OS1M",
            "KZ1W",
            "KZ1O",
            "KR1E",
            "WA1O",
            "LD1P",
            "SR2W",
            "WA1I",
            "PO1I",
            "KI1P",
            "RA2Z",
            "PT1P",
            "OL1P",
            "KZ1P",
            "PL1P",
            "PL1L",
            "SR2L",
            "SZ2S",
            "PO1P",
            "PO2P",
            "KR1H",
            "OP1P",
            "WA1P",
            "OS1P",
            "PR1P",
            "PR1R",
            "RA1P",
            "KA1P",
            "GD2W",
            "LU1P",
            "OS1U",
            "SZ2T",
            "GL1R",
            "RA1R",
            "PT1R",
            "WL1R",
            "LU1R",
            "LD1R",
            "PO1R",
            "RZ1R",
            "GL1S",
            "GL1Y",
            "LU1Y",
            "WL1Y",
            "RZ1Z",
            "KI1S",
            "KS1S",
            "SU1N",
            "BY2T",
            "SI1S",
            "KA1I",
            "BI3P",
            "PR2R",
            "SR1S",
            "PL1E",
            "KR2P",
            "KI1R",
            "KR3I",
            "LD1H",
            "KO1E",
            "KR1S",
            "GW1S",
            "KN1S",
            "SL1S",
            "PL1O",
            "SI1P",
            "BI1S",
            "GD1S",
            "KA1S",
            "TB1S",
            "KI1H",
            "SZ1T",
            "GD1A",
            "KI1A",
            "GW1K",
            "OP1S",
            "WR1T",
            "RZ1S",
            "KR1B",
            "ZG2S",
            "GW1U",
            "SU1S",
            "PO1A",
            "KO1I",
            "SZ1S",
            "OL1S",
            "GD2I",
            "BY1U",
            "RA1S",
            "PO1M",
            "WR1S",
            "PO1D",
            "SW1S",
            "KO2B",
            "ZG1S",
            "BY1S",
            "SZ1W",
            "TB1T",
            "GL1T",
            "TR1T",
            "GD1T",
            "ZA1T",
            "PT1T",
            "TO1T",
            "PO1T",
            "WR1W",
            "BY1T",
            "TR2T",
            "KN1T",
            "KA1T",
            "RZ2Z",
            "KS2E",
            "KR1W",
            "SW1W",
            "KO1W",
            "WA3M",
            "WA1M",
            "WA2M",
            "WA4M",
            "WA5M",
            "WA6M",
            "TO1W",
            "PO1B",
            "GD1W",
            "OL2G",
            "SI1W",
            "KR1I",
            "SR1W",
            "WL1W",
            "LU1W",
            "KI1W",
            "GL1W",
            "PO1E",
            "WA1W",
            "WR1L",
            "WR1K",
            "PO1F",
            "ZG1W",
            "PO2H",
            "LM1W",
            "OS1W",
            "GL1Z",
            "NS1Z",
            "LM1Z",
            "ZA1Z",
            "CZ1Z",
            "SW1Z",
            "SR1Z",
            "LD1G",
            "JG1Z",
            "ZG1E",
            "LE1Z",
            "PO1Z",
            "RA1Z",
            "ZG1G",
            "ZG1R",
            "BY1Z",
            "GL1X",
            "PL2M",
            "PL1Z",
            "BB1Z"
        ];

        if (in_array($value, $courtId)) {
            return true;
        }

        return false;
    }

    /**
     *
     * @name calculateId
     * @access private
     * @param string $value
     * @return number
     */
    private function calculateId($value): int
    {
        $split = str_split($value);

        $letterValues = [
            '0',
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            'X',
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'R',
            'S',
            'T',
            'U',
            'W',
            'Y',
            'Z'
        ];

        $map = [];

        for ($i = 0; $i <= 33; $i ++) {
            if (! isset($map[$letterValues[$i]])) {
                $map[$letterValues[$i]] = $i;
            }
        }

        $sum = 0;

        for ($i = 0; $i <= 11; $i ++) {
            if (isset($map[$split[$i]])) {
                if ($i == 0) {
                    $sum += ($map[$split[$i]] * 1);
                } else {
                    $tmp = ($i % 3);
                    if ($tmp == 0) {
                        $sum += ($map[$split[$i]] * 1);
                    } else if ($tmp == 1) {
                        $sum += ($map[$split[$i]] * 3);
                    } else {
                        $sum += ($map[$split[$i]] * 7);
                    }
                }
            }
        }

        if ($sum > 0) {
            return ($sum % 10);
        }

        return 0;
    }

    /**
     *
     * @name isValid
     * @access public
     * @param string $value
     * @see \Laminas\Validator\ValidatorInterface::isValid()
     * @return boolean
     */
    public function isValid($value): bool
    {
        if (! is_scalar($value)) {
            $this->error(self::KW_MORTGAGE_REGISTER_NUMBER_NOT_SCALAR);
            return false;
        }

        if (strlen($value) > 15) {
            $this->error(self::KW_INVALID_MORTGAGE_REGISTER_NUMBER_VALUE);
            return false;
        }

        $kw = explode('/', trim($value));

        $court = false;
        if (isset($kw[0])) {
            $court = $kw[0];
        }

        if (is_bool($court)) {
            $this->error(self::KW_INVALID_DISTRICT_COURT_DIVISION_CODE_VALUE);
            return false;
        }
        
        if (! preg_match('/^[A-Z0-9]{4}$/i', $court)) {
            $this->error(self::KW_INVALID_DISTRICT_COURT_DIVISION_CODE_VALUE);
            return false;
        }

        if ($this->checkCourtId($court) !== true) {
            $this->error(self::KW_INVALID_DISTRICT_COURT_DIVISION_CODE);
            return false;
        }

        $id = 0;
        if (isset($kw[1])) {
            $id = $kw[1];
            if ($this->options['allowShortNumber'] !== false) {
                $id = str_pad($id, 8, '0', STR_PAD_LEFT);
            }
        }

        if ($id == 0) {
            $this->error(self::KW_INVALID_MORTGAGE_REGISTER_NUMBER);
            return false;
        }

        if (! preg_match('/^[0-9]{8}$/i', $id)) {
            $this->error(self::KW_INVALID_MORTGAGE_REGISTER_NUMBER);
            return false;
        }

        $checkDigit = $this->calculateId($court . $id);
        if ($checkDigit != $kw[2]) {
            $this->error(self::KW_INVALID_CHECK_DIGIT_MORTGAGE_REGISTER_NUMBER);
            return false;
        }

        return true;
    }
}