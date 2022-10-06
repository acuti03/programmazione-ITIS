#include <stdio.h>
#include <stdlib.h>
#include <time.h>

/* DEFINITION OF FUNCTIONS */
void multiples();
void isPalindrome();
void fiboEven();
void bubbleSort();
void smallest1To20();
void primeNumber();
void cubo();
void binaryTodecimal();
void sequence();
void strcmp();
void occorrenze();

/* MAIN WHICH CONTAINS THE EXERCIZES */
int main() {
  int choise;

  printf("\n\n<!----ESERCIZI-EULER----!>\n\n");
  printf("1) Multiples of 3 or 5\n");
  printf("2) Check if palindrome\n");
  printf("3) Check the even values of fibonacci sequence\n");
  printf("4) In an array 10 elements are randomly generated and sorted in "
         "descending order.\nThe user enters a new value to insert into the "
         "array.\n");
  printf("5) What is the smallest number that can be divided from 1 to 20?\n");
  printf("6) What is the 10.001st prime number?\n");
  printf("7) The cube of numbers\n");
  printf("8) Converts from binary to decimal\n");
  printf("9) Gives you the maximum number of elements in increasing sequence\n");
  printf("10) Ti da le occorrenze");
  printf("\n\n");

  printf("\nWhich exercizes do you want execute? ");
  scanf("%d", &choise);
  printf("\n");

  switch (choise) {
  case 1:
    multiples();
    break;
  case 2:
    isPalindrome();
    break;
  case 3:
    fiboEven();
    break;
  case 4:
    bubbleSort();
    break;
  case 5:
    smallest1To20();
    break;
  case 6:
    primeNumber();
    break;
  case 7:
    cubo();
  case 8:
    binaryTodecimal();
    break;
  case 9:
    sequence();
    break;
  case 10:
    strcmp();
    break;
  case 11:
    occorrenze();
    break;
  default:
    printf("\nRiprova :)");
    break;
  }
}

/* CONSTRUCTION OF FUNCTIONS */
void multiples() {
  int max = 1000;
  int sum = 0;
  int i;

  for (i = 0; i < max; i++) {
    if (i % 3 == 0 || i % 5 == 0)
      sum += i;
  }

  printf("\n\nThe sum is: %d", sum);
}

void isPalindrome() {
  int n;
  int i = 0, j = 0;
  int flag = 0;

  /*
      int vet[] = {2,9,2};
      n = sizeof(vet)/sizeof(vet[0]);
  */

  printf("Write the lenght of the number: ");
  scanf("%d", &n);

  int vet[n];

  printf("\nWrite the number: \n");
  for (i = 0; i < n; i++) {
    scanf("%d", &vet[i]);
  }

  for (i = 0, j = n - 1; i < (n / 2), j >= n / 2; i++, j--) {
    if (vet[i] != vet[j]) {
      flag = 1;
      break;
    }
  }

  if (flag == 0) {
    printf("\n\nThe number is palindrome :)");
  }
}

void fiboEven() {
  int n;
  int temp1 = 0;
  int temp2 = 1;
  int sum = 0;

  while (n < 4000000) {
    n = temp1 + temp2;
    temp1 = temp2;
    temp2 = n;
    if (n < 4000000) {
      if (n % 2 == 0) {
        sum = sum + n;
      }
    } else
      break;
  }

  printf("\n\nThe sum of even numbers is: %d", sum);
}

void bubbleSort() {
  srand(time(NULL));
  int max = 10;
  int n;
  int i, j;
  int vet[max];
  int tmp;

  printf("The unordered array:\n");
  for (i = 0; i < max; i++) {
    vet[i] = (rand() % 61) + 10;
    printf("%d\t", vet[i]);
  }

  printf("\n\nThe ordered array:\n");
  for (i = 0; i < max; i++) {
    for (j = max - 1; j >= i; j--) {
      if (vet[j] > vet[j + 1]) {
        tmp = vet[j];
        vet[j] = vet[j + 1];
        vet[j + 1] = tmp;
      }
    }
  }

  for (i = 0; i < max; i++) {
    printf("%d\t", vet[i]);
  }

  printf("\n\nDigit a number: ");
  scanf("%d", &n);

  if (n < vet[9]) {
    vet[9] = n;
  }

  for (i = 0; i < max; i++) {
    for (j = max - 1; j >= i; j--) {
      if (vet[j] > vet[j + 1]) {
        tmp = vet[j];
        vet[j] = vet[j + 1];
        vet[j + 1] = tmp;
      }
    }
  }

  for (i = 0; i < max; i++) {
    printf("%d\t", vet[i]);
  }
}

