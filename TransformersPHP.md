---
marp: true
theme: default
lang: pt
title: "Executando modelos pré-treinados com TransformersPHP"
author: "Vinicius Dias"
keywords: ["Vinicius Dias", "Dias de Dev", "cviniciussdias", "IA", "Inteligência Artificial", "Transformers", "TransformersPHP", "HuggingFace"]
---
<style>
    p:has(img) {
        text-align: center;
    }
</style>

# TransformersPHP
## Executando modelos pré-treinados de IA

---

<style scoped>
    p:has(img) {
        display: flex;
        align-items: center;
        gap: .2rem;
        margin-bottom: 0;
    }
</style>

# Quem é Vinicius Dias?

- Especialista em Arquitetura de Software
- Senior Software Engineer na SOCi
- Instrutor na Alura
- Canal Dias de Dev no YouTube

## Links
![width:30px](linkedin-83.svg) ![width:30px](https://upload.wikimedia.org/wikipedia/commons/5/5a/X_icon_2.svg)@cviniciussdias

https://dias.dev/
https://youtube.com/@DiasDeDev

---

# Dê feedback

Nenhuma apresentação é perfeita e nós que criamos conteúdo sabemos disso.
Nossa intenção é transmitir conhecimento da melhor forma possível e sua opinião é muito importante para isso.

![QR Code](qrcode.png)

---

# O que é IA

Área da computação focada em desenvolver algoritmos e sistemas que permitem máquinas performarem tarefas que tipicamente exigem inteligência humana como aprendizado, raciocínio e tomada de decisão.

---

# O que é IA

- Machine Learning
- Processamento de linguagem natural
- Visão computacional
- Robótica
- Etc

---

# Exemplos de aplicação

- Transcrição de áudio
- Tradução de texto
- Recomendação de conteúdo

---

# IA com PHP

![](ia-com-php.png)

---

# Transformers

![height:14cm](foto-bumblebee.jpeg)

---

# Transformers

Tipo de arquitetura de redes neurais criada para processamento de dados sequenciais.

---

# TransformersPHP

> State-of-the-art Machine Learning for PHP. Run Transformers natively in your PHP projects

---

# TransformersPHP

## Pré-requisitos

- PHP 8.1+
- Composer
- Extensão FFI
- JIT (opcional, para performance)
- Limite de memória aumentado

---

# TransformersPHP

<!-- Durante a instalação um plugin trará as bibliotecas do sistema para a execução dos modelos -->

## Instalação

```shell
$ composer require codewithkyrian/transformers
```

---

# Resumindo textos com TransformersPHP

```php
<?php

use function Codewithkyrian\Transformers\Pipelines\pipeline;

require_once __DIR__ . '/vendor/autoload.php';

$resumidor = pipeline('summarization');
$textoGrande = '...';
$resumo = $resumidor($textoGrande, maxNewTokens: 100);

var_dump($resumo);

```

---

# Mais tarefas com texto

- Análise de sentimento
- Resposta de perguntas
- Tradução
- Geração de texto
- Etc.

---

# Modelos diferentes para mesma tarefa

## Análise de sentimento

```php
<?php

$analisador = pipeline(
    'sentiment-analysis',
    modelName: 'Xenova/bert-base-multilingual-uncased-sentiment'
);
$positivo = $analisador('I love PHP!');
$negativo = $analisador('I hate JavaScript!');

var_dump($positivo, $negativo);

```

---

# Além do texto

## Lidando com imagens

```php
use Codewithkyrian\Transformers\Utils\ImageDriver;
use Codewithkyrian\Transformers\Transformers;

Transformers::setup()
    ->setImageDriver(ImageDriver::VIPS);
$tarefa = pipeline('image-to-text');
$resultado = $tarefa('imagem.jpg');
```

---

# Drivers de imagem

- Imagick
- GD
- VIPS

---

# Encontrando modelos

## Hugging Face
![width:400px](huggingface_logo-noborder.svg)

---

# Filtros

- Transformers.js
- ONNX

---

# Limitações

Pipelines não podem fazer tudo por nós

---

# Modelos não suportados

## AutoModel

```php
$model = AutoModel::fromPretrained('briaai/RMBG-2.0');
```

---

# Modelos não suportados

## AutoProcessor

```php
$processor = AutoProcessor::fromPretrained('briaai/RMBG-2.0');
```

---

# Modelos não suportados

## Juntando as partes

```php
$image = Image::read(__DIR__ . '/eu.jpg');
$saida = $model($processor($image));
```

---

# Modelos não suportados

## Saída do modelo + TransformersPHP = <3

---

# Removendo fundo da imagem

```php
['alphas' => $outputPixels] = $saida;
$whitePixels = $outputPixels[0]->multiply(255);
$mask = Image::fromTensor($whitePixels)
	->resize($image->width(), $image->height());

$maskedImage = $image->applyMask($mask);
$maskedImage->save(__DIR__ . '/transparente.png');
```

---

# Quando usar?

Ferramenta ainda instável, com bugs e performance aquém do ideal.

Use com sabedoria

---

# Obrigado

![width:500px](qrcode.png)
