<?php

class SV_SandboxPaypal_Paypal extends XenForo_UserUpgradeProcessor_PayPal
{
    public function validateRequest(&$errorString)
    {
        if (!XenForo_Application::debugMode())
        {
			$errorString = new XenForo_Phrase('sandboxing_paypal_but_debug_is_off');
			XenForo_Error::logException(new Exception($errorString), false);
			return false;
        }

        if (empty($this->_filtered['test_ipn']))
        {
			$errorString = new XenForo_Phrase('sandboxing_paypal_but_live_paypal_in_use');
			XenForo_Error::logException(new Exception($errorString), false);
			return false;
        }

        return parent::validateRequest($errorString);
    }
}