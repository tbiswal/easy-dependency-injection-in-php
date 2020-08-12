<?php

interface ProviderInterface
{
    public function getLowestPrice($location);
    public function book($location);
}

class User
{
    public function bookLocation(ProviderInterface $provider, $location)
    {
        $amountCharged = $provider->book($location);
        $this->logBookedLocation($location, $amountCharged);
    }
}

$location = 'Hilton,Dallas';
$cheapestProvider = $this->findCheapest($location, array(
    new PricelineProvider,
    new OrbitzProvider,
));

$user->bookLocation($cheapestProvider, $location);

// Wonderful! No matter what provider is the cheapest, we are able to simply pass it along to our User instance for booking. Since our User is simply asking for an object instances that abides by the ProviderInterface contract, our code will continue to work even if we add new provider implementations.