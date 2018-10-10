<?php

use Behat\Mink\Element\NodeElement;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Mink\Exception\ElementHtmlException;
use Behat\Mink\Exception\ElementTextException;
use Behat\Mink\Exception\ElementNotFoundException;
use Behat\Mink\Exception\ExpectationException;

class ExtendedMinkContext extends MinkContext
{
    const PLACEHOLDER_BASE_URL = '%base_url%';

    /**
     * @param string $value
     * @return bool
     */
    protected function hasPlaceholderValue(string $value): bool
    {
        return preg_match('/%[a-zA-Z_]+%/', $value);
    }

    /**
     * @param string $placeholder
     * @return string
     */
    protected function resolvePlaceholderValue(string $placeholder): string
    {
        switch ($placeholder) {
            case self::PLACEHOLDER_BASE_URL:
                return $this->getMinkParameter('base_url');
        }

        return $placeholder;
    }

    /**
     * @param string $element
     * @param string $attribute
     * @param string $value
     *
     * @Then /^the attribute "(?P<attribute>(?:[^"]|\\")*)" from "(?P<element>[^"]*)" element must be "(?P<value>(?:[^"]|\\")*)"$/
     * @throws ElementHtmlException
     */
    public function assertElementAttributeHasValue(string $element, string $attribute, string $value): void
    {
        if ($this->hasPlaceholderValue($value)) {
            $value = $this->resolvePlaceholderValue($value);
        }

        $this->assertSession()->elementAttributeContains('css', $element, $attribute, $value);
    }

    /**
     * @param string $type
     *
     * @Then /^the Schema.Org information must be of type "(?P<type>(?:[^"]|\\")*)"$/
     * @throws ElementNotFoundException
     * @throws ElementTextException
     * @throws ExpectationException
     */
    public function assertSchemaOrgContentIsOfType(string $type): void
    {
        $locator = 'script[type="application/ld+json"]';
        $schema = $this->getSession()->getPage()->find('css', $locator);
        if (false === $schema instanceof NodeElement) {
            throw new ElementNotFoundException($this->getSession()->getDriver(),'Tag', 'css', $locator);
        }

        $json = json_decode(trim($schema->getText()), true);
        if (!isset($json['@type'])) {
            throw new ElementTextException($this->getSession()->getDriver(),$this->getSession(), $schema);
        }

        $typeFound = strtolower($json['@type']);
        $expectedType = strtolower($type);

        if ($typeFound !== $expectedType) {
            $message = sprintf(
                'Schema type found (%s) does not match expected (%s)',
                $typeFound,
                $expectedType
            );

            throw new ExpectationException($message, $this->getSession()->getDriver());
        }
    }
}
