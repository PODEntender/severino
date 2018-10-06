Feature: HTTPS

  Scenario: Todos os links do website devem estar em https
    Given I am on "/"
    Then the attribute "href" from "a[href*='http']" element must be "https://"

  Scenario: Todos os endereços de emtadados devem estar em https
    Given I am on "/"
    Then the attribute "href" from "a[href*='http']" element must be "https://"

  Scenario: Todas as imagens do website devem estar em https
    Given I am on "/"
    Then the attribute "src" from "img[src*='http']" element must be "https://"
    And the attribute "href" from "link[rel='icon'][href*='http']" element must be "https://"
    And the attribute "href" from "link[rel='apple-touch-icon-precomposed'][href*='http']" element must be "https://"
    And the attribute "content" from "meta[name='msapplication-TileImage'][content*='http']" element must be "https://"

  Scenario: Todos os assets css do website devem estar em https
    Given I am on "/"
    Then the attribute "href" from "link[href*='http']" element must be "https://"

  Scenario: Todos os assets js do website devem estar em https
    Given I am on "/"
    Then the attribute "src" from "script[src*='http']" element must be "https://"
