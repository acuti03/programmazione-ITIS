#include <stdio.h>
#include <stdlib.h>

int MCD(int a, int b);

int main() {
  int M;
  int vet[10];
  int n;
  int i;

  printf("\nScrivi un numero: ");
  scanf("%d", &M);

  for (i = 1; i <= 10; i++) {
    n = MCD(M, i);
    printf("\nMCD(%d, %d) = %d", M, i, n);
  }
}

int MCD(int a, int b) {
  int t;
  int m = 1;
  int i;

  if (a > b) {
    t = b;
    b = a;
    a = t;
  }

  for (i = 2; i <= a; i++) {
    if (a % i == 0) {
      if (b % i == 0) {
        m = i;
      }
    }
  }

  return m;
}
