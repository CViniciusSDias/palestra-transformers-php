<?php

use Codewithkyrian\Transformers\Generation\AggregationStrategy;
use function Codewithkyrian\Transformers\Pipelines\pipeline;

require_once __DIR__ . '/vendor/autoload.php';

$text = 'Meu nome é Vinicius Dias e eu trabalho em uma empresa chamada SOCi Inc que fica nos Estados Unidos.';

$ner = pipeline('ner', modelName: 'cviniciussdias/wikineural-multilingual-ner', quantized: false);
$output = $ner($text, aggregationStrategy: AggregationStrategy::AVERAGE);

var_dump($output);
