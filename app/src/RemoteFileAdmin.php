<?php

use SilverStripe\Admin\ModelAdmin;

class RemoteFileAdmin extends ModelAdmin
{
    private static $url_segment = 'RemoteFileAdmin';

    private static $menu_title = 'Remote file admin';

    private static $managed_models = [
        RemoteFile::class,
    ];
}
