<?php
/**
 * @package   Bodak\DisableRegistration
 * @author    Slawomir Bodak <slawek.bodak@gmail.com>
 * @copyright © 2017 Slawomir Bodak
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Bodak\DisableRegistration\Plugin;

use Magento\Customer\Model\Registration;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Class RegistrationPlugin
 *
 * @category Plugin
 * @package  Bodak\DisableRegistration\Plugin
 */
class RegistrationPlugin
{
    /**
     * ScopeConfigInterface
     *
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    const DISABLE_CUSTOMER_REGISTRATION = 'customer/create_account/disable_customer_registration';

    /**
     * RegistrationPlugin constructor.
     *
     * @param ScopeConfigInterface $scopeConfig ScopeConfigInterface
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Check if registration is allowed
     *
     * @param Registration $subject Registration
     *
     * @return bool
     */
    public function afterIsAllowed(Registration $subject): bool
    {
        $store = ScopeInterface::SCOPE_STORE;

        if ($this->scopeConfig->getValue(self::DISABLE_CUSTOMER_REGISTRATION, $store)) {
            return false;
        }
        return true;
    }
}
