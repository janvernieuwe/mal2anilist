[![Latest Stable Version](https://poser.pugx.org/janvernieuwe/mal2anilist/v/stable)](https://packagist.org/packages/janvernieuwe/mal2anilist)
[![Total Downloads](https://poser.pugx.org/janvernieuwe/mal2anilist/downloads)](https://packagist.org/packages/janvernieuwe/mal2anilist)
[![License](https://poser.pugx.org/janvernieuwe/mal2anilist/license)](https://packagist.org/packages/janvernieuwe/mal2anilist)

# Converter

This is a simple lib to convert myanimelist id's to a anilist url.

## Installation

```
composer require janvernieuwe/mal2anilist
```

## Usage

```php
$mal2Anilist = new \Mal2Anilist\Converter();
$url = $mal2Anilist->getAnilistUrl(37430);
// $url is now 'https://anilist.co/anime/101280'
```

When it cannot be found, null is returned.
