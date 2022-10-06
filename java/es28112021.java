//import java.io.*;
import java.util.Scanner;

public class es28112021{
    public static void main(String[] args){
        Scanner scan = new Scanner(System.in);
        int[] vet = new int[5];
        int lun = 5,sum=0,tmp,min;

//      CREO IL VETTORE
        System.out.println("Digita...\n");
        for(int i=0; i<lun; i++){
            vet[i] = scan.nextInt();
        }
        scan.close();
//      STAMPO IL VETTORE
        System.out.print("\n\n");
        for(int i=0; i<lun; i++){
            System.out.print(vet[i]+"\t");
        }
//      MEDIA DEL VETTORE
        for(int i=0; i<lun; i++){
            sum = vet[i] + sum;
        }
        System.out.println("\nLa media del vettore: "+sum/lun);
//      ORDINAMENTO CRESCENTE DEL VETTORE
        for(int i=0; i<lun-1; i++){
            min = i;
            for(int j=i+1; j<lun; j++)
                if(vet[j] < vet[min])
                    min = j;

            tmp = vet[min];
            vet[min] = vet[i];
            vet[i] = tmp;
        }
        System.out.print("\n\n");
        for(int i=0; i<lun; i++){
            System.out.print(vet[i]+"\t");
        }
    }
}