import javax.servlet.http.*;  
import javax.servlet.*;  
import java.io.*;  
import java.sql.*; 
public class Login extends HttpServlet{ 
	private Statement stmt;
	private ResultSet rs;
	protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
		try{  
			Class.forName("com.mysql.cj.jdbc.Driver");  
			Connection con=DriverManager.getConnection("jdbc:mysql://localhost/mysql27db","root","root");  
			stmt=con.createStatement();  
			
			PrintWriter pw=res.getWriter();//get the stream to write the data  
			res.setContentType("text/html");//setting the content type  
			pw.println("<html><body>");
			
			boolean flag = false;
			rs=stmt.executeQuery("select * from user where username = '" + req.getParameter("uname")+ "';");  
			while(rs.next()) {
				if(rs.getString("password").equals(req.getParameter("pswd"))) {
					HttpSession session=req.getSession();  
			        session.setAttribute("uname",req.getParameter("uname"));
					res.sendRedirect("home.php"); 
					flag = true;
				}				
			}
			if(flag == false) {  
		        res.sendRedirect("login.php?status=invalid");
		        return;
		     }
			pw.println("</body></html>");
		pw.close();
		}catch(Exception e){
			System.out.println(e);
		}  
	}
}
