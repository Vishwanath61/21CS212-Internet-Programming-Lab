import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.*;
public class userform extends HttpServlet {
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            String id=request.getParameter("id");
            String name=request.getParameter("name");
            Cookie c=new Cookie(id,name);
            c.setMaxAge(24*60*60);
            response.addCookie(c);            
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet userform</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Login Successfull</h1><br> <h4>Welcome "+name+"</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }
}
