<?php
declare(strict_types=1);

namespace MageClass\ClickAndCollect\Plugin\Inventory\Model\ResourceModel;

use MageClass\ClickAndCollect\Api\Data\SourceInterface;
use Magento\Inventory\Model\ResourceModel\Source as Subject;
use Magento\Framework\Model\AbstractModel;

class Source
{
    public function afterLoad(Subject $subject, $result, AbstractModel $object)
    {
        /** @var \Magento\Inventory\Model\Source $object */
        $extensionAttributes = $object->getExtensionAttributes();
        $extensionAttributes->setWorkingTime($object->getData(SourceInterface::WORKING_TIME));
        $object->setExtensionAttributes($extensionAttributes);

        return $result;
    }

    public function beforeSave(Subject $subject, AbstractModel $object)
    {
        /** @var \Magento\Inventory\Model\Source $object */
        $extensionAttributes = $object->getExtensionAttributes();
        $workingTime = $extensionAttributes->getWorkingTime();
        $object->setData(SourceInterface::WORKING_TIME, $workingTime);

        return [$object];
    }
}