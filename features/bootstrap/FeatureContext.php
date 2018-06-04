<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @param $url
     * @param Request $request
     * @Given I'm on :url page
     */
    public function ImOnThePage($url)
    {
        return Request::create('/connexion', 'GET');
    }

    /**
     * @And no fields are filled
     */
    public function formNonSubmitted(FormInterface $form)
    {
        $form->isDisabled();
    }

    /**
     * @And I have filled all form fields
     */
    public function formFieldsCompleted(FormInterface $form)
    {
        $form->getData();
    }

    /**
     * @When I submit form
     */
    public function formSubmitted(FormInterface $form)
    {
        $form->isSubmitted();
        $form->isValid();
    }

    /**
     * @Then I'm an anonymous user
     */
    public function anonymousUser(Session $session)
    {
        $session->get(!'pseudo');
    }

    /**
     * @Then I'm a registered user
     */
    public function registeredUser(Session $session)
    {
        $session->get('pseudo');
    }
}
