USRBIN = ~/usr/bin/
USRLIB = ~/usr/lib/
USRLIBINCLUDE = ~/usr/lib/include

NAME = sdr

SRC = sdr.c
CC = gcc
CIBLE = sdr
LIB = -lm

ARCHIVE = $(NAME).tgz
ARCHFILES = $(SRC) Makefile

# the -march and -mtune are tuned for gcc-4.2, on an X61s
# with gcc-4.2, may also try -march=native to detect automatically the cpu
CFLAGS=-O3 -ggdb -DDATE_STR=\"`date +%D`\" \
  -march=nocona -mtune=generic \
  -ansi -pedantic -Werror -Wall -W \
  -Wmissing-prototypes -Wstrict-prototypes \
  -Wconversion -Wshadow \
  -Wpointer-arith -Wcast-qual -Wcast-align \
  -Wwrite-strings -Wnested-externs \
  -fshort-enums -fno-common `pkg-config --cflags --libs gsl` \
  $(USRLIB)/Malloc.c -I$(USRLIBINCLUDE)

all: $(CIBLE)

$(USRBIN)$(CIBLE): $(CIBLE)

$(CIBLE): $(SRC)
	$(CC) $(CFLAGS) $(SRC) -o $(CIBLE) $(LIB)

tgz: $(ARCHFILES)
	tar zcf $(ARCHIVE) $(SRC) $(ARCHFILES)

clean:
	rm -f $(CIBLE) $(ARCHIVE)

