<?php

require_once __DIR__ . '/vendor/autoload.php';

use Codewithkyrian\Transformers\Utils\ImageDriver;
use Codewithkyrian\Transformers\Transformers;
use function Codewithkyrian\Transformers\Pipelines\pipeline;

Transformers::setup()->setImageDriver(ImageDriver::VIPS);

$task = pipeline('image-to-text');
$result = $task('eu.jpg');

var_dump($result);
