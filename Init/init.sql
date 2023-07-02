/*Eve */
CREATE TABLE IF NOT EXISTS cmw_eve_settings
(
    eve_settings_id      INT AUTO_INCREMENT PRIMARY KEY,//Sa sers toujours
    eve_settings_key    VARCHAR(50)  NOT NULL,//Donc tu en auras plusiers (secret_key,client_id,callback_url)
    eve_settings_value   VARCHAR(200) NULL,//Tes values (La secret key, le client Id , le callback url)
    eve_settings_updated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP//Gére que au niveau de ta bdd tu n'as pas à y touché mais l'info peut servir coté admin
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;


INSERT INTO `cmw_eve_settings` (`eve_settings_key`)
VALUES ('clientId'),('secretKey'),('callbackUrl'),;