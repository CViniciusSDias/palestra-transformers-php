<?php

use function Codewithkyrian\Transformers\Pipelines\pipeline;

require_once __DIR__ . '/vendor/autoload.php';

$analyser = pipeline('sentiment-analysis', modelName: 'Xenova/bert-base-multilingual-uncased-sentiment');
$positive = $analyser('I love PHP!');
$negative = $analyser('I hate JavaScript!');
$neutral = $analyser('PHP and JavaScript are both programming languages with pros and cons, but both are slow');

var_dump($positive, $negative, $neutral);
