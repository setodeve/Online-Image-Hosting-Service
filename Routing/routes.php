<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;

return [
    ''=>function(): HTTPRenderer{
        $snipets = DatabaseHelper::getSnipets();
        return new HTMLRenderer('create', ['snipets'=>$snipets]);
    },
    'snipets'=>function(): HTTPRenderer{
        $snipets = DatabaseHelper::getSnipets();
        return new HTMLRenderer('snipets', ['snipets'=>$snipets]);
    },
    'snipet'=>function(): HTTPRenderer{
        $id = ValidationHelper::integer($_GET['id']??null);
        $snipet = DatabaseHelper::getSnipet($id);
        return new HTMLRenderer('snipet', ['snipet'=>$snipet]);
    },
    'no-exist'=>function(): HTTPRenderer{
        return new HTMLRenderer('no-exist', []);
    },
    '404'=>function(): HTTPRenderer{
        return new HTMLRenderer('404', []);
    }
];