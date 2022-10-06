import java.io.*;
import java.util.Scanner;
import java.io.IOException;

public class es2{
    public static void main(String[] args) throws IOException{
        int num;
        String s;
        Scanner scanner = new Scanner(System.in);

        //chiedo all utente
        System.out.println("Scivi la parola: ");
        s = scanner.nextLine();
        num = s.length();
        //creazione del file
        try{
            File file = new File("nuovoFile.txt");
            if (file.createNewFile()){
              System.out.println("File creato!");
            }else{
              System.out.println("Il file esiste già");
            }
        }catch(IOException e) {
            System.out.println("OPS...");
            e.printStackTrace();
        }

        //confronto ed inserimento delle parole
        try{
            FileReader fr = new FileReader("vocabolario.txt");
            BufferedReader bf = new BufferedReader(fr);
            FileWriter myWriter = new FileWriter("nuovoFile.txt");
            String parola;

            while(true){
                parola = bf.readLine();

                if(parola == null)
                    break;

                if(parola.length() < num){
                    myWriter.write(parola);
                    myWriter.write("\n");
                }
            }
            bf.close();
            myWriter.close();
            
        }catch(IOException e){
            System.out.println("OPS...");
        }

        System.out.println("\n\nVISUALIZZAZIONE DEL FILE\n\n");

        //visualizzazione del file muovo
        try{
            FileReader fr = new FileReader("nuovoFile.txt");
            BufferedReader bf = new BufferedReader(fr);
            String parola;

            while(true) {
                parola=bf.readLine();
                if(parola==null)
                  break;
                System.out.println(parola);
              }

            bf.close();
        }catch(IOException e){
            System.out.println("OPS...");
        }

        scanner.close();
    }
}