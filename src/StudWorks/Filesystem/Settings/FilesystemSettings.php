<?php

namespace App\StudWorks\Filesystem\Settings;

/**
 * Class FileSettings
 * @package App\StudWorks\FileManager\Settings
 */
class FilesystemSettings
{
    /**
     * @return string
     */
    public function getBaseFileSystemPath(): string
    {
        return realpath(__DIR__ . '/../../../../');
    }

    /**
     * @return string
     */
    public function getOrdersPostfix(): string
    {
        return 'filesystem/orders';
    }

    /**
     * @return string
     */
    public function getStorePostfix(): string
    {
        return 'filesystem/store';
    }

    /**
     * @return string
     */
    public function getOrdersPostfixWithDate(): string
    {
        return $this->getOrdersPostfix() . '/' . (new \DateTime())->format('Y_m');
    }
}