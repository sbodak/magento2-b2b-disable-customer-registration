<?php
/**
 * @package   Bodak\DisableRegistration
 * @author    Slawomir Bodak <slawek.bodak@gmail.com>
 * @copyright © 2017-2026 Slawomir Bodak
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Bodak\DisableRegistration\Plugin;

use Magento\Customer\Model\Registration;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class RegistrationPlugin
{
    public const XML_PATH_DISABLE_CUSTOMER_REGISTRATION = 'customer/create_account/disable_customer_registration';

    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    ) {}

    public function afterIsAllowed(Registration $subject): bool
    {
        return !(bool) $this->scopeConfig->getValue(
            self::XML_PATH_DISABLE_CUSTOMER_REGISTRATION,
            ScopeInterface::SCOPE_STORE
        );
    }
}
