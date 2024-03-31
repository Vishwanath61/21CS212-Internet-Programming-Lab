<%@page contentType="text/html;charset=UTF-8" language="java" %>
<%@page import="java.sql.Connection" %>
<%@page import="java.sql.Statement" %>
<%@page import="java.sql.ResultSet" %>
<%@page import="java.sql.DriverManager" %>
<%@page import="java.util.*" %>
<html>
<head>
    <title>JDBC Program</title>
</head>
<body>
<%
    int number_Of_Movies = 0;
    double total_Amount = 0.0;
    double average_Price_Of_Movies = 0.0;
    String highest_Rating_Of_Movies = "";

    Connection con = null;
    Statement st = null;
    ResultSet rs = null;

    try {
        Class.forName("com.mysql.cj.jdbc.Driver");
        con = DriverManager.getConnection("jdbc:mysql://localhost:3306/internetprogramming", "root", "Dinesh@2024");
        out.println("Connection established successfully."); // Debug output
        st = con.createStatement();
        String query = "SELECT * FROM Movies";
        out.println("Executing query: " + query); // Debug output
        rs = st.executeQuery(query);

        while (rs.next()) {
            out.println("Inside while loop."); // Debug output
            number_Of_Movies++;
            total_Amount += rs.getDouble("price");
            String s = rs.getString("rating");
            if (highest_Rating_Of_Movies.isEmpty() || s.compareTo(highest_Rating_Of_Movies) > 0)
                highest_Rating_Of_Movies = s;
        }

        // Calculate average price if there are movies
        if (number_Of_Movies > 0) {
            average_Price_Of_Movies = total_Amount / number_Of_Movies;
        }

    } catch (Exception e) {
        out.println(e.getMessage());
    } finally {
        try {
            if (rs != null) {
                rs.close();
            }
            if (st != null) {
                st.close();
            }
            if (con != null) {
                con.close();
            }
        } catch (Exception e) {
            out.println(e.getMessage());
        }
    }
%>
<table border="1">
    <thead>
    <th style="font-size: 30px">Number_Of_Movies</th>
    <th style="font-size: 30px">Average_Price_Of_Movies</th>
    <th style="font-size: 30px">Highest_Rating_Of_Movies</th>
    </thead>
    <tbody>
    <tr>
        <td style="font-size: 25px"><%= number_Of_Movies %></td>
        <td style="font-size: 25px"><%= average_Price_Of_Movies %></td>
        <td style="font-size: 25px"><%= highest_Rating_Of_Movies %></td>
    </tr>
    </tbody>
</table>
</body>
</html>
