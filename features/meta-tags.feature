Feature: Meta tags
  Scenario: Open Graph
    Given I am on "/"
    Then the attribute "content" from "meta[property='og:title']" element must be "PODEntender - Podcast de divulgação científica e muita fuleragem"
    And the attribute "content" from "meta[property='og:url']" element must be "/"
    And the attribute "content" from "meta[property='og:type']" element must be "website"
    And the attribute "content" from "meta[property='og:locale']" element must be "pt_BR"
    And the attribute "content" from "meta[property='og:description']" element must be "O PODEntender é um podcast independente de divulgação científica e tem como principal objetivo apresentar a realidade da ciência brasileira. Podcast de ciência no Brasil."
    And the attribute "content" from "meta[property='og:image']" element must be "/assets/images/favcom.png"
    And the attribute "content" from "meta[property='og:image:secure_url']" element must be "/assets/images/favcom.png"
    And the attribute "content" from "meta[property='og:image:alt']" element must be "O PODEntender é um podcast independente de divulgação científica e tem como principal objetivo apresentar a realidade da ciência brasileira. Podcast de ciência no Brasil."

  Scenario: Twitter
    Given I am on "/"
    Then the attribute "content" from "meta[name='twitter:card']" element must be "summary_large_image"
    And the attribute "content" from "meta[name='twitter:description']" element must be "O PODEntender é um podcast independente de divulgação científica e tem como principal objetivo apresentar a realidade da ciência brasileira. Podcast de ciência no Brasil."
    And the attribute "content" from "meta[name='twitter:title']" element must be "PODEntender - Podcast de divulgação científica e muita fuleragem"
    And the attribute "content" from "meta[name='twitter:url']" element must be "/"
    And the attribute "content" from "meta[name='twitter:site']" element must be "@podentender"
    And the attribute "content" from "meta[name='twitter:image']" element must be "/assets/images/logo.png"
    And the attribute "content" from "meta[name='twitter:creator']" element must be "@podentender"
