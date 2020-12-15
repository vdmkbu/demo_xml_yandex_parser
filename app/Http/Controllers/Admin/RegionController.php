<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        return view('admin.regions.index', [
            'regions' => Region::all()
        ]);
    }

    public function edit(Region $region)
    {
        return view('admin.regions.edit', [
            'region' => $region
        ]);
    }

    public function update(Region $region, Request $request)
    {
        $this->validate($request, [
            'region' => ['required']
        ]);

        $region->update(['region' => $request->region]);

        return redirect(route('admin.regions.index'))->with('success', 'Region has been updated');
    }

    public function upload()
    {
        return view('admin.regions.import');
    }

    public function import(Request $request)
    {

        $xml = $request->file('file')->getContent();

        $xml = simplexml_load_string($xml);

        if (!$xml) {
            throw new \Exception('XML file with bad format');
        }

        $values = $xml->data->insert[1]->values;

        $regions = [];
        foreach($values as $value) {
            $region = json_decode($value);
            $region_name = $region[1];
            $internal_id = $region[3];

            $regions[] = ['region' => $region_name, 'internal_id' => $internal_id];
        }

        Region::insert($regions);

    }




}
