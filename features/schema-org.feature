Feature: Schema.org
  Scenario: Home-page apresenta-se como website
    Given I am on "/"
    Then I should see an "script[type='application/ld+json']" element
    And the Schema.Org information must be of type "website"

#  Temporariamente bloqueado: o site ainda não oferece suporte ld+json
#  Scenario: Páginas de episódio apresentam-se como creative work
#    Given I am on "/2018/09/saude-coletiva-e-racismo.html"
#    Then I should see an "script[type='application/ld+json']" element
#    And the Schema.Org information must be of type "creative works"
