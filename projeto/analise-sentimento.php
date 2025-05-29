<?php

use function Codewithkyrian\Transformers\Pipelines\pipeline;

require_once __DIR__ . '/vendor/autoload.php';

$analisador = pipeline('sentiment-analysis'/*, modelName: 'Xenova/bert-base-multilingual-uncased-sentiment'*/);
$positivo = $analisador('I love PHP!');
$negativo = $analisador('I hate JavaScript!');
$neutro = $analisador('PHP and JavaScript are both programming languages with pros and cons.');

var_dump($positivo, $negativo, $neutro);
