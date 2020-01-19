<?php

namespace MageClass\ClickAndCollect\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Inventory\Model\SourceFactory;
use Magento\InventoryApi\Api\SourceRepositoryInterface;

class SampleSources implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;
    /**
     * @var SourceFactory
     */
    private $sourceFactory;

    /**
     * @var SourceRepositoryInterface
     */
    private $sourceRepository;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        SourceFactory $sourceFactory,
        SourceRepositoryInterface $sourceRepository
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->sourceFactory = $sourceFactory;
        $this->sourceRepository = $sourceRepository;
    }

    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        $i = 1;
        foreach ($this->sampleSources() as $data) {
            $source = $this->sourceFactory->create();
            $source->setData($data);
            $source->setSourceCode('sample' . $i++);
            $this->sourceRepository->save($source);
        }

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    private function sampleSources()
    {
        return [
            [
                'name' => 'Countdown Newmarket',
                'street' => '277 Cnr Broadway & Morrow Streets',
                'city' => 'Newmarket Auckland',
                'working_time' => 'Monday: 7am - 10pm
Tuesday: 7am - 10pm
Wednesday: 7am - 10pm
Thursday: 7am - 10pm
Friday: 7am - 10pm
Saturday: 7am - 10pm
Sunday: CLOSED',
                'latitude' => '-36.87053600000000',
                'longitude' => '174.77736500000000',
                'enabled' => 1,
                'country_id' => 'NZ',
                'postcode' => 'Test',
            ],
            [
                'name' => 'Countdown Browns Bay',
                'street' => 'Cnr Anzac & Clyde Roads',
                'city' => 'Auckland',
                'working_time' => 'Monday: 7am - 10pm
Tuesday: 7am - 10pm
Wednesday: 7am - 10pm
Thursday: 7am - 10pm
Friday: 7am - 10pm
Saturday: 7am - 10pm
Sunday: CLOSED',
                'latitude' => '-36.71655900000000',
                'longitude' => '174.74788000000000',
                'enabled' => 1,
                'country_id' => 'NZ',
                'postcode' => 'Test',
            ],
            [
                'name' => 'Countdown Waiheke Island',
                'street' => '13-19 Belgium Street',
                'city' => 'Waiheke Island',
                'working_time' => 'Monday: 7am - 10pm
Tuesday: 7am - 10pm
Wednesday: 7am - 10pm
Thursday: 7am - 10pm
Friday: 7am - 10pm
Saturday: 7am - 10pm
Sunday: CLOSED',
                'latitude' => '-36.79625400000000',
                'longitude' => '175.04601300000000',
                'enabled' => 1,
                'country_id' => 'NZ',
                'postcode' => 'Test',
            ],
            [
                'name' => '76 Quay Street
Auckland City',
                'street' => '76 Quay Street',
                'city' => 'Auckland City',
                'working_time' => 'Monday: 7am - 10pm
Tuesday: 7am - 10pm
Wednesday: 7am - 10pm
Thursday: 7am - 10pm
Friday: 7am - 10pm
Saturday: 7am - 10pm
Sunday: CLOSED',
                'latitude' => '-36.84522100000000',
                'longitude' => '174.77293900000000',
                'enabled' => 1,
                'country_id' => 'NZ',
                'postcode' => 'Test',
            ],
            [
                'name' => 'Countdown Whitianga',
                'street' => '24 Joan Gaskell Drive',
                'city' => 'Whitianga',
                'working_time' => 'Monday: 7am - 10pm
Tuesday: 7am - 10pm
Wednesday: 7am - 10pm
Thursday: 7am - 10pm
Friday: 7am - 10pm
Saturday: 7am - 10pm
Sunday: CLOSED',
                'latitude' => '-36.83480400000000',
                'longitude' => '175.69873900000000',
                'enabled' => 1,
                'country_id' => 'NZ',
                'postcode' => 'Test',
            ],
            [
                'name' => 'Countdown Greerton',
                'street' => '1368 Cameron Road',
                'city' => 'Tauranga',
                'working_time' => 'Monday: 7am - 10pm
Tuesday: 7am - 10pm
Wednesday: 7am - 10pm
Thursday: 7am - 10pm
Friday: 7am - 10pm
Saturday: 7am - 10pm
Sunday: CLOSED',
                'latitude' => '-37.72748000000000',
                'longitude' => '176.13206100000000',
                'enabled' => 1,
                'country_id' => 'NZ',
                'postcode' => 'Test',
            ],
            [
                'name' => 'Countdown Nelson',
                'street' => '35 St Vincent Street',
                'city' => 'Nelson',
                'working_time' => 'Monday: 7am - 10pm
Tuesday: 7am - 10pm
Wednesday: 7am - 10pm
Thursday: 7am - 10pm
Friday: 7am - 10pm
Saturday: 7am - 10pm
Sunday: CLOSED',
                'latitude' => '-41.27283400000000',
                'longitude' => '173.27742200000000',
                'enabled' => 1,
                'country_id' => 'NZ',
                'postcode' => 'Test',
            ],
            [
                'name' => 'Countdown Church Corner',
                'street' => 'Cnr Riccarton Road & Hansons Lane',
                'city' => 'Christchurch',
                'working_time' => 'Monday: 7am - 10pm
Tuesday: 7am - 10pm
Wednesday: 7am - 10pm
Thursday: 7am - 10pm
Friday: 7am - 10pm
Saturday: 7am - 10pm
Sunday: CLOSED',
                'latitude' => '-43.53177500000000',
                'longitude' => '172.57370900000000',
                'enabled' => 1,
                'country_id' => 'NZ',
                'postcode' => 'Test',
            ],
            [
                'name' => 'Countdown Hornby',
                'street' => '17 Chappie Place, Hornby',
                'city' => 'Christchurch 8042',
                'working_time' => 'Monday: 7am - 10pm
Tuesday: 7am - 10pm
Wednesday: 7am - 10pm
Thursday: 7am - 10pm
Friday: 7am - 10pm
Saturday: 7am - 10pm
Sunday: CLOSED',
                'latitude' => '-43.54251400000000',
                'longitude' => '172.52731300000000',
                'enabled' => 1,
                'country_id' => 'NZ',
                'postcode' => 'Test',
            ]
        ];
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}