<?php

namespace CMW\Implementation\Eve;

use CMW\Interface\Core\IMenus;
use CMW\Manager\Lang\LangManager;

class EveMenusImplementations implements IMenus{

    public function getRoutes(): array{
        return[
            LangManager::translate('Eve.eve') => 'eve'
        ];
    }

    public function getPackageName(): string{
        return 'Eve';
    }
}
?>