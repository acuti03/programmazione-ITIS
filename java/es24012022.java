/*
    primo file: roceve le parole in elenco
    Algoritmo che riceve il primo carattere di una stringa e lo mette dentro al file
*/

import java.io.*;
import java.io.File;
import java.util.Scanner;

public class es24012022{
    public static void main(String[] args)throws IOException{
        String nomeFile,s;
        Scanner scanner = new Scanner(System.in);

//      INPUT DEL NOME DEL FILE
        System.out.println("Scrivi il nome del file: ");
        nomeFile = scanner.nextLine();

//      CREAZIONE DEL FILE
        try {
            File file = new File(nomeFile);
            if (file.createNewFile()){
              System.out.println("File creato: " + nomeFile);
            } else {
              System.out.println("Il file esiste già");
            }
          } catch (IOException e) {
            System.out.println("OPS...");
            e.printStackTrace();
          }

//      ALGORITMO PER INSERIRE I CARATTERI NEL FILE
        try{
            System.out.println("Scrivi: ");
            s = scanner.nextLine();

            FileReader fr = new FileReader(nomeFile);
            FileWriter myWriter = new FileWriter(nomeFile);

            myWriter.write(s.charAt(0));

            fr.close();
            myWriter.close();
        }catch(IOException e){
          System.out.println("OPS...");
          e.printStackTrace();
        }

        try{
          FileReader fr = new FileReader(nomeFile);
          BufferedReader bf = new BufferedReader(fr);

          while(true){
            s=bf.readLine();
            if(s==null)
                break;
            System.out.println(s.charAt(0));
          }
          bf.close();

        }catch(IOException e){
          System.out.println("OPS...");
          e.printStackTrace();
        }
        scanner.close();
    }
}