void smallest1To20() {
  int N = 7;
  int n = 40;
  int i, j = 0;

  while (j != N) {
    for (i = 1; i <= N; i++) {
      if (n % i == 0) {
        j++;
      } else {
        j = 0;
        break;
      }
    }
    n += 20;
  }

  printf("\n\nThe smallest number is: %d", n - 20);
}

void primeNumber() {
  int i;
  int N = 2;
  int j = 0;
  int div = 0;
  int cnt = 0;

  for (i = 2; (i <= N) && (cnt != 10001); i++) {
    for (j = 2; j < i; j++) {
      if (i % j == 0) {
        div = 1;
      }
    }
    if (div == 0) {
      cnt++;
      printf("\n%d è un numero primo", i);
    }
    div = 0;
    N++;
  }
}

void cubo() {
  int i;
  int j;
  int k;
  int n;
  int sum;

  printf("Scrvi un numero: ");
  scanf("%d", &n);

  int vet[n];

  for (i = 1; i <= n; i++) {
    sum = 0;
    for (j = 1; j <= i; j++) {
      for (k = 0; k < i; k++) {
        sum = sum + i;
      }
    }
    vet[i - 1] = sum;
  }

  printf("\n\n");

  for (i = 0; i < n; i++) {
    printf("%d\t", vet[i]);
  }
}

void binaryTodecimal() {
  int LEN;
  int i, j;
  int n = 1;
  int somma = 0;
  int flag = 0;

  printf("Write the number of bit that you want: ");
  scanf("%d", &LEN);

  int vet[LEN];

  printf("\nWrite the binary number:\n");
  for (i = LEN - 1; i >= 0; i--) {
    scanf("%d", &vet[i]);
  }

  for (i = LEN - 1; i >= 1; i--) {
    n = 2;
    if (vet[i] == 1) {
      for (j = 1; j < i; j++) {
        n = n * 2;
      }
      somma = somma + n;
    }
  }

  if (vet[0] == 1) {
    somma = somma + 1;
  }

  printf("\nYour decimal number is: %d", somma);
}

void sequence() {
  int i = 1;
  int n;
  int tmp = 0;
  int max = 0;

  printf("\nWrite a number: ");
  do {
    scanf("%d", &n);

    if (tmp != 0) {
      if (n > tmp)
        i++;
      else
        i = 1;

      if (i > max)
        max = i;
    }

    tmp = n;
  } while (n != 0);

  printf("\nIl numero massimo di elementi in sequenza cresente è: %d", max);
}

void strcmp() {
  char s1[20];
  char s2[20];
  int i;
  int a;
  int cnt1 = 0, cnt2 = 0;

  printf("\nInserisci le due stringhe: ");
  scanf("%s%s", s1, s2);

  for (i = 0; (s1[i] != '\0') || (s2[i] != '\0'); i++) {
    if (s1[i] != '\0') {
      cnt1++;
    }
    if (s2[i] != '\0') {
      cnt2++;
    }
  }

  if (cnt1 > cnt2) {
    a = 1;
  } else if (cnt1 < cnt2) {
    a = -1;
  } else {
    a = 0;
  }

  printf("\nLa comparazione tra stringhe è uguale a: %d", a);
}

void occorrenze(){
  char s1[20];
  int i,j,k;
  int occ=0;
  int flag = 0;
  char alphabet[26];

  scanf("%s",s1);
  int len = strlen(s1);

  for(i=0; i<len; i++){
    for(k=0; k<26; k++){
      if(alphabet[k] == s1[i]){
        flag = 1;
      }
    }
    for(j=i+1; j<len; j++){
      if((s1[i] == s1[j]) && flag == 0){
        occ++;
          alphabet[i] = s1[i];
      }
    }
    flag = 0;
  }

  printf("\nLe occorrenze nella parola %s sono: %d",s1,occ);
}
