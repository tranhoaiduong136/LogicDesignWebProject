#include <stdio.h>
#include <stdlib.h>
#include <string.h>  //strcpy()
#include "mips.h"
#include "filemanager.h"
#define BUFFER_SIZE 129   //line buffer max size

//Global Variables
char inputLine[129];
char outputLine[129];

char opcodeBinary[7];        // G Var for Binary
char rsBinary[6];
char rtBinary[6];
char rdBinary[6];
char shamtBinary[6];
char functBinary[7];
struct JumpTable JumpAdressTable[20];

char immediateBinary[17];   // exclusive type I
char addressBinary[27]; 	// exclusive type J

char instructionAssembly[6];     // G Var for Assembly
char rsAssembly[6];
char rtAssembly[6];
char rdAssembly[6];
char shamtAssembly[3];      // 2^5 = 32 (max) - 2 caracteres
//char functAssembly[6];

char immediateAssembly[6];   // 2^16 = 65538 (max) - 5 caracteres
char addressAssembly[27]; 	// definimos address com 
char labelAssembly[20];    // label para funcoes bne e beq
int pcAssembly = 0;         // Program Counter Assembly 

// fim da declaracao de Global Variables
void printPointer(char *string, int length);

int main () 
{
	fillJumpAdressTable();   //scans the input file for Labels and creates a table
		
	unsigned long totalLines = 0;
	FILE *inputFile, *outputFile;

//conta linha do binary1.txt
totalLines = countLine ();

char instructionName[6];  // holds an instruction name. Ex: "add", "sltu". Larger cases are "addiu" + terminator = 6 spaces

inputFile = fopen("./code.txt", "r");
outputFile = fopen("./solution.txt", "w");
			
	if (!outputFile)
	{
		printf("No output file!\n");	
	}
	else  // arquivo de escrita aberto corretamente
	{
		if (!inputFile)
		{
			printf("\nError input file!\n");
		}
		else   // arquivo de leitura aberto corretamente
		{
			printf("<br>Successfully!\n");
			while (fgets (inputLine, 129, inputFile) ) 
			{	
				printf("<br>%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%");	
				printf("<br>Binary code:");
				puts (inputLine);		
				
				getOpcodeBinary(inputLine);
				ripDataBinary(opcodeBinary);
			
				printf("<br>RS:");
				puts(rsBinary);
				puts(rsAssembly);
				printf("<br>RT:");
				puts(rtBinary);
				puts(rtAssembly);
				printf("<br>RD:");
				puts(rdBinary);
				puts(rdAssembly);
				printf("<br>Shamt:");
				puts(shamtBinary);
				printf("<br>Funct:");
				puts(functBinary);
				printf("<br>immed:");
				puts(immediateBinary);
				printf("<br>Address:");
				puts(addressBinary);
				printf("<br>Instruction:");
				puts(instructionAssembly);
				
				puts(outputLine);			
				fputs(outputLine, outputFile); 
				fputs("\n", outputFile);
				
			}
		}
	}
	
fclose(inputFile);
fclose(outputFile);

return 0;
}
