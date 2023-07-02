<?php

namespace CMW\View\Eve;

use CMW\Manager\Lang\LangManager;
use CMW\Manager\Security\SecurityManager;


$title = LangManager::translate("eve.manage.title");
$description = LangManager::translate("eve.manage.desc");
$link = "https://login.eveonline.com/v2/oauth/authorize/?";
$callbackUrl = $eveModel->getSettingsbyId('callbackUrl')?->getValue();
$unique = "SQDUQSDQSJFZAFDAZD5878486FEDFAZEDZADZADZAFGAZDAZ";
$linkToEve = $link."response_type=code&redirect_uri=".$callbackUrl."&client_id=".$eveModel->getSettingsbyId('clientId')?->getValue()."&scope=esi-characters.read_blueprints.v1%20esi-corporations.read_contacts.v1&state=".$unique;

?>
<div class="d-flex flex-wrap justify-content-between">
    <h3><i class="fa-solid fa-sliders"></i> <span class="m-lg-auto"><?= $title ?></span></h3>
</div>

<section class="row">
    <div class="col-12 col-lg-3">
        <!-- <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="" method="post" >
                        <input name="secretKey" type="text" placeholder="ce que tu veut" >
                    </h2>
                    <h2>
                    </h2>
                    <h2>
                    <h2>
                    <button type="submit">Soumettre </button>
                </form>
            </div>
        </div> -->
        <div class="card">
            <div class="card-header">
                <h4><?= LangManager::translate("votes.dashboard.title.settings") ?></h4>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <?php (new SecurityManager())->insertHiddenToken() ?>
                    <h6><?= LangManager::translate("eve.eve.ClientId") ?> :</h6>
                    <div class="form-group position-relative ">
                        <input type="text" class="form-control" name="clientId" value="<?= $eveModel->getSettingsbyId('clientId')?->getValue() ?? 'vide' ?>"
                               required>
                    </div>
                    <h6><?= LangManager::translate("eve.eve.secretKey") ?> :</h6>
                    <div class="form-group position-relative">
                    <input type="text" class="form-control" name="secretKey" value="<?= $eveModel->getSettingsbyId('secretKey')?->getValue() ?? 'vide' ?>"
                               required>
                    </div>
                    <h6><?= LangManager::translate("eve.eve.CallbackURL") ?> :</h6>
                    <div class="form-group position-relative">
                    <input type="url" class="form-control" name="callbackUrl" value="<?= $eveModel->getSettingsbyId('callbackUrl')?->getValue() ?? 'vide' ?>"
                               required>
                    </div>
                    <div class="form-group position-relative">
                    <h6><?= LangManager::translate("eve.eve.LastUpdated") ?> :</h6>
                        <?= $eveModel->getSettingsbyId('clientId')?->getUpdated() ?? 'vide' ?>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                                class="btn btn-primary"><?= LangManager::translate("core.btn.save") ?></button>
                    </div>
                </form>
                <a href="<?=$linkToEve?>">TestEveOnline</a>

            </div>
        </div>
    </div>
</section>