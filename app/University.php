<?php

namespace App;

class University
{
    private string $country;
    private array $webpages;
    private string $alpha_two_code;
    private string $name;

    public function __construct(
        string $country,
        array  $webpages,
        string $alpha_two_code,
        string $name
    )
    {

        $this->country = $country;
        $this->webpages = $webpages;
        $this->alpha_two_code = $alpha_two_code;
        $this->name = $name;
    }


    public function getCountry(): string
    {
        return $this->country;
    }


    public function getWebpages(): array
    {
        return $this->webpages;
    }


    public function getAlphaTwoCode(): string
    {
        return $this->alpha_two_code;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        $returnString = $this->getName() . "\n";
        foreach ($this->getWebpages() as $webpage) {
            $returnString .= $webpage . "\n";
        }
        return $returnString;
    }
}