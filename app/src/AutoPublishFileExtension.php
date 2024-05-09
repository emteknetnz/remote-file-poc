<?php

use SilverStripe\Core\Extension;
use SilverStripe\Control\Director;
use SilverStripe\Control\Controller;

class AutoPublishFileExtension extends Extension
{
    /**
     * This prevents getting stuck in an infinte loop
     * 
     * @internal
     */
    private static $isPublishing = false;

    /**
     * This prevents double API calls, for some reason the onAfterPublish hook is called twice
     * 
     * @internal
     */
    private static $remoteFilesHahes = [];

    public function onAfterWrite()
    {
        if (self::$isPublishing) {
            return;
        }
        if (!$this->owner->isLiveVersion()) {
            self::$isPublishing = true;
            $this->owner->publishSingle();
            self::$isPublishing = false;
        }
    }

    public function onAfterPublish()
    {
        $body = json_encode([
            'title' => $this->owner->Title,
            'absoluteLink' => $this->owner->AbsoluteLink(),
            'lastEdited' => $this->owner->LastEdited,
        ], JSON_UNESCAPED_SLASHES + JSON_UNESCAPED_UNICODE);
        $hash = md5(serialize($body));
        if (array_key_exists($hash, self::$remoteFilesHahes)) {
            return;
        }
        // send a request to the same server for test purposes, normally you'd use curl or guzzle
        $session = Controller::curr()->getRequest()->getSession();
        Director::test('/api/remote-file', [], $session, 'POST', $body);
        self::$remoteFilesHahes[$hash] = true;
    }

    // you'd also implement onAfterDelete() to delete files from the /api/remote-file endpoint
    // and something else to handle modifying existing remote-files
}
