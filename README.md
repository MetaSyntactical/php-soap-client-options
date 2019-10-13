# PHP SoapClient Options

Allows for handling PHP Soap Client options in a way that validity and type
safety are assured.

# Usage

## Minimal example

    $location = new \MetaSyntactical\SoapClientOptions\Params\Location('https://soap-endpoint.example.com');
    $options = new \MetaSyntactical\SoapClientOptions\Options($location);
    new \SoapClient($wsdl, $options->getOptionsArray();
