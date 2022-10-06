//import java.io.*;
import java.util.Scanner;


public class contrario {
    public static void main(String[] args){
        Scanner scan = new Scanner(System.in);
        int lun = 5;
        String[] vet = new String[5];

        for(int i=0; i<lun; i++){
            vet[i] = scan.nextLine();
        }
        scan.close();
//      STAMPA DEL VETTORE COME DA INSERIMENTO
        System.out.println("\nvettore giusto:");

        for(int i=0; i<lun; i++){
            System.out.println(vet[i]);
        }
//      STAMPA DEL VETTORE CON STRINGHE AL CONTRARIO
        System.out.println("\nvettore al contrario:\n\n");

        for(int i=5; i!=0; i--){
            System.out.println(vet[i]);
        }
       
    }
}
