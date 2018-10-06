<?php

use Behat\MinkExtension\Context\MinkContext;
use Behat\Mink\Exception\ElementHtmlException;

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
}
