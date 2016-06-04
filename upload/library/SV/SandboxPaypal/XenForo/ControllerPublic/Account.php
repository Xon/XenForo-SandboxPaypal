<?php

class SV_SandboxPaypal_XenForo_ControllerPublic_Account extends XFCP_SV_SandboxPaypal_XenForo_ControllerPublic_Account
{
    public function actionUpgrades()
    {
        $response = parent::actionUpgrades();

        if (!XenForo_Application::debugMode())
        {
            throw new XenForo_Exception(new XenForo_Phrase('sandboxing_paypal_but_debug_is_off'), true);
        }
        
        if ($response instanceof XenForo_ControllerResponse_View)
        {
            if (empty($response->subView->params['payPalUrl']))
            {
                throw new Exception('Paypal sandboxing logic failure');
            }

            $response->subView->params['payPalUrl'] = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        }

        return $response;
    }

    public function actionUpgradesGiftConfirm()
    {
        $response = parent::actionUpgradesGiftConfirm();

        if (!XenForo_Application::debugMode())
        {
            throw new XenForo_Exception(new XenForo_Phrase('sandboxing_paypal_but_debug_is_off'), true);
        }
        if (empty($response->params['payPalUrl']))
        {
            throw new Exception('Paypal sandboxing logic failure');
        }

        $response->params['payPalUrl'] = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

        return $response;
    }
}