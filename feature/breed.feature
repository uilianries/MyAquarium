Feature: In order to Smart Aquarium system
	 As an final user
         I want to configure my aquarium by the breed

Scenario: Smart Aquarium Web Site
  Given The internet connection is up
    And gateway is working well
   When I click on breed tab
   Then the breed page open
   When I select the breed Betta 
   Then the background uses a Betta image
    And the main page shows Betta as name
