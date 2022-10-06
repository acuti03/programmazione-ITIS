#include <stdio.h>
#include <stdlib.h>

int cubo(int n);

int main() {
  int a[100];
  int i;
  int M;

  printf("\nScrivi un numero minore o uguale a 100: ");
  scanf("%d", &M);

  for (i = 1; i <= M; i++) {
    a[i - 1] = cubo(i);
  }

  printf("\n\n");
  for (i = 0; i < M; i++) {
    printf("%d\t", a[i]);
  }
}

int cubo(int n) {
  int s = 0;
  int i = 1;
  int j = 0;

  for (i = 1; i <= n; i++) {
    for (j = 0; j < n; j++) {
      s = s + n;
    }
  }
  return s;
}
