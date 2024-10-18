<?php
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

\Bitrix\Main\Loader::registerAutoloadClasses(
    'victory.options',
    array(
        'Victory\Options\CVictoryOptions' => 'lib/CVictoryOptions.php',
    )
);
