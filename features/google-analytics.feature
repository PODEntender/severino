Feature: Google Analytics

  Scenario: O código do GA é o especificado pelo projeto
    Given I am on "/"
    Then there should be only one Google Analytics script loaded
    And Google Analytics id should be "UA-126110575-1"
