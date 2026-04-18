<?php
/**
 * @package   Bodak\DisableRegistration
 * @author    Slawomir Bodak <slawek.bodak@gmail.com>
 * @copyright © 2017-2026 Slawomir Bodak
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Bodak\DisableRegistration\Test\Unit\Plugin;

use Bodak\DisableRegistration\Plugin\RegistrationPlugin;
use Magento\Customer\Model\Registration;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class RegistrationPluginTest extends TestCase
{
    private RegistrationPlugin $plugin;

    private ScopeConfigInterface&MockObject $scopeConfig;

    protected function setUp(): void
    {
        $this->scopeConfig = $this->createMock(ScopeConfigInterface::class);
        $this->plugin = new RegistrationPlugin($this->scopeConfig);
    }

    public function testAfterIsAllowedReturnsFalseWhenRegistrationIsDisabled(): void
    {
        $this->scopeConfig
            ->method('getValue')
            ->with(
                RegistrationPlugin::XML_PATH_DISABLE_CUSTOMER_REGISTRATION,
                ScopeInterface::SCOPE_STORE
            )
            ->willReturn('1');

        $result = $this->plugin->afterIsAllowed($this->createMock(Registration::class));

        $this->assertFalse($result);
    }

    public function testAfterIsAllowedReturnsTrueWhenRegistrationIsEnabled(): void
    {
        $this->scopeConfig
            ->method('getValue')
            ->with(
                RegistrationPlugin::XML_PATH_DISABLE_CUSTOMER_REGISTRATION,
                ScopeInterface::SCOPE_STORE
            )
            ->willReturn('0');

        $result = $this->plugin->afterIsAllowed($this->createMock(Registration::class));

        $this->assertTrue($result);
    }

    public function testAfterIsAllowedReturnsTrueWhenConfigValueIsNull(): void
    {
        $this->scopeConfig
            ->method('getValue')
            ->with(
                RegistrationPlugin::XML_PATH_DISABLE_CUSTOMER_REGISTRATION,
                ScopeInterface::SCOPE_STORE
            )
            ->willReturn(null);

        $result = $this->plugin->afterIsAllowed($this->createMock(Registration::class));

        $this->assertTrue($result);
    }

    public function testAfterIsAllowedReturnsTrueWhenConfigValueIsZeroString(): void
    {
        $this->scopeConfig
            ->method('getValue')
            ->with(
                RegistrationPlugin::XML_PATH_DISABLE_CUSTOMER_REGISTRATION,
                ScopeInterface::SCOPE_STORE
            )
            ->willReturn('0');

        $result = $this->plugin->afterIsAllowed($this->createMock(Registration::class));

        $this->assertTrue($result);
    }
}
