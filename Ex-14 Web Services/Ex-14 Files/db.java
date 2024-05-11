/*
Create a web service application that allows users to add and edit customer information in a
database, and returns a list of customers. Use Java, JAX-RS, and JDBC to connect to the
database. Create a web service client in Java to invoke the web service.
*/

package demo;

import java.sql.*;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

@WebService(serviceName = "db")
public class db 
{
    @WebMethod(operationName = "insert")
    public String insert(@WebParam(name = "id") int id, @WebParam(name = "name") String name, @WebParam(name = "amount") int amount) 
    {
        StringBuilder result = new StringBuilder();
        result.append("The new record for "+name+" is inserted successfully\n\n");
        result.append("ID\t").append("Name\t").append("Total\n");
        result.append("---\t").append("-----\t").append("------\n");
        try{
            Connection c=DriverManager.getConnection("jdbc:derby://localhost:1527/vishwa");
            Statement st=c.createStatement();
            st.executeUpdate("INSERT INTO customer VALUES("+id+",'"+name+"',"+amount+")");            
            ResultSet rs=st.executeQuery("Select * from customer");
            while(rs.next())
            {
                int cid=rs.getInt("id");
                String nam=rs.getString("name");
                int tot=rs.getInt("total");
                result.append(cid+"\t").append(nam+"\t").append(tot+"\n");
            }
            st.close();        
            c.close();
        }
        catch(SQLException e)
        {
            e.printStackTrace();
        }        
        return result.toString();
    }
    
    @WebMethod(operationName = "edit")
    public String edit(@WebParam(name = "id") int id, @WebParam(name = "name") String name, @WebParam(name = "amount") int amount) 
    {
        StringBuilder result = new StringBuilder();
        try {
            Connection c = DriverManager.getConnection("jdbc:derby://localhost:1527/vishwa");
            Statement st=c.createStatement();
            String updateQuery = "UPDATE customer SET name='" + name + "', total=" + amount + " WHERE id=" + id;
            int rowsAffected = st.executeUpdate(updateQuery);
            if (rowsAffected > 0) {
                result.append("The customer record with ID ").append(id).append(" is updated successfully.\n\n");
                result.append("ID\t").append("Name\t").append("Total\n");
                result.append("---\t").append("-----\t").append("------\n");
                ResultSet rs=st.executeQuery("Select * from customer");
                while(rs.next())
                {
                    int cid=rs.getInt("id");
                    String nam=rs.getString("name");
                    int tot=rs.getInt("total");
                    result.append(cid+"\t").append(nam+"\t").append(tot+"\n");
                }
            } 
            else {
                result.append("Failed to update the customer record with ID ").append(id).append(".\n\n");
            }
            st.close();
            c.close();
        } 
        catch (SQLException e) {
            e.printStackTrace();
            result.append("Error occurred while updating the customer record.\n\n");
        }    
        return result.toString();
    }
}
