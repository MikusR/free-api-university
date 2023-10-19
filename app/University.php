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
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return array
     */
    public function getWebpages(): array
    {
        return $this->webpages;
    }

    /**
     * @return string
     */
    public function getAlphaTwoCode(): string
    {
        return $this->alpha_two_code;
    }

    /**
     * @return string
     */
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