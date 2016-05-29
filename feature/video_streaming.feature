Feature: In order to Smart Aquarium system
	 As an final user
         I want to watch my fish at aquarium by the browser

Scenario: Smart Aquarium Web Site
  Given The internet connection is up
    And gateway is working well
   When I click on video tab
   Then video streaming page open
    And I can see a real time image
