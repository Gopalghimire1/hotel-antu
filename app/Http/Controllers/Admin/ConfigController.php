<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrontConfig;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = FrontConfig::all();
        return view('back.config', compact('configs'));
    }
    public function add(Request $request)
    {
        $config = new FrontConfig();
        $config->name = $request->name;
        $config->value = $request->value;
        $config->save();
        $this->saveConfig();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $config = FrontConfig::find($request->id);
        $config->name = $request->name;
        $config->value = $request->value;
        $config->save();
        $this->saveConfig();
        return redirect()->back();
    }
    public function del($id)
    {
        $config = FrontConfig::find($id);
        $config->delete();
        $this->saveConfig();
        return redirect()->back();
    }
    private function saveConfig()
    {
        $file_contents = ":root{\n";
        $configs = FrontConfig::all();
        foreach ($configs as $key => $_config) {
            $file_contents .= "--" . $_config->name . ":" . $_config->value . ";\n";
        }
        $file_contents .= "}";

        file_put_contents(public_path("variable.css"), $file_contents);
    }
}
