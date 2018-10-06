<?php

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Exception as MinkException;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends ExtendedMinkContext
{
    const GA_SCRIPT_CSS_SELECTOR = 'script[async][src*="gtag/"]';

    /**
     * @param string $id
     *
     * @Then /^Google Analytics id should be "(?P<id>(?:[^"]|\\")*)"$/
     * @throws MinkException\ElementHtmlException
     */
    public function assertGoogleAnalyticsIdIs(string $id): void
    {
        $this->assertSession()
            ->elementAttributeContains('css', self::GA_SCRIPT_CSS_SELECTOR, 'src', $id);
    }

    /**
     * @Then /^there should be only one Google Analytics script loaded$/
     *
     * @throws MinkException\ExpectationException
     */
    public function assertUniqueGoogleAnalyticsScript(): void
    {
        $this->assertSession()->elementsCount('css', 'script[src*="gtag/"]', 1);
    }
}
