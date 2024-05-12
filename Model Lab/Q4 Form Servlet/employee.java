import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
@WebServlet(urlPatterns = {"/employee"})
public class employee extends HttpServlet {
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            String name=request.getParameter("name");
            String id=request.getParameter("id");
            String desg=request.getParameter("desg");
            double pay=Double.parseDouble(request.getParameter("pay"));            
            double da=pay*0.10;
            double hra=pay*0.03;
            double netSalary=pay+da+hra;            
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet employee</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Employee Details</h1><br><br>");
            out.println("<h4>Employee Name:"+name+"</h4>");
            out.println("<h4>Employee ID:"+id+"</h4>");
            out.println("<h4>Employee Designation:"+desg+"</h4>");
            out.println("<h4>Employee Basic Pay:"+pay+"</h4>");
            out.println("<h4>Employee DA:"+da+"</h4>");
            out.println("<h4>Employee HRA:"+hra+"</h4>");
            out.println("<h4>Employee Net Salary:"+netSalary+"</h4>");
            out.println("</body>");
            out.println("</html>");
        }
    }
}
