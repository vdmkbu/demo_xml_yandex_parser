<?php


namespace App\Service\RegionsImport;


use Illuminate\Http\UploadedFile;

class RegionImportService
{
    protected RegionXmlParser $parser;

    public function __construct(RegionXmlParser $parser)
    {
        $this->parser = $parser;
    }

    public function getRegions(UploadedFile $file): array
    {
        $xml = $file->getContent();
        $regions_data = $this->parser->parse($xml);

        if(!$regions_data) {
            throw new \Exception('Parsing XML error');
        }

        foreach($regions_data as $value) {
            $region = json_decode($value);
            $region_name = $region[1];
            $internal_id = $region[3];

            $regions[] = ['region' => $region_name, 'internal_id' => $internal_id];
        }
    }
}
