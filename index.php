<?php

require_once "vendor/autoload.php";

// https://github.com/mbilbille/jpnforphp
use JpnForPhp\Converter\Converter;

$dateTime = new DateTime("now");
$thisYear = (integer)($dateTime->format("Y"));

for ($i = $thisYear - 10 ; $i < $thisYear + 10 ; $i++) {
    format($i);
}

function format($targetYear) {
    echo '### ' . $targetYear . '年'
         . '(' . Converter::toJapaneseYear($targetYear) . ')は' . "\n" . PHP_EOL;

    foreach (Converter::$mapEras as $era) {
        $difference = $targetYear - $era['year'];
        if (($difference % 50) === 0) {
            echo ' * ' . formatEraWithWikipediaLink($era['kanji']) . "\t" . $difference . '年' . PHP_EOL;
        }
    }

    echo "\n";
}

function formatEraWithWikipediaLink($eraName) {
    return '[' . $eraName . '](' . 'https://ja.wikipedia.org/wiki/' . $eraName . ')';
}
