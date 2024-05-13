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

    // This is required so that the SearchableDropdownField searches on the correct field
    private static $searchable_fields = [
        'AbsoluteLink',
    ];

    public function canCreate($member = null, $context = [])
    {
        return true;
    }
}
