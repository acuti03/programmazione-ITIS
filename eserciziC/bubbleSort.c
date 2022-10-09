#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(){
    srand(time(NULL));
    int n = 5;
    int vet[n];
    int i, j, tmp;

    printf("Enter the elements\n");
    for (i = 0; i < n; i++){
        vet[i] = (rand() % 10) + 1;
    }

    printf("\n\n");
    for(i=0; i < n; i++){
        printf("%d\t",vet[i]);
    }


    for (i = 0; i < n; i++){
        for (j = i + 1; j < n; j++){
            if (vet[i] < vet[j]){
                tmp = vet[i];
                vet[i] = vet[j];
                vet[j] = tmp;
            }
        }
    }
    printf("\n\nThe vetbers in ascending order is:\n");
    for (i = 0; i < n; ++i){
        printf("%d\t", vet[i]);
    }
}