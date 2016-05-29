Feature: In order to Smart Aquarium system
	 As an final user
         I want to watch the current status at aquarium

Scenario: Smart Aquarium Web Site
  Given The internet connection is up
    And gateway is working well
   When Open the main page
   Then I can see the last temperature level read
    And the last light level read
    And the last pH level read

Feature: In order to Smart Aquarium system
	 As an final user
         I want to see the history about each level

Scenario: Smart Aquarium Web Site
  Given The internet connection is up
    And gateway is working well
   When I select history on temperaure status
   Then a chart from the last 48 hours is shown
