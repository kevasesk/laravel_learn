<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Config;

class ConfigController extends Controller
{
    public function config()
    {
        return view('admin.config.form', [
           'fields' => $this->getConfigs()
        ]);
    }
    public function getConfigs()
    {
        $configMap = [];
        foreach (Config::all() as $config){
            $configMap[$config['key']] = $config['value'];
        }
        $result = [];
        foreach (Config::$fields as $fieldKey => $fieldData){
            if(isset($configMap[$fieldKey])){
                $result[$fieldKey] = $fieldData;
                $result[$fieldKey]['value'] = $configMap[$fieldKey];
            }else{
                $result[$fieldKey] = $fieldData;
                $result[$fieldKey]['value'] = '';
            }
        }
        return $result;
    }
    public function save(Request $request)
    {
        foreach (Config::$fields as $fieldKey => $fieldData){
            $config = Config::query()->where('key', '=', $fieldKey)->first();
            if(!$config) {
                $config = new Config();
                $config->key = $fieldKey;
            }
            $config->value = $this->processValue($request, $config, $fieldKey, $fieldData);
            $config->save();
        }
        return redirect()->route('admin.config')->with('success', 'Changes Saved!');
    }
    private function processValue(Request $request, $config, $fieldKey, $fieldData)
    {
        if(isset($fieldData['type']) && $fieldData['type'] == 'image'){
            if($request->file($fieldKey)){
                $filePath = $request->file($fieldKey)->store('config', 'public');//TODO make not public
            }else{
                $filePath = $config->value;
            }
            $value = $filePath;
        }else{
            $value = $request->get($fieldKey);
        }
        if(!$value){
            $value = '';
        }
        return $value;
    }
}
