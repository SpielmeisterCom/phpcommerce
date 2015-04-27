<?php
namespace HMC\Common\Extension;

/**
 * Base {@link ExtensionHandler} class that provide basic extension handler properties including
 * priority (which drives the execution order of handlers) and enabled (which if false informs the
 * manager to skip this handler).
 *
 * @author bpolster
 */
abstract class AbstractExtensionHandler implements ExtensionHandler {
    /**
     * @var int
     */
    protected $priority;

    /**
     * @var bool
     */
    protected $enabled = true;

    /**
     * Determines the priority of this extension handler.
     * @return int
     */
    public function getPriority() {
        return $this->priority;
    }

    /**
     * @param $priority
     */
    public function setPriority($priority) {
        $this->priority = $priority;
    }

    public function isEnabled() {
        return $this->enabled;
    }

    public function setEnabled($enabled) {
        $this->enabled = $enabled;
    }

}
