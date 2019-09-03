<?php

namespace App\StudWorks\Files\Service;

use App\StudWorks\Files\Entity\OrderFile;
use App\StudWorks\Files\Repository\OrderFileRepository;
use App\StudWorks\Filesystem\Service\FilesystemUploader;
use App\StudWorks\Order\Entity\Order;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class OrderFileService
 * @package App\StudWorks\Files\Service
 */
class OrderFileService
{
    /**
     * @var OrderFileRepository
     */
    private $orderFileRepository;

    /**
     * @var FilesystemUploader
     */
    private $filesystemUploader;

    /**
     * OrderFileService constructor.
     * @param OrderFileRepository $orderFileRepository
     * @param FilesystemUploader $filesystemUploader
     */
    public function __construct(
        OrderFileRepository $orderFileRepository,
        FilesystemUploader $filesystemUploader
    )
    {
        $this->orderFileRepository = $orderFileRepository;
        $this->filesystemUploader = $filesystemUploader;
    }

    /**
     * Создаем файл чисто от заказщика, ответ в другом месте
     * @param UploadedFile $file
     * @param Order $order
     * @return OrderFile
     */
    public function createOrderFile(UploadedFile $file, Order $order): OrderFile
    {
        $orderFile = new OrderFile();
        $orderFile->setStudOrder($order);
        $orderFile->setUser($order->getUser());
        $orderFile->setIsCustomerFile(true);
        $orderFile->setPath(
            $this->filesystemUploader->saveOrderFile($file)
        );

        $this->orderFileRepository->persist($orderFile);

        return $orderFile;
    }
}
