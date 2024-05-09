<?php

use emteknetnz\RestApi\Controllers\RestApiEndpoint;

class MainSiteFileEndpoint extends RestApiEndpoint
{
    private static array $api_config = [
        RestApiEndpoint::PATH => 'api/remote-file',
        RestApiEndpoint::DATA_CLASS => RemoteFile::class,
        // this would normally be set to PRIVATE, and you would use an API key to access it
        RestApiEndpoint::ACCESS => RestApiEndpoint::PUBLIC,
        RestApiEndpoint::ALLOWED_OPERATIONS => 'CREATE_EDIT_DELETE',
        RestApiEndpoint::FIELDS => [
            'title' => 'Title',
            'absoluteLink' => 'AbsoluteLink',
            'lastEdited' => 'LastEdited',
        ],
    ];
}
