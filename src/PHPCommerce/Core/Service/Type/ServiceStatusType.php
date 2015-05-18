<?php
namespace PHPCommerce\Service\Type;

/**
 * An extendible enumeration of service status types.
 *
 * @author jfischer
 *
 */
class ServiceStatusType {

    private static $TYPES = array();

    /**
     * @var ServiceStatusType
     */
    public static $UP;

    /**
     * @var ServiceStatusType
     */
    public static $DOWN;

    /**
     * @var ServiceStatusType
     */
    public static $PAUSED;

    /**
     * @return ServiceStatusType
     */
    public static function getInstance($type) {
        return self::$TYPES[$type];
    }

    /**
     * @var String
     */
    private $type;

    /**
     * @var String
     */
    private $friendlyType;

    /**
     * @param String $type
     * @param String $friendlyType
     */
    public function __construct($type=null, $friendlyType=null) {

        if($friendlyType) {
            $this->friendlyType = $friendlyType;
        }

        if ($type) {
            $this->setType($type);
        }
    }

    /**
     * @return String
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return String
     */
    public function getFriendlyType() {
        return $this->friendlyType;
    }

    /**
     * @param String $type
     */
    private function setType($type) {
        $this->type = $type;

        if (!array_key_exists($type, self::$TYPES)) {
            self::$TYPES[$type] = $this;
        } else {
            throw new Exception("Cannot add the type: (" + $type + "). It already exists as a type via " + get_class($this->getInstance($type)));
        }
    }

    public function equals(ServiceStatusType $obj) {
        return ($this->getType() == $obj->getType());
    }
}

ServiceStatusType::$UP      = new ServiceStatusType("UP", "Up");
ServiceStatusType::$DOWN    = new ServiceStatusType("DOWN", "Down");
ServiceStatusType::$PAUSED  = new ServiceStatusType("PAUSED", "Paused");
