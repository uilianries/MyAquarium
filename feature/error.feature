Feature: In order to Smart Aquarium system
	 As an final user
         I want to receive an error message when the site is not working 

Scenario: Smart Aquarium Web Site
  Given The internet connection is up
    And gateway is working with problem
   When Open the main page
   Then I receive a message as "Could not load the current scenario"
    And the background uses an aquarium image
    And the fish breed is replaced by the message "Loading"

