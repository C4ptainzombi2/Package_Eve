<?php

namespace CMW\Implementation\Eve;

use CMW\Interface\Core\IMenus;
use CMW\Manager\Env\EnvManager;
use CMW\Manager\Lang\LangManager;
use CMW\Model\Eve\EveModel;
use CMW\Utils\Website;

class EveMenusImplementations implements IMenus{

    public function getRoutes(): array{
                $eve = EveModel::getInstance();

                $link = "https://login.eveonline.com/v2/oauth/authorize/?";
                $callbackUrl = Website::getProtocol()."://".$_SERVER['SERVER_NAME'].EnvManager::getInstance()->getValue("PATH_SUBFOLDER")."eve";
                $unique = uniqid('', true);
                $linkToEve = $link."response_type=code&redirect_uri=".$callbackUrl."&client_id=".$eve->getSettingsbyId('clientId')?->getValue()."&scope=esi-characters.read_blueprints.v1%20esi-corporations.read_contacts.v1&state=".$unique;

                return[
                LangManager::translate('Eve.eve') => $linkToEve
        ];
    }

    public function getPackageName(): string{
        return 'Eve';
    }
}
?>