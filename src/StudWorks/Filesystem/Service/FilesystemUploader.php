<?php

namespace App\StudWorks\Filesystem\Service;

use App\StudWorks\Filesystem\Settings\FilesystemSettings;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class FileUploader
 * @package App\StudWorks\FilesystemManager\Service
 */
class FilesystemUploader
{
    /**
     * @var FilesystemSettings
     */
    private $filesystemSettings;

    /**
     * FileUploader constructor.
     * @param FilesystemSettings $filesystemSettings
     */
    public function __construct(
        FilesystemSettings $filesystemSettings
    )
    {
        $this->filesystemSettings = $filesystemSettings;
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function saveOrderFile(UploadedFile $file): string
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $fileRelatedPath = $this->filesystemSettings->getOrdersPostfixWithDate();
        $file->move(
            $this->filesystemSettings->getBaseFileSystemPath() . '/' . $fileRelatedPath,
            $fileName
        );

        return $fileRelatedPath . '/' . $fileName;
    }
}