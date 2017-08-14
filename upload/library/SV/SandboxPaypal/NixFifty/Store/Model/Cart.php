<?php

class SV_SandboxPaypal_NixFifty_Store_Model_Cart extends XFCP_SV_SandboxPaypal_NixFifty_Store_Model_Cart
{
    public function buildPayPalQueryUrl($paymentParams)
    {
        $queryString = XenForo_Link::buildQueryString($paymentParams);
        $url = "https://www.sandbox.paypal.com/cgi-bin/webscr?{$queryString}";
        
        return $url;
    }
}