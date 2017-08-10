# XenForo-SandboxPaypal

Forces the use paypal sandbox.

## Activation requirements
- Log in with your paypal account into https://developer.paypal.com/, and ensure you have a Business sandbox user and a Personal sandbox user (you may need to change the password on any existing accounts).
- Ensure your Business sandbox user has Instant Payment Notification (IPN) enabled.
- Ensure this sandbox user is used by XenForo paypal configuration.
- Ensure the board site URL points to the site (ie testing.example.com).
- Your webserver **must** be configured to allow anonymous access to the file.
 ```
 /sandbox_payment_callback.php
 ```

 Sample nginx config (DO NOT USE AS IS):
 ```
 # anonymous access
 location = /sandbox_payment_callback.php {
     try_files $uri =404;
     fastcgi_pass 127.0.0.1:9001;
     include fastcgi_params;
 }

 # password protect site access
 location ~ \.php$ {
   auth_basic "Restricted";
   auth_basic_user_file /var/www/html/.htpasswd;
   log_not_found off;
   try_files $uri =404;
   fastcgi_pass fastcgi_pass 127.0.0.1:9001;
   include fastcgi_params;
 }
 ```
