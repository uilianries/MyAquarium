Feature: In order to Smart Aquarium system
	 As an final user
         I want to feed my fish at aquarium by the browser

Scenario: Smart Aquarium Web Site
  Given The internet connection is up
    And gateway is working well
   When I click on feed tab
   Then the feed page open
   When I click on dispense
   Then the physical dispenser dumps the food


Feature: In order to Smart Aquarium system
	 As an final user
         I want to schedule the food dispenser by the browser

Scenario: Smart Aquarium Web Site
  Given The internet connection is up
    And gateway is working well
   When I select to dispense every 12 hours
    And at 8 o'clock
    And I click to save
   Then scheduled field is updated with my data
