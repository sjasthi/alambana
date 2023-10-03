package metro.sql.database.aalambana.main;

/**
 * -----------------------------------------------------------------
 * Course ID 499-01 //OMBD - Cougars
 * Project Iteration_01 / FP#1
 * MAIN Driver Class: dbSelect / dbInsert / dbUpdate / dbDelete
 * -----------------------------------------------------------------
 */

import java.sql.*;
import java.util.*;


public class driver_main {

    final static String db = "abcd_db";
    final static String url = "jdbc:mysql://localhost/" + db;
    final static String user = "root";
    final static String password = "";

    static boolean DebuggingMode = false;
    static boolean VerboseMode = true;

    /*************************************************************
     * MAIN Method : metro.sql.database.aalambana.main(String[] args)
     * Supported variables [Default]
     * @param Accept(s) user input(s) as loop till 'E' Exit
     * @void
     */

    public static void main(String[] args) throws Exception {

        String dressName, dscData, dykData;
        int dressID;
        char actionSelection;

        // Initiates the scanner for argument input
        Scanner kb = new Scanner(System.in);

        do {
            _display_menu();

            actionSelection = Character.toUpperCase(kb.next().charAt(0));
            /////////////////////////////////////////////////////////////////
            // take in information to apply selection
            if (actionSelection == 'S') {
                dbSelect();

            } else if (actionSelection == 'I') {
                System.out.println("Please input - the dress name to be inserted: ");
                dressName = kb.next();

                System.out.println("Please input - the description: ");
                kb.nextLine();
                dscData = kb.nextLine();  // Use nextLine() to read the entire line, including spaces

                System.out.println("Please input - the (did you know): ");
                dykData = kb.nextLine(); // Consume the newline

                dbInsert(dressName, dscData, dykData);

            } else if (actionSelection == 'U') {
                System.out.println("Please provide ID to dress needing an update:");
                dressID = kb.nextInt();
                kb.nextLine();

                System.out.println("Please input N for dress name update, D for description update,\n or Y for DYK: ");
                char changeType = Character.toUpperCase(kb.nextLine().charAt(0));

                System.out.println("Please provide the updated value: ");
                String updatedValue = kb.nextLine();

                dbUpdate(changeType, dressID, updatedValue);
            } else if (actionSelection == 'D') {
                System.out.println("Please input ID number for dress needing deletion: ");
                dressID = kb.nextInt();

                dbDelete(dressID);

            }

        } while (actionSelection != 'E'); // break

        System.out.println("Dress Data menu has been closed.");

    }

    /**
     * Method for the (_display_menu) Supported variables [Default]
     *
     * @param displays metro.sql.database.aalambana menu content(s)
     * @void
     */
    public static void _display_menu() { // +_display_menu() : static void
        System.out.println("\r\nPlease select action type needed on Database: \r\n"
            + " - S  [ Selection ]\n"
            + " - I  [ Insert ]\n"
            + " - U  [ Update ]\n"
            + " - D  [ Delete ]\n"
            + " - E  [ End Program ] \r\n");
    }

    /**
     * Method for the (dbSelect) Supported variables [Default]
     * @param prints all tuple(s) from table[dresses]
     * @void
     */
    public static void dbSelect() { // +dbSelect() : static void

        Connection db_connection = null;
        try {

            // Step 1: Get the connection object for the database
            db_connection = DriverManager.getConnection(url, user, password);
            System.out.println("Success: Connection established");

            // Step 2: Create a statement object
            Statement statement_object = db_connection.createStatement();

            // Step 3: Execute SQL query
            // Set the query string you want to run on the database
            // If this query is not running in PhpMyAdmin, then it will not run here
            String sql_query_str = "SELECT * FROM dresses";
            ResultSet result_set = statement_object.executeQuery(sql_query_str);

            // Step 4: Process the result set
            // There are many methods for processing the ResultSet
            // See https://docs.oracle.com/javase/7/docs/api/java/sql/ResultSet.html

            while (result_set.next()) {
                int id = result_set.getInt("id");
                String name = result_set.getString("name");
                String description = result_set.getString("description");
                String did_you_know = result_set.getString("did_you_know");

                // if (VerboseMode) System.out.println(toString(id, native_name, english_name,
                // year_made));
                System.out.println(toString(id, name, description, did_you_know));

            } // end while

        } // end try

        catch (Exception ex) {
            ex.printStackTrace();
        } // end catch

    } // end dbQuery method


