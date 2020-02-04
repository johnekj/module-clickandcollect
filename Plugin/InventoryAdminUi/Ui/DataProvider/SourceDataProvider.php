<?php
declare(strict_types=1);

namespace MageClass\ClickAndCollect\Plugin\InventoryAdminUi\Ui\DataProvider;

use Magento\InventoryAdminUi\Ui\DataProvider\SourceDataProvider as Subject;
use Magento\InventoryApi\Api\Data\SourceInterface;
use Magento\InventoryApi\Api\SourceRepositoryInterface;

class SourceDataProvider
{
    /**
     * @var SourceRepositoryInterface
     */
    protected $sourceRepository;
    
    public function __construct(SourceRepositoryInterface $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    public function afterGetData(Subject $subject, $result)
    {
        foreach ($result as $sourceCode => &$data) {
            if (!isset($data['general'])) {
                continue;
            }
            $this->addWorkingTime($data['general'], $this->source($sourceCode));
        }

        return $result;
    }

    protected function addWorkingTime(&$data, SourceInterface $source)
    {
        $data[\MageClass\ClickAndCollect\Api\Data\SourceInterface::WORKING_TIME] = $source->getExtensionAttributes()->getWorkingTime();
    }

    protected function source($sourceCode): SourceInterface
    {
        return $this->sourceRepository->get($sourceCode);
    }
}