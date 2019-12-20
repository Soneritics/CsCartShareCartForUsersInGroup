<?php
if (!defined('BOOTSTRAP')) { die('Access denied'); }

function fn_soneritics_sharecart_getCodeFromUserData(array $userData): string
{
    if (!empty($userData['fields'])) {
        $code = SoneriticsShareCartSettingsFactory::create()->getPraktijkcode();
        $profileFieldIds = (new SoneriticsShareCartProfileField($code))->getIds();

        if (!empty($profileFieldIds)) {
            foreach ($profileFieldIds as $profileFieldId) {
                if (!empty($userData['fields'][$profileFieldId])) {
                    return $userData['fields'][$profileFieldId];
                }
            }
        }
    }

    return '';
}