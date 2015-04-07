#include<stdio.h>
#include<stdlib.h>
#include<string.h>
#include <time.h>
#include <stdint.h>
#include <sys/time.h>
#include <sys/resource.h>
int main()
{
	struct rusage use;
	struct timeval utime;
	struct timeval stime;
        getrusage(RUSAGE_SELF, &use);
	utime =use.ru_utime;
	stime =use.ru_stime;
	long int time = (use.ru_nivcsw +use.ru_nvcsw ) ;
	time = (utime.tv_sec + stime.tv_usec)/time;
        printf("%ld\n", time);

return 0;
}


