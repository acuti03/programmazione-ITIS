//import java.io.*;
import java.util.Scanner;

public class scrivi{
    public static void main(String[] args){
        Scanner scan = new Scanner(System.in);
        int lun = 5;
        String[] vet = new String[5];

//      RIEMPIO IL MIO ARRAY
        System.out.print("Scrivi...");
        for(int i=0; i<lun; i++){
            vet[i] = scan.nextLine();
        }
        scan.close();
        System.out.print("\n\n");
//      STAMPO L'ARRAY DI STRINGHE
        for(int i=0; i<lun; i++){
            System.out.println(vet[i]+"\t");
        }
//      STAMPO SOLO LE STRIGHE CHE INIZIANO PER VOCALE
        System.out.print("\n\n");
        for(int i=0; i<lun; i++){
            if(vet[i].charAt(0) == 'A' || vet[i].charAt(0) == 'a')
                System.out.println(vet[i]);
            if(vet[i].charAt(0) == 'E' || vet[i].charAt(0) == 'e')
                System.out.println(vet[i]);
            if(vet[i].charAt(0) == 'I' || vet[i].charAt(0) == 'i')
                System.out.println(vet[i]);
            if(vet[i].charAt(0) == 'O' || vet[i].charAt(0) == 'o')
                System.out.println(vet[i]);
            if(vet[i].charAt(0) == 'U' || vet[i].charAt(0) == 'u')
                System.out.println(vet[i]);
        }
//      DETERMINO LA LUGHEZZA DI OGNI STRINGA
        System.out.println("\n\n");
        for(int i=0; i<lun; i++){
            System.out.println("La stringa: "+vet[i]+" ha "+vet[i].length()+" caratteri");
        }
        
    }
}