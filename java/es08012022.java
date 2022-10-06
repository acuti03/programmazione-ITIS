import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.util.Scanner;

public class es08012022{
  public static void main(String[] args){
    Scanner scan = new Scanner(System.in);
    int resp=0;

    if(resp==0){
        try{
          File myObj = new File("marco.txt");
            if(myObj.createNewFile()){
              System.out.println("File creato: " + myObj.getName());
            }
            else{
              System.out.println("Il file esiste gia'");
            }
        } 
        catch (IOException e){
          System.out.println("Errore");
        }
    }
    }
}