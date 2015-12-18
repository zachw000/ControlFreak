#include <stdlib.h>
#include <math.h>
#include <stdio.h>
#include <iostream>
#include <time.h>

int main(int argc, char* argv[]) {
	printf("%d\xD\xA", argc);
	if (argc < 3) {
		std::cerr << "Usage: " << argv[0] << " <test> [data_size]" << std::endl;
		std::cerr << "\tTest Types are: ping, latency" << std::endl;
		std::cerr << "\tData size can be up to 32768 bytes in size" << std::endl;
		return 1;
	}

	if (argc > 3) {
		std::cerr << "Usage: " << argv[0] << " <test> [data_size]" << std::endl;
		std::cerr << "\tTest Type are: ping, latency" << std::endl;
		std::cerr << "\tData size can be up to 32768 bytes in size" << std::endl;
		return 1;
	}
	
	long long time_one = time(NULL);
	//if (argv[1] == "ping") {
		system("ping -c 10 -s 1024 -p 8080 10.90.3.15");
	//}
	
	long long total_one = time (NULL);
	long long time_diff = time_one - total_one;
	
	printf("%llu\xD\xA", time_diff / 10);

	return 0;
}
