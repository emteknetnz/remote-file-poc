<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\SearchableDropdownField;

class Page extends SiteTree
{
    private static $db = [];

    private static $has_one = [
        'MyRemoteFile' => RemoteFile::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $field = SearchableDropdownField::create(
            'MyRemoteFileID',
            'Remote file',
            RemoteFile::get(),
            null,
            'AbsoluteLink'
        )
            ->setIsClearable(true)
            ->setIsLazyLoaded(true)
            ->setLazyLoadLimit(20);
        $fields->insertBefore('Content', $field);
        return $fields;
    }
}
