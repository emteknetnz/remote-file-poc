<?php

use SilverStripe\Dev\BuildTask;

class CreateRemoteFilesTask extends BuildTask
{
    public function run($request)
    {
        if (RemoteFile::get()->count() > 5000) {
            return;
        }
        for ($i = 0; $i < 5000; $i++) {
            $leftPaddedI = str_pad($i, 6, '0', STR_PAD_LEFT);
            RemoteFile::create([
                'Title' => 'Remote file ' . $leftPaddedI,
                'AbsoluteLink' => 'https://www.example.com/remote-file-' . $leftPaddedI,
            ])->write();
            echo "Created file $leftPaddedI\n";
        }
    }
}
