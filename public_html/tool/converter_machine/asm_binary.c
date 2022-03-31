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
char shamtAssembly[3]; 
//char functAssembly[6];

char immediateAssembly[6];
char addressAssembly[27]; 
char labelAssembly[20]; 
int pcAssembly = 0;         // Program Counter Assembly

void printPointer(char *string, int length);

int main () 
{
	fillJumpAdressTable();   
		
	unsigned long totalLines = 0;
	FILE *inputFile, *outputFile;
		
	printf("MIPS Parser!\n" );

//conta linha do binary1.txt
totalLines = countLine ();
printf("<br>Total lines: %lu \n", totalLines);

char instructionName[6];  // guarda um nome de instrucao. Ex: "add", "sltu". Os casos maiores sao "addiu" + terminator = 6 espacos

inputFile = fopen("./code.txt", "r");
outputFile = fopen("./solution.txt", "w");
			// "r"	Opens a file for reading. The file must exist.
			// "w"	Creates an empty file for writing. If a file with the same name already exists, its content is erased and the file is considered as a new empty file.
			// "a"	Appends to a file. Writing operations, append data at the end of the file. The file is created if it does not exist.
			// "r+"	Opens a file to update both reading and writing. The file must exist.
			// "w+"	Creates an empty file for both reading and writing.
			// "a+"	Opens a file for reading and appending.
	if (!outputFile)
	{
		printf("\nError output!\n");
	}
	else  
	{
		if (!inputFile)
		{
			printf("\nError input!\n");
		}
		else  
		{
			printf("\nAssembly file opened successfully!\n");				
			while (fgets (inputLine, 129, inputFile) ) 
			{	
				printf("<br>Input Assembly: ");
				puts (inputLine);				
				pcAssembly++;   
				printf("<br>Instruction(pc) = %d \n", pcAssembly);  l
				
				if ( !isLabel(inputLine) )			
				{
					strcpy (instructionName, getNameAssembly(inputLine) );
					ripDataAssembly(inputLine);
							
					strcpy (rsBinary, registerToBinary(rsAssembly)); 
					strcpy (rtBinary, registerToBinary(rtAssembly));
					strcpy (rdBinary, registerToBinary(rdAssembly));
											
					filterInstruction(instructionName);  					
					printf("<br>Output Binary: ");
					puts(outputLine);			
					fputs(outputLine, outputFile); 
					fputs("\n", outputFile);  //    \n
				}
			}
		}	
	}
	
fclose(inputFile);
fclose(outputFile);



return 0;
}
