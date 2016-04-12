<?php

class SV_SandboxPaypal_Listener
{
    const AddonNameSpace = 'SV_SandboxPaypal_';

    public static function load_class($class, array &$extend)
    {
        $extend[] = self::AddonNameSpace.$class;
    }
}
