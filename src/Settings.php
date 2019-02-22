<?php
namespace Webmachine\Settings;

use Illuminate\Support\Facades\DB;

class Settings {
    
    /**
     * Get Setting
     * 
     * @param string $fullkey example: group.key
     * @return string
     */
    public function get($fullkey) {
        if(strpos($fullkey, '.') === FALSE) return '';
        list($group, $key) = explode('.', $fullkey);
        $setting = DB::table('settings')->where('group', $group)->where('key', $key)->first();
        return $setting? $setting->value : '';
    }

    /**
     * Set Setting
     * 
     * @param string $fullkey example: group.key
     * @return boolean
     */
    public function set($fullkey, $value) {
        if(strpos($fullkey, '.') === FALSE) return FALSE;
        list($group, $key) = explode('.', $fullkey);
        $setting = DB::table('settings')->where('group', $group)->where('key', $key);
        if($setting->first()) {      
            return $setting->update(compact('value'));
        }
        return FALSE;
    }    
}
