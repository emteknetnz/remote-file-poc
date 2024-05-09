<?php

use emteknetnz\RestApi\Controllers\RestApiEndpoint;
use SilverStripe\Assets\File;

// This class is a REST API endpoint that shows data for Files
// To exclude Folders query with /api/files?filter[className:not]=SilverStripe\Assets\Folder
// See https://github.com/emteknetnz/silverstripe-rest-api?tab=readme-ov-file#limiting-and-offsetting
// for how to paginate
class VstackFileEndpoint extends RestApiEndpoint
{
    private static array $api_config = [
        RestApiEndpoint::PATH => 'api/files',
        RestApiEndpoint::DATA_CLASS => File::class,
        RestApiEndpoint::ACCESS => RestApiEndpoint::PUBLIC,
        RestApiEndpoint::FIELDS => [
            'className' => 'ClassName',
            'title' => 'Title',
            'absoluteLink' => 'AbsoluteLink',
            'lastEdited' => 'LastEdited',
        ],
    ];
}
