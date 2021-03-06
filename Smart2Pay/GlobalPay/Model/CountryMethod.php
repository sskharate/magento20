<?php

namespace Smart2Pay\GlobalPay\Model;

use Smart2Pay\GlobalPay\Api\Data\CountryMethodInterface;
use Magento\Framework\DataObject\IdentityInterface;

/**
 * Class Country
 * @method \Smart2Pay\GlobalPay\Model\ResourceModel\CountryMethod _getResource()
 * @package Smart2Pay\GlobalPay\Model
 */
class CountryMethod extends \Magento\Framework\Model\AbstractModel implements CountryMethodInterface, IdentityInterface
{
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'smart2pay_globalpay_countrymethod';

    /**
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'smart2pay_globalpay_countrymethod';

    /**
     * Country Method Factory
     *
     * @var \Smart2Pay\GlobalPay\Model\CountryFactory
     */
    private $_countryFactory;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Smart2Pay\GlobalPay\Model\CountryFactory $countryFactory,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    )
    {
        $this->_countryFactory = $countryFactory;

        parent::__construct( $context, $registry, $resource, $resourceCollection, $data );
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init( 'Smart2Pay\GlobalPay\Model\ResourceModel\CountryMethod' );
    }

    /**
     * Check if a method is configured for $method_id, country_id pair
     * return details if method is configured
     *
     * @param int $method_id
     * @return int
     */
    public function checkMethodCountryID( $method_id, $country_id )
    {
        return $this->_getResource()->checkMethodCountryID( $method_id, $country_id );
    }

    /**
     * Check if method_id key exists
     * return method id if method exists
     *
     * @param int $method_id
     * @return array
     */
    public function getMethodsForCountry( $country_id )
    {
        return $this->_getResource()->getMethodsForCountry( $country_id );
    }

    /**
     * Check if method_id key exists
     * return method id if method exists
     *
     * @param int $method_id
     * @return int
     */
    public function getCountriesForMethod( $method_id )
    {
        return $this->_getResource()->getCountriesForMethod( $method_id );
    }

    public function getCountriesForMethodsList( $methods_arr = false )
    {
        $method_ids_arr = false;
        if( !empty( $methods_arr ) and is_array( $methods_arr ) )
        {
            $method_ids_arr = array();
            foreach( $methods_arr as $method_id )
            {
                $method_id = intval( $method_id );
                if( empty( $method_id ) )
                    continue;

                $method_ids_arr[] = $method_id;
            }
        }

        $collection = $this->getCollection();

        if( !empty( $method_ids_arr ) )
            $collection->addFieldToFilter( 'main_table.method_id', array( 'in' => $method_ids_arr ) );

        $country_collection = $this->_countryFactory->create()->getCollection();

        $collection->getSelect()->join(
            $country_collection->getMainTable(),
            'main_table.country_id = '.$country_collection->getMainTable().'.country_id'
        );

        $return_arr = array();
        $return_arr['all'] = array();
        $return_arr['methods'] = array();

        while( ($country_method_obj = $collection->fetchItem())
           and ($country_method_arr = $country_method_obj->getData()) )
        {
            if( empty( $country_method_arr['country_id'] ) )
                continue;

            if( !isset( $return_arr['all'][$country_method_arr['country_id']] ) )
            {
                $return_arr['all'][$country_method_arr['country_id']] = array(
                    'code' => $country_method_arr['code'],
                    'name' => $country_method_arr['name'],
                );
            }

            $return_arr['methods'][$country_method_arr['method_id']][$country_method_arr['code']] = $country_method_arr['name'];
        }

        return $return_arr;
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getMethodID().'_'.$this->getCountryID()];
    }

    /**
     * @inheritDoc
     */
    public function getID()
    {
        return $this->getData( self::ID );
    }

    /**
     * @inheritDoc
     */
    public function getMethodID()
    {
        return $this->getData( self::METHOD_ID );
    }

    /**
     * @inheritDoc
     */
    public function getCountryID()
    {
        return $this->getData( self::COUNTRY_ID );
    }

    /**
     * @inheritDoc
     */
    public function getPriority()
    {
        return $this->getData( self::PRIORITY );
    }

    /**
     * @inheritDoc
     */
    public function setID( $id )
    {
        return $this->setData( self::ID, $id );
    }

    /**
     * @inheritDoc
     */
    public function setMethodID( $method_id )
    {
        return $this->setData( self::METHOD_ID, $method_id );
    }

    /**
     * @inheritDoc
     */
    public function setCountryID( $country_id )
    {
        return $this->setData( self::COUNTRY_ID, $country_id );
    }

    /**
     * @inheritDoc
     */
    public function setPriority( $priority )
    {
        return $this->setData( self::PRIORITY, $priority );
    }
}