    /**
     * Method for the (dbInsert)
     * Supported variables [dressName, dscData, dykData]
     * @param Inserts a tuple from table[dresses]
     * @void
     */
    public static void dbInsert(String dressName, String dscData, String dykData) { // +dbInsert(engName : String, natName : String, yourMade : int) : static void

        // Declares connection
        Connection db_connection = null;

        PreparedStatement pStmt_dress, pStmt_dress_description;
        String dresses, dress_description, queryMessage;


        try {

            // Step 1: Get the connection object for the database
            db_connection = DriverManager.getConnection(url, user, password);
//            if (DebuggingMode) System.out.println("Success: Connection established");

            // Step 2: Create a statement object
            Statement statement_object = db_connection.createStatement();
            ////////////////////////////////////////////////////////////////////////////////////

            dresses = "INSERT INTO dresses(id, name, description, did_you_know)"
                      + "VALUES(?, ?, ?, ?)";
            queryMessage = "SELECT id FROM dresses "
                    + "WHERE name = '" + dressName + "' AND description = '" + dscData + "'";

            //**********************************************************
            // "Step 4: Execute SQL query with description and names with prepared statement"
            ResultSet result_set = statement_object.executeQuery(queryMessage);
            int id = 0;

            while(result_set.next())
                /** get last row of tuple dresses */
                if (result_set.isLast()) id = result_set.getInt("id");


            pStmt_dress = db_connection.prepareStatement(dresses);
            {
                pStmt_dress.setInt(1, id);
                pStmt_dress.setString(2, dressName);
                pStmt_dress.setString(3, dscData);
                pStmt_dress.setString(4, dykData);
                pStmt_dress.executeUpdate();
                System.out.println(queryMessage);
            }



            result_set.close(); // Close Result Iterator...
            db_connection.close(); // Close Database Remote Connection()

        } // end try

        catch (Exception ex) {

            ex.printStackTrace();
        } // end catch

    }


    /**
     * Method for the (dbUpdate)
     * Supported variables [user_select, id]
     * @param Updates a tuple from table[dresses]
     * @void
     */
    public static void dbUpdate(char updateType, int updateID, String updatedValue) { // +dbUpdate(updateType : char, updateID : int) : Static void

        Connection db_connection = null;
        try {

            PreparedStatement pStmt;
            String updateSql;

            // Step 1: Get the connection object for the database
            db_connection = DriverManager.getConnection(url, user, password);

            // Step 2: Create a statement object
            Statement statement_object = db_connection.createStatement();

            switch(updateType)
            {
                case 'N':

                     updateSql = "UPDATE dresses SET name = ? "
                                + "WHERE id = ?";
                     pStmt = db_connection.prepareStatement(updateSql);

                     {
                          pStmt.setString(1, updatedValue);
                          pStmt.setInt(2, updateID);
                          pStmt.executeUpdate();

                          System.out.println("Database updated successfully ");
                    }
                     break;

                case 'D':

                    updateSql = "UPDATE dresses SET description = ? "
                               + "WHERE id = ?";

                    pStmt = db_connection.prepareStatement(updateSql);
                    {System.out.println("updateID: "+ updateID);
                        pStmt.setString(1, updatedValue);
                        pStmt.setInt(2, updateID);
                        pStmt.executeUpdate();

                        System.out.println("Database updated successfully ");
                    }
                    break;

                case 'Y':

                    updateSql = "UPDATE dresses SET did_you_know = ? "
                               + "WHERE id = ?";

                    pStmt = db_connection.prepareStatement(updateSql);
                    {
                        pStmt.setString(1, updatedValue);
                        pStmt.setInt(2, updateID);
                        pStmt.executeUpdate();

                        System.out.println("Database updated successfully ");
                    }
                    break;

                default: //default message if char inputed by user is not within known scope
                    System.out.println("Unknown update choice. Please pick N, D, or Y.");

            }
        db_connection.close(); // Close Database Remote Connection()

        } // end try

        catch (Exception ex) {

            ex.printStackTrace();
        } // end catch

    }


    /**
     * Method for the (dbDelete)
     * Supported variables [id]
     * @param Deletes a tuple from table[dresses]
     * @void
     */
    public static void dbDelete(int deleteID) { // +dbDelete( deleteID : int) : static void


        // Declares connection
        Connection db_connection = null;

        try {

            // Step 1: Get the connection object for the database
            db_connection = DriverManager.getConnection(url, user, password);
            if (DebuggingMode) System.out.println("Success: Connection established");

            // Step 2: Create a statement object
            Statement statement_object = db_connection.createStatement();

            // Step 3: Execute SQL query with id with prepared statement
            PreparedStatement pStmt = db_connection.prepareStatement("DELETE FROM dresses WHERE id = ?");

            // Step 4: Process the result set
            String Query = "SELECT * FROM dresses";
            ResultSet result_set = statement_object.executeQuery(Query);

            int id = 0;

            while(result_set.next())
                /** get last row of tuple dresses */
                id = result_set.getInt("id");
                if (id == deleteID) {

                    String name = result_set.getString("name");
                    String description = result_set.getString("description");
                    String dyk = result_set.getString("did_you_know");

                    if (VerboseMode) System.out.println("Removed Entry & it's children - [ " + toString(id, name, description, (dyk)) + " ]");
                }



            pStmt.setInt(1, deleteID);
            pStmt.executeUpdate();

            result_set.close(); // Close Result Iterator...
            db_connection.close(); // Close Database Remote Connection()

        } // end try

        catch (Exception ex) {

            ex.printStackTrace();
        } // end catch



    } // end dbDelete method


    /**
     * Method for the (toString) Supported language [id, name, description, did_you_know]
     * @param Get String format
     * @return String
     */
    public static String toString(int id, String name, String description, String did_you_know) {

        return "ID: " + id + ", \t" + "name: " + name + ", \t" + "description: " + description + ", \t" +
            "did_you_know: " + did_you_know;

    }

} // end of MoiveDriver (class)
