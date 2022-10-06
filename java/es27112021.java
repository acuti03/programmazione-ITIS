//import java.io.*;
import java.util.Scanner;

public class es27112021 {
    public static void main(String[] args){
        Scanner scan = new Scanner(System.in);
        int[] vet = new int[5];
        int sum = 0,lun = 5,min;

        //INSERIMENTO
        System.out.println("Inserisci i tuoi numeri...\n");
        for(int i=0; i<lun; i++){
            vet[i] = scan.nextInt();
        }
        scan.close();
        //SOMMA
        for(int i=0; i<lun; i++){
            sum = vet[i] + sum;
        }
        //VALORE MINIMO
        min = vet[0];
        for(int i=0; i<lun; i++){
            if(vet[i] <= min){
                min = vet[i];
            }
        }
        //RISPOSTA
        System.out.println("La tua somma: "+sum+"\nIl valore minimo: "+min);
    }
}
