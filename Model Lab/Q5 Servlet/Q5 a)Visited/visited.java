import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
@WebServlet(urlPatterns = {"/visited"})
public class visited extends HttpServlet {
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {            
            int count=0;
            Cookie[] c=request.getCookies();
            if(c!=null)
            {
                for(Cookie ck:c)
                {
                    if(ck.getName().equals("VisitCount"))
                    {
                        count=Integer.parseInt(ck.getValue());
                        break;
                    }
                }
            }
            count++;
            Cookie VisitCount=new Cookie("VisitCount",String.valueOf(count));
            response.addCookie(VisitCount);            
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet visited</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>You Visited this Page "+count+" times.</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }
}
