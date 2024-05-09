<?php

use SilverStripe\ORM\DataObject;

class RemoteFile extends DataObject
{
    private static $table_name = 'RemoteFile';

    private static $db = [
        'Title' => 'Varchar',
        'AbsoluteLink' => 'Varchar',
        'LastEdited' => 'Datetime',
    ];

    private static $searchable_fields = [
        'AbsoluteLink',
    ];
}
