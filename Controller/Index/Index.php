<?php

declare(strict_types=1);

namespace Iranimij\McpServer\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Asset\Repository;
use Magento\Framework\View\Asset\Source;

class Index implements HttpGetActionInterface
{
    public function __construct(
        private readonly Repository $assetRepo,
        private readonly Source $assetSource
    )
    {
    }

    public function execute()
    {

        echo $this->getJsAbsolutePath('Iranimij_McpServer::js/bundle.cjs');die();
    }

    public function getJsAbsolutePath($jsFile)
    {
        // Create asset object
        $asset = $this->assetRepo->createAsset($jsFile);

        // Get absolute file path
        $absolutePath = $this->assetSource->findSource($asset);

        return $absolutePath;
    }
}
