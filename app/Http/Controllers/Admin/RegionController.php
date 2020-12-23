<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Service\RegionsImport\RegionImportService;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    protected RegionImportService $service;

    public function __construct(RegionImportService $service)
    {
        $this->service = $service;
    }

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
        $this->validate($request, [
            'file' => ['required', 'file', 'mimes:xml']
        ]);

        try {
            $regions = $this->service->getRegions($request->file('file'));
        }
        catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }


        Region::insert($regions);

    }




}
