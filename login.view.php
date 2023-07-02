<?php




$link = "https://login.eveonline.com/v2/oauth/authorize/?";
$callbackUrl = "https://remityldektest.wstr.fr/eve";
$unique = "SQDUQSDQSJFZAFDAZD5878486FEDFAZEDZADZADZAFGAZDAZ";
$linkToEve = $link."response_type=code&redirect_uri=".$callbackUrl."&client_id=".$eve->getSettingsbyId('clientId')?->getValue()."&scope=esi-characters.read_blueprints.v1%20esi-corporations.read_contacts.v1&state=".$unique;

$title = "EveLogin";
$description = "Test2";
$secretcode = $_GET['code'];
?>

<section class="page-section">
    <h1 class="text-center">Eve Login</h1>
    <div class="container">
        <a href="<?=$linkToEve?>">TestLinkToEve</a>
    </div>
</section>