<?php

namespace core;

class Settings extends Model
{

    public function loadSettingsToEnv()
    {
        $settings = $this->select("settings", "*", null, returnTypeFlag: DatabaseService::FETCH_ALL);
        foreach ($settings as $setting)
            $_ENV[$setting['name']] = $setting['val'];
    }

    public function addSettingToDatabase($key, $value) {
        $count = $this->select("settings", "*", [
            "name" => $key
        ], DatabaseService::FETCH_COUNT);
        echo $count;
        if ($count > 0)
            $this->update("settings", [ "val" => $value ], [ "name" => $key ]);
        else
            $this->insert("settings", [
                "name" => $key,
                "val" => $value
            ]);
    }

}