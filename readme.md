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