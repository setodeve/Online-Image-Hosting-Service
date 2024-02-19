<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;

return [
    ''=>function(): HTTPRenderer{
        return new HTMLRenderer('create', []);
    },
    'images'=>function(): HTTPRenderer{
        $images = DatabaseHelper::getImages();
        return new HTMLRenderer('images', ["images" => $images]);
    },
    'image'=>function(): HTTPRenderer{
        $name = ValidationHelper::string($_GET['name']??null);
        $image = DatabaseHelper::getImage($name);
        return new HTMLRenderer('image', ["image" => $image]);
    },
    'no-exist'=>function(): HTTPRenderer{
        return new HTMLRenderer('no-exist', []);
    },
    '404'=>function(): HTTPRenderer{
        return new HTMLRenderer('404', []);
    }
];