<%-- 
2.  Assume you have a database schema that contains a table called "employees" with the following columns: 
    employee_id (int, primary key),first_name (varchar), last_name (varchar), salary (double)
    Write a JSP program that connects to the database using JDBC and retrieves the following information:
        1.	The total number of employees in the database.
        2.	The average salary of all employees.
        3.	The highest salary among all employees.
    Once you have retrieved this information, create a JSP page that displays this      information in a table format.

--%>

<%@page import="java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Employee Details</title>
    </head>
    <body>
        <h2>Employee Details</h2><br><br>
        <%
           Connection c=DriverManager.getConnection("jdbc:derby://localhost:1527/InternetProgramming","ip","123");
            Statement st=c.createStatement();
            ResultSet rs;
            rs=st.executeQuery("SELECT COUNT(*) FROM EMPLOYEES");
            int n=0;
            while(rs.next())
            {
                n=rs.getInt(1);
            }     
            rs=st.executeQuery("SELECT AVG(salary) FROM EMPLOYEES");
            double avgsalary=0.0;
            while(rs.next())
            {
                avgsalary=rs.getDouble(1);
            }
            rs=st.executeQuery("SELECT MAX(salary) FROM EMPLOYEES");
            double maxsalary=0.0;
            while(rs.next())
            {
                maxsalary=rs.getDouble(1);
            }
        %>
        <table border="1px">
            <tr>
                <th>Number of Employees</th>
                <th>Average Salary of Employees</th>
                <th>Maximum Salary of Employees</th>
            </tr>
            <tr>
                <td><%=n %></td>
                <td><%= String.format("%.2f", avgsalary) %></td>
                <td><%=maxsalary %></td>                
            </tr>
        </table>
    </body>
</html>
