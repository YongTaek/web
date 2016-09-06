#include <stdio.h>

void print(int num);
void print_email();
void print_phone();
int main(int argc, char *argv[]) {
	int num;
	scanf("%d",&num);
	print(num);
	return 0;
}
void print(int num) {
	if(num == 1) {
		print_email();	
	} else if(num == 2) {
		print_phone();
	}
}
void print_email(){
	printf("xxx@xxx.com\n");
}
void print_phone(){
	printf("010-0000-0000\n");
}

