<?php

namespace App\Controller\Api\Admin\Filesystem;

use App\StudWorks\Files\Entity\OrderFile;
use App\StudWorks\Order\Service\OrderService;
use App\StudWorks\Order\Transformer\OrderTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\Stream;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/admin/file")
 */
class FilesystemController extends AbstractController
{
    /**
     * @Route(
     *     "/download/{file}",
     *     name="api_admin_file_download",
     *     methods={"GET"}
     * )
     * @param OrderFile $file
     * @return Response
     */
    public function index(
        OrderFile $file
    ): Response
    {
        $stream  = new Stream($file->getFileFullPath());
        $response = new BinaryFileResponse($stream);

        return $response;
    }

}
