#include <stdio.h>
#include <unistd.h>

void read_ints(const char* file_name) 
{
	FILE* file = fopen(file_name, "r");
	int i = 0;

	fscanf(file, "%d", &i);
	while (!feof (file))
	{
		// printf("%d", i);
		fscanf (file, "%d", &i);
	}
	
	fclose(file);
	
	printf("Start Timer\n");
	// With 'i' stored as an int pass to timer
	sleep(i * 60);
	printf("Done waiting.\n");
	system("sudo /var/www/html/shscript/timerexec.sh");	
	sleep(300);	// Allow time for mobile to get notification
	system("sudo /var/www/html/shscript/timerexec2.sh");
	system("sudo /var/www/html/shscript/lightoff");

	// Timer now exits, print if success
	printf("done executing timer\n");	
}

int main()
{
	read_ints("/var/www/html/js/timeset.txt");
	return 0;
}
