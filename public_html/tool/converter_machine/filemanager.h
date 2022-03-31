#ifndef FILEMANAGER
#define FILEMANAGER

/*


FILE *fopen(const char *filename, const char *mode);
r  - open for reading
w  - open for writing (file need not exist)
a  - open for appending (file need not exist)
r+ - open for reading and writing, start at beginning
w+ - open for reading and writing (overwrite file)
a+ - open for reading and writing (append if file exists)
*/


int isLabel (char *inputline);

void printPointer(char *string, int length)
{
	int i;
	for (i=0; i < length; i++){
		printf("%c", string[i]);
	}
}

//For reading and putting each instructions in inputline
int isLabel (char *inputline)
{
	char ch;
	int i=0;
	do
	{
		ch = inputline[i];
		if (ch == ':')return 1;  
		i++;
	} while (ch != '\0');
	return 0;  
}

//entrando uma linha, esta funcao retorna a primeira palavra antes do espaco
char *getNameAssembly(char *fullLine)
{
	int i = 0;
	char *name;
	name = (char *)malloc(6); // tamanho maximo do nome das funcoes, incluindo terminator
	
	do
	{
		name[i] = fullLine[i];
		i++;
	} while ( fullLine[i] != ' ' );    //transcreve a primeira parte da linha ate encontrar um espaco em branco
	name[i] = '\0';

	return (char *)name;
}
//Count line of instructions
unsigned long countLine ()
{
	unsigned long lineCount = 0;
	FILE *file;
	file = fopen("./code.txt", "r");
	
	if ( file == NULL )
	{
		printf( "\nCannot open file!\n" );
		return -1; //erro
	}
	else //let's count!
	{
		char ch;
		while ( (ch = fgetc(file)) != EOF ) 
		{
			if (ch == '\n')
			lineCount++;
		}	
	}
	lineCount++;
	fclose (file);
	return lineCount;
	
}
// read binary file
void readBinary ()
{
	FILE *binaryFile;
	// open a file
	binaryFile = fopen("./code.txt", "r");
		
	/* fopen returns 0, the NULL pointer, on failure */
	if ( binaryFile == NULL )
	{
		printf( "\nCannot open file!\n" );
	}
	else // aqui que realmente le! 
	{
		char ch;  // read one character at a time from file
		while  ( (( ch = fgetc( binaryFile )) != EOF ) && ( ch != '\n' ) )   // compares with endline "\n" or EOF
		{
		   	 printf( "%c", ch );
		}
	
	fclose( binaryFile );
	}
}

void readAssembly ()
{
	FILE *assemblyFile;
	// open a file
	assemblyFile = fopen("./code.txt", "r");
		
	/* fopen returns 0, the NULL pointer, on failure */
	if ( assemblyFile == NULL )
	{
		printf( "\nCannot open file!\n" );
	}
	else // aqui que realmente le! 
	{
		char ch;  // read one character at a time from file
		
		while  ( ( (ch = fgetc( assemblyFile )) != EOF ) && ( ch != '\n' ) )   // compares with endline "\n" or EOF
		{
		   	 printf( "%c", ch );
		}
	
	fclose( assemblyFile );
	}
}
#endif
