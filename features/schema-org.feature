Feature: Schema.org
  Scenario: Home-page apresenta-se como website
    Given I am on "/"
    Then I should see an "script[type='application/ld+json']" element
    And the Schema.Org information must be of type "Organization"

  Scenario: Páginas de episódio apresentam-se como creative work
    Given I am on "/episodio/047-cnpq-podera-cancelar-bolsas-ate-outubro-de-2019-ufmg-na-via-lactea-e-acordo-de-salvaguardas-tecnologicas/"
    Then I should see an "script[type='application/ld+json']" element
    And the Schema.Org information must be of type "Article"
