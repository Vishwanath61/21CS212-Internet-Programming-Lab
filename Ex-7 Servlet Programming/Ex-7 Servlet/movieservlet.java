/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */

import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

/**
 *
 * @author VISHWA
 */
@WebServlet(urlPatterns = {"/movieservlet"})
public class movieservlet extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            
            String a=request.getParameter("input");
            
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet movieservlet</title>");            
            out.println("</head>");
            out.println("<body>");
            if(a.equals("Killers of the flower moon")||a.equals("Leonardo DiCaprio"))
            {
                out.println("<h1>Killers of the flower moon Starring Leonardo DiCaprio</h1><br><br>");  
                out.println("<img src=\"https://a.ltrbxd.com/resized/film-poster/3/9/8/0/0/9/398009-killers-of-the-flower-moon-0-460-0-690-crop.jpg?k=13ea9a5cda\">");
            }
            else if(a.equals("Dune")||a.equals("Timothée Chalamet"))
            {
                out.println("<h1>Dune Starring Timothée Chalamet</h1>"); 
                out.println("<img src=\"https://th.bing.com/th/id/OIP.N6vdSTKjIhNSvTH2P0rUXgAAAA?rs=1&pid=ImgDetMain\">");
            }
            else
            {
                out.println("<h1>Result not found.</h1><br><br>");
            }            
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
