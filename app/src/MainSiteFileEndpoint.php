<?php

use emteknetnz\RestApi\Controllers\RestApiEndpoint;

class MainSiteFileEndpoint extends RestApiEndpoint
{
    private static array $api_config = [
        RestApiEndpoint::PATH => 'api/remote-file',
        RestApiEndpoint::DATA_CLASS => RemoteFile::class,
        // this would normally be set to PRIVATE, and you would use an API key to access it
        RestApiEndpoint::ALLOWED_OPERATIONS => 'CREATE_EDIT_DELETE',
        RestApiEndpoint::FIELDS => [
            'title' => 'Title',
            'absoluteLink' => 'AbsoluteLink',
            'lastEdited' => 'LastEdited',
        ],
        // Public demo (no API token setup, easier to demo)
        // RestApiEndpoint::ACCESS => RestApiEndpoint::PUBLIC,
        // API token demo
        RestApiEndpoint::ACCESS => RestApiEndpoint::API_TOKEN_AUTHENTICATION,
        RestApiEndpoint::ALLOW_API_TOKEN => true,
    ];
}
