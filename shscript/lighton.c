// Only turns on the light
#include <wiringPi.h>
int main (void)
{
	wiringPiSetup () ;
	pinMode(0, OUTPUT);
	digitalWrite(0, HIGH);
	system("sudo php /var/www/html/shscript/onlighton.php /etc/php5/apache2/php.ini");
	return 0;
}
