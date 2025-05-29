<?php

use Codewithkyrian\Transformers\Models\Auto\AutoModel;
use Codewithkyrian\Transformers\Processors\AutoProcessor;
use Codewithkyrian\Transformers\Transformers;
use Codewithkyrian\Transformers\Utils\Image;
use Codewithkyrian\Transformers\Utils\ImageDriver;

require __DIR__ . '/vendor/autoload.php';

Transformers::setup()
	->setImageDriver(ImageDriver::VIPS)
	->setAuthToken('');

$model = AutoModel::fromPretrained('briaai/RMBG-2.0');
$processor = AutoProcessor::fromPretrained('briaai/RMBG-2.0');

$image = Image::read(__DIR__ . '/eu.jpg');
$saida = $model($processor($image));

['alphas' => $outputPixels] = $saida;
$whitePixels = $outputPixels[0]->multiply(255);
$mask = Image::fromTensor($whitePixels)
	->resize($image->width(), $image->height());

$maskedImage = $image->applyMask($mask);
$maskedImage->save(__DIR__ . '/transparente.png');
