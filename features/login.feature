Feature: Login Form
  In order to connect on my account
  As a registered User
  I must fill the connection Form

  Scenario: Connection form is empty
    Given I'm on /connexion page
    And no fields are filled
    Then  I'm an anonymous user

  Scenario: The connection form is submitted
    Given I'm on /connexion page
    And I have filled all form fields
    When I submit form
    Then  I'm a registered user




