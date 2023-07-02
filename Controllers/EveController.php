<?php

namespace CMW\Controller\Eve;

use CMW\Manager\Package\AbstractController;
use CMW\Controller\users\UsersController;
use CMW\Manager\Views\View;
use CMW\Manager\Router\Link;
use CMW\Model\Eve\EveModel;
use CMW\Manager\Flash\Flash;
use CMW\Manager\Flash\Alert;
use CMW\Utils\Redirect;
use CMW\Utils\Utils;
use CMW\Controller\Core\EditorController;

class EveController extends AbstractController{
    #[Link(path: "/", method: Link::GET, scope: "/cmw-admin/eve")]
    #[Link("/manage", Link::GET, [], "cmw-admin/eve")]
    public function eveSettings(): void{

        UsersController::redirectIfNotHavePermissions("core.dashboard", "eve.show");
        $eve = EveModel::getInstance();

        View::createAdminView('Eve', 'manage')
            ->addVariableList(["eveModel" => $eve])
            ->view();
    }

    #[Link("/manage", Link::POST, [], "cmw-admin/eve")]
    public function evePostSettings(): void{
        UsersController::redirectIfNotHavePermissions("core.dashboard", "eve.edit");
    
        [$clientId, $secretKey, $callbackUrl] = Utils::filterInput("clientId", "secretKey", "callbackUrl");
    
        if(Utils::containsNullValue($clientId , $secretKey , $callbackUrl)){
            Flash::send(Alert::ERROR, "Erreur","Veuillez remplir tous les champs !");
            Redirect::redirectPreviousRoute();
        }
         EveModel::getInstance()->setSettingValue("clientId",$clientId);
         EveModel::getInstance()->setSettingValue("secretKey",$secretKey);
         EveModel::getInstance()->setSettingValue("callbackUrl",$callbackUrl);
         Flash::send(Alert::SUCCESS, "Ok","Mes data sont bien enreistré !");
         Redirect::redirectPreviousRoute();
    }
    // PUBLIC AREA 
    #[Link("/", Link::GET, [], "/eve")]        public function eveLogin(): void{

        $eveLogin = EveModel::getInstance();
        $view = new View("Eve", "login");
        $view->addScriptBefore("Admin/Resources/Vendors/Highlight/highlight.min.js", "Admin/Resources/Vendors/Highlight/highlightAll.js");
        $view->addStyle("Admin/Resources/Vendors/Highlight/Style/" . EditorController::getCurrentStyle());
        $view->addVariableList(["eve" => $eveLogin]);
        $view->view();
    }


}
