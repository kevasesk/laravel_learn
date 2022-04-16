<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Config;

class ConfigController extends Controller
{
    private $fields;

    private $configsMapping;

    public function config()
    {
        $this->initConfigValues();
        return view('admin.config.form', [
           'fields' => $this->fields
        ]);
    }
    public function initConfigValues()
    {
        $configs = Config::all();
        $this->configsMapping = [];
        foreach ($configs as $config){
            $this->configsMapping[$config['key']] = $config;
        }
        $this->fields = [
            [
                'key' => 'global_logo',
                'title'=> 'Logo',
                'type' => 'image',
                'value'=> $this->configsMapping['global_logo']['value'] ?? ''
            ],
        ];
    }
    public function save(Request $request)
    {
        $this->initConfigValues();
        foreach ($this->fields as $field){
            if(isset($this->configsMapping[$field['key']])){
                $config = $this->configsMapping[$field['key']];
                $config->value = $request->get($field['key']);
            }else{
                $config = new Config();
                $config->key = $field['key'];
                $config->value = $request->get($field['key']);
            }
            if($field['type'] == 'image'){
                if($request->file($field['key'])){
                    $filePath = $request->file($field['key'])->store('config', 'public');//TODO make not public
                }else{
                    $filePath = $config->value;
                }
                $config->value = $filePath;
            }
            $config->save();
        }
        return redirect()->route('admin.config');
    }
}
