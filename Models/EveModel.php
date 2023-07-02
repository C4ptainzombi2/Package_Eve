<?php

namespace CMW\Model\Eve;

use CMW\Entity\Eve\EveEntity;
use CMW\Manager\Database\DatabaseManager;
use CMW\Manager\Package\AbstractModel;

class EveModel extends AbstractModel
{
    public function setSettingValue(string $key, string $value): void
    {
        $sql = "UPDATE cmw_eve_settings SET eve_settings_value = :value WHERE eve_settings_key = :key";

        $db = DatabaseManager::getInstance();
        $res = $db->prepare($sql);
        $res->execute(['value' => $value, 'key' => $key]);
    }

    public function getSettingsbyId(string $key): ?EveEntity
    {
        $sql = "SELECT * FROM cmw_eve_settings WHERE eve_settings_key = :key";

        $db = DatabaseManager::getInstance();
        $res = $db->prepare($sql);
        $res->execute(['key' => $key]);

        $row = $res->fetch();


        if (!$row) {
            return null;
        }

        $settings = new EveEntity(
            $row['eve_settings_id'],
            $row['eve_settings_key'],
            $row['eve_settings_value'],
            $row['eve_settings_updated']
        );

        return $settings;
    }
}