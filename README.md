# Remote file poc

Quick POC demonstrating how a remote file API could work

This demos a couple of ways to quickly do API endpoints - it incorporates both the vstack and main site in a single silverstripe for demo purposes

There are two different endpoint solutions provided:

1) A read-only endpoint `VstackFileEndpoint` that would live on the vstack that lists all the files that have been uploaded. This would be a pull based system that's would have a lag between the file being uploaded and the main site knowing about it
2) A write-only endpoint `MainSiteFileEndpoint` that would live on the main site which allows you to POST data from the vstack whenever a file is uploaded on the vstack. This would be a push based system that would be near real-time. A real API endpoint would require the use of an API key (which emteknetnz/silverstripe-rest-api supports out of the box), though for this demo it's a public API.

The push based API endpoint will create a `RemoteFile` DataObject on the mainsite.

It uses [emteknetnz/silvestripe-rest-api](https://github.com/emteknetnz/silverstripe-rest-api) to do all the API heavy lifting

It uses the new `SearchableDropdownField` within CMS to search to allow the user to type to search for a `RemoteFile` dataobject and attach it to a `Page`.

The Page.ss template has been updated to show an image with the `RemoteFile.AbsoluteLink` if one exists.

There is a `CreateRemoteFilesTask` that creates 5,000 `RemotesFiles` to test the performance of the search dropdown. You can easily increase this number if desired.

There is an `AutoPublishFileExtension` on applied to `File` that will auto publish any uploaded files so that vstack user doesn't need to click publish. As far as I know there isn't any easy way to remove the Versioned extension from Files without breaking the CMS, though I may be wrong.

The `AutoPublishFileExtension` will also automatically make a simulated `POST` request to the `MainSiteFileEndpoint` to create a `RemoteFile` on the main site.

## Installation

composer create-project silverstripe/installer:5.x-dev
composer require emteknetnz/silverstripe-rest-api

Add in the files from this repo

dev/build flush=1
