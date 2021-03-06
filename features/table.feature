Feature: Browser Feature

  @table
  Scenario: Testing access to table.html
    Given I am on "table.html"
    Then I should see "You are about to test table."

  @table
  Scenario: Testing columns
    Given I am on "table.html"

    Then I should see 2 columns in the "table" table

    Then the columns schema of the "table" table should match:
      | columns |
      | Lorem   |
      | Ipsum   |

  @table
  Scenario: Testing rows
    Given I am on "table.html"

    Then I should see 2 rows in the "table" table
    Then I should see 2 rows in the 1st "table" table

    Then the data in the 1st row of the "table" table should match:
      | col1   | col2   |
      | Lorem  | Ipsum  |

    Then the data in the 2nd row of the "table" table should match:
      | col1   | col2   |
      | Dolor  | Sit    |

  @table
  Scenario: Testing cell content
    Given I am on "table.html"

    Then the 1st column of the 1st row in the "table" table should contain "Lorem"
    Then the 2nd column of the 1st row in the "table" table should contain "Ipsum"
