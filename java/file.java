import java.io.*;
import java.io.BufferedReader;
import java.io.IOException;
import java.nio.file.FileSystems;
import java.nio.file.Files;
import java.nio.file.Path;
import java.util.Scanner;

class file{
  public static void main(String args[]) throws IOException {
    int num;
    String s, filename, ext;
    Scanner scanner = new Scanner(System.in);

//  Inserimento del file e del numero
    System.out.println("Inserisci nome del file");
    filename = scanner.nextLine();
    System.out.println("Inserisci estensione del file");
    ext = scanner.nextLine();
    filename = filename + "." + ext;
    System.out.println("Scrivi un numero: ");
    num = scanner.nextInt();
    System.out.println("\n\n");

//  Lettura e scrittura delle parole nel file
    try{
        FileReader fr = new FileReader(filename);
        BufferedReader bf = new BufferedReader(fr);
        while(true){
        s=bf.readLine();
        if(s==null)
            break;
        if(s.length() >= num)
            System.out.println(s);
        }
        bf.close();
    }catch(IOException e){
        System.out.println("OPS qualcosa è andato storto...");
    }
    System.out.println("\n\n");
//  Inserimento delle parole nel file
    try{
        FileReader fr = new FileReader(filename);
        BufferedReader bf = new BufferedReader(fr);
        FileWriter myWriter = new FileWriter("filename.txt");
        while(true){
            s = bf.readLine();
            if(s == null)
                break;
            if(s.length() >= num)
                myWriter.write(s);
            /* System.out.print("\n"); */
            myWriter.write("\n");
        }
        bf.close();
        myWriter.close();
    }catch(IOException e){
        System.out.println("An error occurred.");
        e.printStackTrace();
    }

//  Visualizzazione delle parole nuove del file
    try{
        FileReader fr = new FileReader("filename.txt");
        BufferedReader bf = new BufferedReader(fr);
        while(true){
            s=bf.readLine();
            if(s==null)
                break;
            System.out.println(s);
        }
        bf.close();
    }catch(IOException e){
        System.out.println("OPS qualcosa è andato storto...");
    }

// Possibilità di cancellare il file
    try{
        Path path = FileSystems.getDefault().getPath("/Users/simoneacuti/Desktop/gitHub/java/filename.txt");
        char scelta;
        System.out.println("Desideri cancellare il file nuovo?(Y/N)");
        scelta = scanner.next().charAt(0);
        if(scelta == 'Y')
            Files.deleteIfExists(path);
        else
            System.out.println("OK...");
    }catch(IOException e){
        System.out.println("OPS qualcosa è andato storto");
    }
    scanner.close();
  }
}