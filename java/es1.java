import java.io.*;
import java.util.Scanner;
import java.io.IOException;

public class es1 {
    public static void main(String[] args)throws IOException{
        String s;
        Scanner scanner = new Scanner(System.in);
        
        //DOMANDO ALL UTENTE LA PAROLA
        System.out.println("Scrivi la tua parola: ");
        s = scanner.nextLine();

        //CREAZIONE DEL FILE
        try{
            File file = new File("nuovo.txt");
            if (file.createNewFile()){
                System.out.println("File creato!");
              }else{
                System.out.println("Il file esiste già");
              }
        }catch(IOException e){
            System.out.println("OPS");
        }

        //ALGORITMO DI INSERIMENTO
        try{
            FileReader fr = new FileReader("vocabolario.txt");
            BufferedReader bf = new BufferedReader(fr);
            FileWriter fw = new FileWriter("nuovo.txt");
            String parola;
            int result;

            while(true){
                parola = bf.readLine();
                if(parola == null)
                    break;
                result = s.compareTo(parola);
                if(result < 0){
                    fw.write(parola);
                    fw.write("\n");
                }
            }
            bf.close();
            fw.close();
        }catch(IOException e){
            System.out.println("OPS");
        }

        //VISUALIZZO IL FILE
        try{
            FileReader fr = new FileReader("nuovo.txt");
            BufferedReader bf = new BufferedReader(fr);
            String parola;

            while(true){
                parola = bf.readLine();
                if(parola == null)
                    break;
                System.out.println(parola);
            }
            bf.close();
            fr.close();
        }catch(IOException e){
            System.out.println("OPS");
        }

        scanner.close();
    }
}
