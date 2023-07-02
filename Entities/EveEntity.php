<?php 

namespace CMW\Entity\Eve;

use CMW\Controller\Core\CoreController;

class EveEntity{
    
    private int $settingsId;
    private string $settingsKey;
    private string $settingsValue;
    private string $settingsUpdated;

    /**
     * @param int $newId
     * @param string $settingsKey;
     * @param string $settingsValue;
     * @param string $settingsUpdated;
     */
    public function __construct(int $settingsId, string $settingsKey , string $settingsValue, string $settingsUpdated){

        $this->settingsId = $settingsId;
        $this->settingsKey = $settingsKey;
        $this->settingsValue = $settingsValue;
        $this->settingsUpdated = $settingsUpdated;
        
    }

    public function getId():  int{
        return $this->settingsId;
    }
    public function getKey(): string{
        return $this->settingsKey;
    }

    public function getValue(): string{
        return $this->settingsValue;
    }

    public function getUpdated(): string{
        return CoreController::formatDate($this->settingsUpdated);
    }


}

?>