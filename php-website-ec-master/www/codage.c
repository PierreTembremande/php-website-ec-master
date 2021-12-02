#include <stdio.h>
#include <string.h>
#include <stdlib.h>

char code_char(int k, char c) {
	if (c >= 'a' && c <= 'z') {
		return 'a' + (c - 'a' + k) % 26 ;
	} else if (c >= 'A' && c <= 'Z') {
		return 'A' + (c - 'A' + k) % 26 ;
	} else{
		return c ;
	}
}

void code_string(int k, char * message) {
	for (char * ptr = message; *ptr != '\0'; ++ptr) {
		*ptr = code_char(k, *ptr) ;
	}
}

int main(int argc, char ** argv) {
	if (argc < 3) { return 1 ; }
	
	char data[1024] ;
	strcpy(data, argv[2]) ;
	code_string(atoi(argv[1]), data) ;
	
	printf(data) ;
	return 0 ;
}
