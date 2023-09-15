import javax.servlet.http.*;  
import javax.servlet.*;  
import java.io.*;  
public class SaveBlog extends HttpServlet{  
	public void doPost(HttpServletRequest req,HttpServletResponse res)  
			throws ServletException,IOException  
	{  
		res.setContentType("text/html");//setting the content type  
		PrintWriter pw=res.getWriter();//get the stream to write the data  

		//writing html in the stream  
		pw.println("<html><body>");  
		String pri = req.getParameter("inpText");
		pw.println(pri);
		pw.println("</body></html>" );  

		pw.close();//closing the stream  
	}
} 