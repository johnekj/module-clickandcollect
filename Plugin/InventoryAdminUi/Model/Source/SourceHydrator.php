<?php
declare(strict_types=1);

namespace MageClass\ClickAndCollect\Plugin\InventoryAdminUi\Model\Source;

use Magento\InventoryAdminUi\Model\Source\SourceHydrator as Subject;
use Magento\InventoryApi\Api\Data\SourceInterface;

class SourceHydrator
{
    public function afterHydrate(Subject $subject, SourceInterface $result, SourceInterface $source, array $data): SourceInterface
    {
        $extensionAttributes = $result->getExtensionAttributes();
        $extensionAttributes->setWorkingTime($data['general'][\MageClass\ClickAndCollect\Api\Data\SourceInterface::WORKING_TIME] ?? '');
        $result->setExtensionAttributes($extensionAttributes);

        return $result;
    }
}