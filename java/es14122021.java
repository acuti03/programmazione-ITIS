import java.net.*;
import java.io.*;

public class es14122021 {
    public static void main(String[] args) throws IOException{

        int porta = 9000;     //1024 - porta - 65536
        try(
            ServerSocket ss = new ServerSocket(porta);
            Socket clientSocket = ss.accept();
            PrintWriter out = new PrintWriter(clientSocket.getOutputStream(), true);
            BufferedReader in = new BufferedReader( new InputStreamReader(clientSocket.getInputStream())); 
        ){
            out.println("HTTP/1.1 200 OK\nContent-Type:text/html\nContent-Length:4\n\nsium");
        }catch(IOException e){
            System.out.print(e);
        }
    }
}