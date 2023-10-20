<?php

namespace App;

use PHP_Parallel_Lint\PhpConsoleColor;

class Application
{
    public function run(): void
    {
        $response = readline("Enter country ");
        $response = str_replace(' ', '+', $response);
        $results = $this->search($response);
        $this->displayResults($results);
    }

    public function displayResults(UniversityCollection $listOfUniversities): void
    {
        $consoleColor = new PhpConsoleColor\ConsoleColor();
        if (count($listOfUniversities->list()) === 0) {
            echo $consoleColor->apply(['bold', 'red'], "No results found\n");
            return;
        }
        echo $consoleColor->apply(['italic', 'magenta'], count($listOfUniversities->list()) . " Results found\n");
        foreach ($listOfUniversities->list() as $university) {
            echo $consoleColor->apply(['bold', 'green'], $university->getName() . "\n");
            foreach ($university->getWebpages() as $webpage) {
                echo $consoleColor->apply(['underline', 'blue'], $webpage . "\n");
            }
            echo "\n";
        }
    }

    public function search(string $searchString): UniversityCollection
    {
        $apiUrl = "http://universities.hipolabs.com/search?country={$searchString}";
        $jsonFile = file_get_contents($apiUrl);
        $json = json_decode($jsonFile);
        $result = new UniversityCollection();
        if (count($json) === 0) {
            return $result;
        }
        foreach ($json as $university) {
            $country = $university->country;
            $webpages = [];
            foreach ($university->web_pages as $webpage) {
                $webpages[] = $webpage;
            }
            $alpha_two_code = $university->alpha_two_code;
            $name = $university->name;
            $result->add(new University($country, $webpages, $alpha_two_code, $name));
        }
        return $result;
    }
}