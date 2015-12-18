#include <wiringPi.h>
int main(void)
{
	wiringPiSetup();
	pinMode(0, OUTPUT);
	digitalWrite(0, LOW);
	system("sudo php /var/www/html/shscript/onlightoff.php /etc/php5/apache2/php.ini");
	return 0;
}
