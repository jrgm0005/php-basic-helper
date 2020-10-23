<?php
// ------------------------------------------------------------------------------------------------

namespace PHPHelper;

use \stdClass;
use \Exception;
use \SimpleXMLElement;

class PHPHelper
{

 // CONST

    const HTTP_GET = 'GET';
    const HTTP_POST = 'POST';

    const PHP_INPUT_POST = "php://input";

// PUBLIC FUNCTIONS

    public function generateRandomString(int $length = 10) : string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getXMLPostData() : SimpleXMLElement
    {
        $incomingData = substr( file_get_contents(self::PHP_INPUT_POST), 0, 300000);
        $incomingData = simplexml_load_string($incomingData);
        return $incomingData;
    }

    public function returnXMLWithoutHeader(SimpleXMLElement $xml) : string
    {
        $dom = dom_import_simplexml($xml);
        $dom->ownerDocument->formatOutput = true;
        return $dom->ownerDocument->saveXML($dom->ownerDocument->documentElement);
    }

    public function str_contains(string $haystack, string $needle): bool {
        return strpos($haystack, $needle) !== false;
    }


// FUNCTIONS BEING ADDED IN PHP 8

    //TODO: JRGM ===> REMOVE WHEN UPDATING TO PHP8. PHP x < 8 don't have own function for this.
    // https://php.watch/versions/8.0/str_starts_with-str_ends_with
    public function str_starts_with(string $haystack, string $needle): bool {
        return \strncmp($haystack, $needle, \strlen($needle)) === 0;
    }
    public function str_ends_with(string $haystack, string $needle): bool {
        return $needle === '' || $needle === \substr($haystack, - \strlen($needle));
    }

// PROTECTED/PRIVATE FUNCTIONS

}