# LACA-SOFT TOKEN API #

This is a simple token api created with OAuth 2.0 & Slim Framework

### TEST GET TOKEN###

* curl -u testclient:testpass http://localhost/ls_token_api/server/getToken/json -d grant_type=client_credentials

### TEST VALIDATE TOKEN ###

* curl http://localhost/ls_token_api/server/checkToken -d access_token=TOKEN