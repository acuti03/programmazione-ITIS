import java.io.*;
import java.net.*;
import java.io.BufferedReader;

public class rubrica{
    public static void main(String[] args) throws IOException{
        FileReader fr = new FileReader("rubrica.txt");
        BufferedReader br = new BufferedReader(fr);
        String strCurrentLine;

        while((strCurrentLine = br.readLine()) != null){

            System.out.println(strCurrentLine);
            String[] parts = strCurrentLine.split(",");

            String nome = parts[0];
            String cognome = parts[0];
            String telefono = parts[0];

            System.out.println("nome: " + nome);
            System.out.println("cognome: " + cognome);
            System.out.println("telefono: " + telefono);
        }
        fr.close();
        br.close();
    }
}