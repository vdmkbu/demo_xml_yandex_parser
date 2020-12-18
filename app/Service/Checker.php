<?php


namespace App\Service;


use App\Models\Project;
use App\Service\Http\HttpClient;
use App\Service\XmlYandex\XmlYandexParser;

class Checker
{
    protected HttpClient $client;
    protected XmlYandexParser $parser;
    protected CheckPositionsService $service;
    protected PositionsService $positionsService;
    protected ProjectService $projectService;

    public function __construct(HttpClient $client,
                                XmlYandexParser $parser,
                                CheckPositionsService $service,
                                PositionsService $positionsService,
                                ProjectService $projectService)
    {
        $this->client = $client;
        $this->parser = $parser;
        $this->service = $service;
        $this->positionsService = $positionsService;
        $this->projectService = $projectService;
    }

    public function check()
    {
        $positions = [];
        $projects = Project::with(['regions', 'words'])->where('state', '=', 0)->where('active','=',1)->get();

        foreach($projects as $project) {
            foreach($project->regions as $region) {
                foreach($project->words as $word) {

                    try {

                        $response = $this->client->request(['lr' => $region->internal_id, 'query' => $word->word]);
                        $position = $this->service->getPosition($this->parser->parse($response), $project->host);

                        $positions[] = array_merge($position, [
                            'project_id' => $project->id,
                            'region_id' => $region->id,
                            'word_id' => $word->id
                        ]);

                    }
                    catch (\Exception $exception) {
                        logger()->error($exception->getMessage());
                        abort(403, 'Error');
                    }


                }
            }

            $this->projectService->setComplete($project);
        }

        $this->positionsService->create($positions);
    }
}
