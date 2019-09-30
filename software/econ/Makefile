CC       = gcc
CFLAGS   = -std=c99 -pedantic -Wall -O3 -ggdb \
	  	-fgnu89-inline \
                -Wpointer-arith -Wcast-qual -Wcast-align \
                -Wwrite-strings -Wnested-externs \
                -fshort-enums -fno-common \
		-I.
RM       = rm -f
SOURCES=ppde36.c
OBJECTS=ppde36.o
AR=ar
RANLIB=ranlib
HOME=/home/ppreux
BINDIR=$(HOME)/usr/bin
LIBDIR=$(HOME)/usr/lib
USRINCLUDE=$(HOME)/usr/lib/include

libde.so: ppde36.c
	libtool --mode=compile $(CC) -c -O3 \
                -I$(INCLUDE) \
                -ggdb \
                $(CFLAGS) \
                ppde36.c
	libtool --mode=link $(CC) -g -O0 -o libde.la \
		$(OBJECTS) \
		-rpath $(LIBDIR) -lm
	libtool --mode=install install -c libde.la $(LIBDIR)

libde.a: ppde36.c ppde36.o
	$(AR) rvu $@ ppde36.o
	$(RANLIB) $@

sc.de: ppmain.c ppdj9.c
	$(CC) $(CFLAGS) ppmain.c ppdj9.c -o sc.de \
		-L$(LIBDIR) -lde -lm `pkg-config --cflags --libs gsl`
